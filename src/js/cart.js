const directoryLevelOfPage = dirLevel;
var imblissCartContainer = document.createElement("div");
const DEV_MODE = false;
var removeClicked = false;
let initialLoad = true;
var cartOpen = false;
var cartList = [];

let revive = (key, value) => {

    switch (key) {
        case "_item_id":
        case "item_id":
            return parseInt(value);
        case "_qty":
        case "qty":
            return parseInt(value);
        case "_name":
        case "name":
            return value.toString();
        case "_price":
        case "price":
            return parseFloat(value).toFixed(2);
        case "_rating":
        case "rating":
            return parseInt(value);
        case "_totalPrice":
        case "totalPrice":
            return parseFloat(value);
        default:
            return value;
    }
};

/**
 * Retrieves cart items from local storage and optionally tests for specific conditions.
 * 
 * This function fetches the cart items stored in the local storage. If the cart is not empty,
 * it parses the stored JSON string back into an object. It can also perform a test to check
 * if the cart is empty by passing "empty" as an argument to the function. Depending on the
 * test result, it may return a specific value or the cart items.
 * 
 * @param {string} testingFor - Optional parameter to specify a test condition. 
 *                              Currently supports "empty" to test if the cart is empty.
 * @returns {Array|String} - Returns an array of cart items if no testing condition is specified
 *                           or the cart is not empty. Returns a string "test" if testing for "empty"
 *                           and the cart is empty. Otherwise, returns an empty array.
 */
function getCartItems(testingFor = "") {

    let storage_cart_items = localStorage.getItem("cart_items") || [];

    if (storage_cart_items.length != 0)
        storage_cart_items = JSON.parse(storage_cart_items, revive);

    switch (testingFor) {
        case "empty":
            if (!storage_cart_items)
                return "test";
            break;
        default:
            if (!storage_cart_items) {
                return [];
            }
    }

    console.log("Cart storage complete.");

    return storage_cart_items;
}

/**
 * Grabs the cart items as a proper list, without private identifiers.
 * @param {boolean} justQty rebuilds just the cart item objects with item_ids and qtys.
 * @returns Either a minimal or complex list of item objects.
 */
async function setCartItemsStorage(justQty = false) {

    if (justQty) {
        let minList = cartList.map(item => {
            return {
                item_id: item.item_id,
                qty: item.qty
            };
        });
        localStorage.setItem("cart_items", minList);
    } else if (!justQty) {

        localStorage.setItem("cart_items", JSON.stringify(cartList || []));
    }
};



/**
 * This function populates the cart list with data received and renders each item using the itemRender function.
 * @param {Array} dataReceived - The data received to populate the cart list.
 * @param {Function} itemRender - The function used to render each item in the cart list.
*/
function populateCart(dataReceived, itemRender) {

    let paddedControlledContainer = document.getElementById("imbliss-cart-list");

    setAttributes(imblissCartContainer, {
        "class": "imbliss-cart-list",
        "id": "targetContainer"
    });
    paddedControlledContainer.appendChild(imblissCartContainer);

    if (!dataReceived) {
        handleIfEmpty(imblissCartContainer);
        return null;
    }
    try {
        data = [...dataReceived ?? []];
    } catch {
        return null;
    }

    if (data.length == 0 && cartList.length == 0) {
        handleIfEmpty(imblissCartContainer);
    }

    data.forEach(itemObject => {
        itemRender(itemObject, imblissCartContainer);
    });

    setCartItemsStorage();
    initialLoad = false;
    validateItems(data);

    if (data.length == 0) {
        return false;
    } else {
        return true;
    }
}

/**
 * Validates the items in the cart by sending them to a server-side script for verification.
 * 
 * @param {Array} cartList - An array of cart items to be validated.
 * @returns {Promise<boolean|null>} A promise that resolves to true if items are valid, 
 * null if there are no items to validate, or false if an error occurs during validation.
 * 
 * This function first checks if the cartList is empty and immediately returns an empty array if true.
 * It then constructs a Request object targeting a PHP script responsible for cart data validation,
 * sending the cartList as a JSON string in the POST request body. The server response is then processed
 * to determine the validity of the cart items. If the server indicates that the cart data is valid,
 * the function logs a success message and returns true. If the server response is anything other than
 * "true", it indicates a problem with the cart's integrity, leading to the clearing of the cart and
 * local storage, and logging an error message. In case of fetch operation or server-side errors,
 * the function catches these errors, logs them, and returns false.
 */
