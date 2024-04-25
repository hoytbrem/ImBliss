const directoryLevelOfPage = dirLevel
let initialLoad = true;
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
            return parseFloat(value);
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

async function getCartItems(testingFor = "") {

    let storage_cart_items = await JSON.parse(localStorage.getItem("cart_items"), revive);

    console.log(`Storage: ${storage_cart_items}`);

    switch (testingFor) {
        case "empty":
            if (!storage_cart_items)
                return "test";
            break;
        default:
            if (!storage_cart_items)
                return null;
    }

    console.log("Cart storage complete.");
    return storage_cart_items;
}

/**
 * Grabs the cart items as a proper list, without private identifiers.
 * @param {boolean} justQty rebuilds just the cart item objects with item_ids and qtys.
 * @returns Either a minimal or complex list of item objects.
 */
function setCartItemsStorage(justQty = false) {

    if (justQty) {
        let minList = cartList.map(item => {
            return {
                item_id: item.item_id,
                qty: item.qty
            };
        });
        localStorage.setItem("cart_items", minList);
    } else if (!justQty) {
        localStorage.setItem("cart_items", JSON.stringify(cartList));
    }
};

var imblissCartContainer = document.createElement("div");

function setAttributes(element, attributes) {
    for (let key in attributes) {
        element.setAttribute(key, attributes[key]);
    }
}

/**
 * This function populates the cart list with data received and renders each item using the itemRender function.
 * @param {Array} dataReceived - The data received to populate the cart list.
 * @param {Function} itemRender - The function used to render each item in the cart list.
*/
async function populateCart(dataReceived, itemRender) {

    let paddedControlledContainer = await document.getElementById("imbliss-cart-list");

    setAttributes(imblissCartContainer, {
        "class": "imbliss-cart-list",
        "id": "targetContainer"
    });
    paddedControlledContainer.appendChild(imblissCartContainer);

    if (!dataReceived) {
        handleIfEmpty(imblissCartContainer);
        return null;
    }
    data = [...await dataReceived ?? []];

    if (data.length == 0 && cartList.length == 0) {
        handleIfEmpty(imblissCartContainer);
    }

    await data.forEach(itemObject => {
        itemRender(itemObject, imblissCartContainer);
    });

    setCartItemsStorage();
    initialLoad = false;

    if (data.length == 0) {
        return false;
    } else {
        return true;
    }
}





async function validateItems() {

    if (cartList.length == 0)
        return true;
    // This allows more secure data encapsulation.
    let myRequest = new Request(`${dirLevel}src/php/set-cart-data.php`);
    console.log("Performing a cart validation test.");
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
                    console.log("Clean cart.");
                    return true;
                } else {
                    console.log("Cart integrity has been damaged.");
                    cartList = [];
                    localStorage.clear();
                    handleIfEmpty(imblissCartContainer);

                    return false;
                }
            }

        })
        .catch((error) => {
            console.log(error);
            return false;
        });
};

function removeItem(value, array) {
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

function createNewItemObject(itemObject) {

    let { item_id, name, price, description, category, image, alt_text, qty = 1 } = itemObject;

    if (!item_id) {
        let { _item_id, _name, _price, _description, _category, _image, _alt_text, _qty = 1 } = itemObject;

        if (!_item_id) {
            throw new Error("Item Object Parameter Error.");
        } else {
            try {
                return new Item(_item_id, _name, _price, _description, _category, _image, _alt_text, _qty);
            } catch {
                throw new Error("Item Object Type/Variable missing.");
            }
        }

    } else { // if the item_id is found in normal format.
        try {
            return new Item(item_id, name, price, description, category, image, alt_text, qty);
        } catch {
            throw new Error("Item Object Type/Variable missing.");
        }
    }
}

/**
 * Adds an item to the cart.
 * @param {Item} itemObject - The item object to be added.
 * The properties needed:  item_id, name, price, description, category, image, alt_text
 * 
*/
async function addItem(itemObject) {

    if (!documentDone) {
        console.log("Document is not finished loading. Cannot add item just yet.");
        return false;
    }

    let filteredItemObject = Object.keys(itemObject).reduce((acc, key) => {
        const newKey = key.replace(/^_/, ''); // Remove underscore at the beginning of the key
        acc[newKey] = itemObject[key];
        return acc;
    }, {});
    console.log(filteredItemObject);

    let { item_id } = filteredItemObject;
    if (documentDone) {
        let found = false;
        found = cartList.filter((element) => {
            if (element.item_id == item_id) {
                element.qty++;
                setCartItemsStorage();
                console.log(item_id);
                return true;
            }
        });

        if (found.length == 0) {
            renderCartItem(filteredItemObject, imblissCartContainer);
            handleIfEmpty(imblissCartContainer);
        }
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
        emptyListItem.innerHTML = "<h3>No Items Yet!</h3>";
        setAttributes(emptyListItem, {
            "class": "col-sm-12 text-center w-100 mt-4 text-larger tk-source-serif-4-display",
            "id": "emptyListItem"
        });
        paddedControlledContainer.appendChild(emptyListItem);
    } else {
        emptyListItem.remove();
    }
}

var documentDone = false;

// Wait for the DOM to be fully loaded
document.addEventListener("DOMContentLoaded", () => {
    // Set a flag to indicate that the document is done loading
    documentDone = true;
    cartMain();
});

async function cartMain() {
    // Get the cart row element
    let cartCollapse = document.getElementById("cartRow");
    // Get the cart open button element
    let cartOpenButton = document.getElementById("cartOpenButton");
    cartOpenButton.addEventListener("click", () => {
        cartCollapse.classList.toggle("cart-collapse-open")
    });

    if (await populateCart(getCartItems(), renderCartItem)) {
        await validateItems();
    } else {

    }


}

/**
 * Sets up a repeating interval that attempts to update the total and price of the first item in a cart list.
 * This operation is attempted every 1000 milliseconds (1 second).
 */
setInterval(() => {
    try {
        handleIfEmpty(imblissCartContainer);
        if (cartList.length > 0) {
            cartList[0].updateTotalAndPrice();
        }
    } catch { }
}, 1000);