function validateItems(cartList) {
    if (cartList.length == 0)
        return [];
    // This allows more secure data encapsulation.
    let myRequest = new Request(`${dirLevel}src/php/cart-data.php`);
    fetch(myRequest, {
        method: "POST",
        body: JSON.stringify(cartList),
        headers: {
            'Content-Type': 'application/json'
        }
    })
        .then((response) => {
            if (!response.ok) {
                throw new Error("Could not grab cart data.");
            }
            return response.text();
        })
        .then((data) => {
            if (!data) {
                console.log("No cart data to validate.");
                return null;
            } else {
                if (data == "true") {
                    console.log("Item added.");
                    return true;
                } else {
                    console.log("Cart integrity has been damaged.");
                    cartList = [];
                    localStorage.clear();
                    handleIfEmpty(imblissCartContainer);
                    throw new Error("Could not grab cart data.");
                }
            }

        })
        .catch((error) => {
            console.log(error);
            return false;
        });
};

/**
 * Removes an item from an array based on a specified value.
 * 
 * @param {number|string} value - The value of the item_id to remove from the array.
 * @param {Array} array - The array from which to remove the item.
 * @returns {Array} A new array with the specified item removed.
 */
function removeItem(value, array) {
    removeClicked = true;
    let thisData = [...array];
    let newArray = thisData.filter((element) => {
        return element.item_id != value;
    });
    return newArray;
}


/**
 * Renders a single item in the cart.
 * @param {Item} itemObject - The object representing the this.updateTotalAndPrice()
 * @param {HTMLElement} imblissCartContainer - The container element for the cart.
*/

function renderCartItem(itemObject, imblissCartContainer) {

    let item = createNewItemObject(itemObject);

    item.renderCartItem(imblissCartContainer);

    cartList.push(item);
    setCartItemsStorage();
}

/**
 * Creates a new item object from the provided itemObject parameter.
 * The function can handle both single item objects and arrays of item objects.
 * If an array is provided, it uses the first object in the array.
 * The function supports both normal and underscore-prefixed property names.
 * 
 * @param {Object|Object[]} itemObject - The item object or array of item objects to process.
 * @returns {Item} A new Item instance created from the provided itemObject.
 * @throws {Error} Throws an error if the itemObject array is empty or if required item properties are missing.
 */
function createNewItemObject(itemObject) {

    if (Array.isArray(itemObject) && itemObject.length > 0) {
        itemObject = itemObject[0];
    } else if (Array.isArray(itemObject) && itemObject.length === 0) {
        throw new Error("Item Object Array is empty.");
    }

    let { item_id, name, price, description, category, image, meta_alt_text, qty = 1 } = itemObject;

    if (!item_id) {
        let { _item_id, _name, _price, _description, _category, _image, _meta_alt_text, _qty = 1 } = itemObject;
        if (!_item_id) {
            throw new Error("Item Object Parameter Error.");
        } else {
            try {
                return new Item(_item_id, _name, _price, _description, _category, _image, _meta_alt_text, _qty);
            } catch {
                throw new Error("Item Object Type/Variable missing.");
            }
        }
    } else { // if the item_id is found in normal format.
        return new Item(item_id, name, price, description, category, image, meta_alt_text, qty);
    }
}


/**
 * Renders an empty list item in the cart container.
 * @param {HTMLElement} cartContainer - The container element where the empty list item will be appended.
*/
function handleIfEmpty(cartContainer) {
    let paddedControlledContainer = document.getElementById("targetContainer");
    let emptyListItem = document.getElementById("emptyListItem") ?? document.createElement("div");
    if (cartList.length == 0) {
        paddedControlledContainer.innerHTML = "";
        let subTotal = document.getElementById("subTotal");
        let cartItemCount = document.getElementById("cart-item-count");
        cartItemCount.innerHTML = `No Items`;
        subTotal.innerHTML = `&dollar;0.00`;
        emptyListItem.innerHTML = "<h3 id='cartNoItems'>No Items Yet!</h3>";
        setAttributes(emptyListItem, {
            "class": "col-sm-12 text-center w-100 mt-4 text-larger tk-source-serif-4-display",
            "id": "emptyListItem"
        });
        paddedControlledContainer.appendChild(emptyListItem);
    } else {
        cartItemCount = cartList.length == 1 ? "1 Item" : `${cartList.length} Items`;
        emptyListItem.remove();
    }

    cartOverflow = document.getElementById("cartOverflow");
    imblissHeader = document.getElementById("stickyNav").offsetHeight;
    imblissFooter = document.getElementById("imblissFooter").offsetHeight;
    spaceAdjust = imblissHeader + imblissFooter;
    let itemHeight = 0;
    const itemElementList = document.getElementsByClassName("item-holder");

    for (let index = 0; index < itemElementList.length; index++) {
        itemHeight += itemElementList[index].offsetHeight;
    }

    if (cartOverflow.offsetHeight >= (window.innerHeight - spaceAdjust)) {
        cartOverflow.style.height = "80vh";
        cartOverflow.style.overflowY = "scroll";
    } else {
        cartOverflow.style.height = `${itemHeight}px`;
    }
}

var documentDone = false;

// Wait for the DOM to be fully loaded
document.addEventListener("DOMContentLoaded", () => {
    // Set a flag to indicate that the document is done loading
    documentDone = true;
    cartMain();
});
var addingItem = false;

function handleCartOpen(addingItems = false) {
    let cartCollapse = document.getElementById("cartRow");
    let cartOpenButton = document.getElementById("cartOpenButton");

    if (cartOpen) {
        if (!addingItems) {
            cartOpenButton.click();
        }
    } else {
        cartOpenButton.click();
    }
}

/**
 * Initializes the cart functionality, including opening and closing the cart,
 * populating it with items, and updating the total price and items count.
 * It also automatically opens the cart if the application is in development mode.
 */
function cartMain() {

    // Get the cart row element
    var cartCollapse = document.getElementById("cartRow");
    // Get the cart open button element
    var cartOpenButton = document.getElementById("cartOpenButton");
    let imblissHeader = document.getElementById("stickyNav");
    let cartButtonGroup = document.getElementsByClassName("cart-button-size");
    let navToggler = document.getElementById("navToggler");

    document.addEventListener("click", async (event) => {
        await setInterval(() => { }, 200);
        if (cartCollapse !== event.target && !cartCollapse.contains(event.target) && cartOpenButton !== event.target && cartButtonGroup !== event.target && navToggler !== event.target && !navToggler.contains(event.target)) {
            cartOpen = true;
            cartOpenButton.click();
        } else if (removeClicked) {
            removeClicked = false;
            cartOpen = false;
            cartOpenButton.click();
        }
    });

    cartOpenButton.addEventListener("click", (event) => {

        if (!cartOpen) {
            cartCollapse.style.top = 0;
            console.log(imblissHeader.offsetHeight);
            cartCollapse.style.opacity = 1;
        } else {
            cartCollapse.style.top = `-4000px`;
            cartCollapse.style.opacity = 0.75;
            cartCollapse.height = 0;
        }
        //cartCollapse.classList.toggle("cart-collapse-open");
        cartOpen = !cartOpen;
    });

    // Checks a constant at the top of this script, opens the cart automatically when dev mode is true.
    if (DEV_MODE)
        cartOpenButton.click();

    let cartItemsReceived = getCartItems() || [];

    switch (populateCart(cartItemsReceived, renderCartItem)) {
        case true:
            console.log("Populated cart.");
            break;
        case false:
            console.log("No data to populate cart.");
            break;
        default:
            console.log("There was an issue populating the cart");
    }
    updateTotalAndPrice();
}


/**
 * Adds an item to the cart.
 * @param {Item} itemObject - The item object to be added.
 * The properties needed:  item_id, name, price, description, category, image, meta_alt_text
 * 
*/
function addItem(itemId) {
    handleAddItem(itemId)
}

function handleAddItem(itemId) {

    fetch(`${dirLevel}src/php/add-item.php?item_id=${itemId}`, {
        method: "GET"
    })
        .then((response) => {
            if (!response.ok) {
                throw new Error("Could not grab cart data.");
            }
            return response.json();
        })
        .then((data) => {
            if (data != null) {
                itemObject = data;

                if (!documentDone) {
                    console.log("Document is not finished loading. Cannot add item just yet.");
                    return false;
                }

                handleCartOpen(true);

                let { item_id } = itemObject;
                if (documentDone) {
                    let found = false;
                    found = cartList.filter((element) => {
                        if (element.item_id == item_id) {
                            element.qty++;
                            handleIfEmpty(imblissCartContainer);
                            element.updateTotalAndPrice();
                            setCartItemsStorage();
                            element.listGroupItem.classList.toggle("add-item");
                            return true;
                        }
                    });

                    if (found.length == 0) {
                        renderCartItem(itemObject, imblissCartContainer);
                        handleIfEmpty(imblissCartContainer);
                        updateTotalAndPrice();
                    }
                }

                validateItems(cartList);
            }
        })
}

/**
 * Updates the total price and item count displayed in the UI based on the current items in the cart.
 * Iterates through each item in the cart to calculate the total price and updates the subtotal and item count elements in the DOM.
 */
function updateTotalAndPrice() {
    let tempList = [...cartList];
    let sum = 0;

    for (let tempItem of tempList) {
        sum += tempItem.totalPrice;

        let subTotal = document.getElementById("subTotal");
        let itemCount = document.getElementById("cart-item-count");

        // Corrected the syntax for template literals below
        if (typeof sum !== 'number')
            sum = Number(sum);
        subTotal.innerHTML = `&dollar;${sum.toFixed(2) ?? 0.00}`;
        itemCount.innerHTML = tempList.length > 0 ? `${tempList.length} Items` : tempList == 1 ? `1 Item` : `No Items`;
    }
}
