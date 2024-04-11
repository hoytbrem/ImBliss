class Item {
    

    // buttonQuantitySpacer.innerHTML = `<span class="item-qty">${this._qty}</span>`;
    // this._cartPrice.innerHTML = `&dollar;${this._totalPrice.toFixed(2)}`;
    constructor(item_id, name, price, qty, description, category, image, alt_text, rating = 0) {
        this._item_id = item_id;
        this._name = name;
        this._price = price;
        this._qty = qty ?? 1;
        this._description = description;
        this._category = category;
        this._image = image;
        this._alt_text = alt_text;
        this._rating = rating;
        this._totalPrice = price;
        this._cartPrice = document.createElement("span");
        this._buttonQuantitySpacer = document.createElement("div");
    }

    addPrice(value) {
        this._totalPrice += value;
        this.updateTotalAndPrice();
    }

    subtractPrice(value) {
        this._totalPrice -= value;
    }

    getTotal() {
        return this._totalPrice;
    }

    updateTotalAndPrice() {

        let tempList = [...cartList];
        let sum = 0;

        for (let tempItem of tempList) {
            sum += tempItem.getTotal();
        }

        let subTotal = document.getElementById("subTotal");
        let itemCount = document.getElementById("cart-item-count");

        // Corrected the syntax for template literals below
        subTotal.innerHTML = `&dollar;${sum.toFixed(2) ?? 0.00}`;
        itemCount.innerHTML = tempList.length > 0 ? `${tempList.length} Items` : tempList == 1 ? `1 Item` : `No Items` ;
    }

    renderCartItem(imblissCartContainer) {
        // New List Item with its own container.
        let listGroupItemContainer = document.createElement("div");
        setAttributes(listGroupItemContainer, { "class": "row" });
        imblissCartContainer.appendChild(listGroupItemContainer);
        let listGroupItem = document.createElement("div");
        setAttributes(listGroupItem, { "class": "list-group-item col-sm-7" });
        imblissCartContainer.append(listGroupItemContainer);

        // Container for product
        let cartItemRow = document.createElement("div");
        setAttributes(cartItemRow, { "class": "imbliss-cart-item row" });
        listGroupItem.appendChild(cartItemRow);


        //console.log(item);

        // Cart product image
        let cartItemImage = document.createElement("img");
        setAttributes(cartItemImage, {
            "class": "col-sm-5 imbliss-cart-img ",
            "src": `../images/product-images/${this._image}`,
            "alt": this._alt_text
        });
        listGroupItemContainer.append(cartItemImage);
        listGroupItemContainer.append(listGroupItem);

        // Cart header
        let cartHeader = document.createElement("h3");
        setAttributes(cartHeader, { "class": "col-sm-12" });
        cartHeader.innerText = this._name;
        cartItemRow.append(cartHeader);

        // Ratings
        let ratingGroup = document.createElement("div");
        setAttributes(ratingGroup, { "class": "rating-group col-sm-4" });
        cartItemRow.append(ratingGroup);

        for (let index = 0; index < 5; index++) {

            let star = document.createElement("div");
            setAttributes(star, { "class": "rating-star" });

            star.addEventListener("click", () => {
                let starIndex = index + 1;
            });

            ratingGroup.appendChild(star);
        }

        // Price 
        setAttributes(this._cartPrice, { "class": "col-sm-12 price-tag" });
        this._cartPrice.innerHTML = `&dollar;${this._totalPrice.toFixed(2)}`;
        cartItemRow.append(this._cartPrice);

        // Cart Minus/Plus/Remove Buttons/Spacer for Buttons

        let cartButtonGroup = document.createElement("div");
        setAttributes(cartButtonGroup, {
            "class": "btn-group col-sm-4",
            "role": "group",
            "aria-label": "cart-btn-group"
        });
        cartItemRow.append(cartButtonGroup);

        //let this._buttonQuantitySpacer = document.createElement("div");

        // Minus Button
        let cartButtonMinus = document.createElement("button");
        setAttributes(cartButtonMinus, {
            "class": "imbliss-cart-minus-button cart-button-size",
            "type": "button"
        });
        cartButtonMinus.innerHTML = "";
        cartButtonMinus.addEventListener("click", () => {
            this._qty--;
            this.subtractPrice(this._price);
            if (this._qty <= 0) {
                listGroupItemContainer.remove();
                cartList = removeItem(this._item_id, cartList);

                // Renders empty item if there's no items in the cart.
                console.log(cartList);
                if (cartList.length == 0)
                    handleIfEmpty(imblissCartContainer);
            }
            this.updateTotalAndPrice();
            this._buttonQuantitySpacer.innerHTML = `<span class="item-qty">${this._qty}</span>`;
            this._cartPrice.innerHTML = `&dollar;${this._totalPrice.toFixed(2)}`;
        });
        cartButtonGroup.append(cartButtonMinus);


        // disabled button in the middle between the two minus and plus buttons.
        let disabledButtonSpreader = document.createElement("span");
        setAttributes(disabledButtonSpreader, { "class": "cart-button-size text-center qty" });
        cartButtonGroup.append(disabledButtonSpreader);

        disabledButtonSpreader.appendChild(this._buttonQuantitySpacer);
        this._buttonQuantitySpacer.innerHTML = `<span class="item-qty">${this._qty}</span>`;


        // Add Button
        let cartButtonAdd = document.createElement("button");
        cartButtonAdd.innerHTML = "";
        setAttributes(cartButtonAdd, {
            "class": "imbliss-cart-add-button cart-button-size",
            "type": "button"
        });
        cartButtonAdd.addEventListener("click", () => {
            this._qty++;
            this.addPrice(this._price);
            //item.totalPrice = item.price * item.qty;
            this.updateTotalAndPrice(); // Call the updateTotalAndPrice() function here

            this._buttonQuantitySpacer.innerHTML = `<span class="item-qty">${this._qty}</span>`;
            this._cartPrice.innerHTML = `&dollar;${this._totalPrice.toFixed(2)}`;
        });

        cartButtonGroup.append(cartButtonAdd);
    }
    get item_id() {
        return this._item_id;
    }

    get name() {
        return this._name;
    }

    get price() {
        return this._price;
    }

    get qty() {
        return this._qty;
    }

    get description() {
        return this._description;
    }

    get category() {
        return this._category;
    }

    get image() {
        return this._image;
    }

    get alt_text() {
        return this._alt_text;
    }

    get rating() {
        return this._rating;
    }

    get totalPrice() {
        return this._totalPrice;
    }

    set item_id(value) {
        this._item_id = value;
    }

    set name(value) {
        this._name = value;
    }

    set price(value) {
        this._price = value;
    }

    set qty(value) {
        this._qty = value;
        this._buttonQuantitySpacer.innerHTML = `<span class="item-qty">${this._qty}</span>`;
        this._cartPrice.innerHTML = `&dollar;${this._totalPrice.toFixed(2)}`;
    }

    set description(value) {
        this._description = value;
    }

    set category(value) {
        this._category = value;
    }

    set image(value) {
        this._image = value;
    }

    set alt_text(value) {
        this._alt_text = value;
    }

    set rating(value) {
        this._rating = value;
    }

    set totalPrice(value) {
        this._totalPrice = value;
    }
}


let initialLoad = true;
var cartList = [];

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
function populateCart(dataReceived, itemRender) {
    let paddedControlledContainer = document.getElementById("imbliss-cart-list");


    setAttributes(imblissCartContainer, {
        "class": "imbliss-cart-list"
    });
    paddedControlledContainer.appendChild(imblissCartContainer);

    data = [...dataReceived];

    if (data.length == 0 && cartList.length == 0) {
        handleIfEmpty(imblissCartContainer);
    }

    data.forEach(itemObject => {
        itemRender(itemObject, imblissCartContainer);
    });
    initialLoad = false;
}

fetch("../src/php/get-cart-data.php")
    .then((response) => {
        if (!response.ok) {
            throw new Error("Could not grab cart data.");
        }
        return response.json();
    })
    .then((data) => {
        populateCart(data, renderCartItem);
    })
    .catch((error) => {
        console.log(`Error: ${error}`);
    });

function removeItem(value, array) {
    let thisData = [...array];
    let newArray = thisData.filter((element) => {
        return element.item_id != value;
    });
    return newArray;
}

var documentDone = false;

// Wait for the DOM to be fully loaded
document.addEventListener("DOMContentLoaded", () => {
    // Get the cart row element
    let cartCollapse = document.getElementById("cartRow");
    // Get the cart open button element
    let cartOpenButton = document.getElementById("cartOpenButton");
    cartOpenButton.addEventListener("click", () => {
        cartCollapse.classList.toggle("cart-collapse-open")
    });
    // Set a flag to indicate that the document is done loading
    documentDone = true;
});

/**
 * Renders a single item in the cart.
 * @param {Item} itemObject - The object representing the this.updateTotalAndPrice()
 * @param {HTMLElement} imblissCartContainer - The container element for the cart.
*/

function renderCartItem(itemObject, imblissCartContainer) {
    let item = createNewItemObject(itemObject);
    item.renderCartItem(imblissCartContainer);
    cartList.push(item);
}

function createNewItemObject(itemObject) {
    let { item_id, name, price, qty, description, category, image, alt_text } = itemObject
    return new Item(item_id, name, price, qty, description, category, image, alt_text);
}

/**
 * Adds an item to the cart.
 * @param {Item} itemObject - The item object to be added.
*/
function addItem(itemObject) {
    let { item_id } = itemObject;

    


    if (documentDone) {
        let found = false;
        found = cartList.filter((element) => {
            if (element.item_id == item_id) {
                element.qty++;
                console.log(item_id);
                return true;
            }
        });

        if (!found) {
            renderCartItem(itemObject);
            console.log("not found, adding");
            handleIfEmpty(imblissCartContainer);
        }
    }
}

/**
 * Renders an empty list item in the cart container.
 * @param {HTMLElement} cartContainer - The container element where the empty list item will be appended.
*/
function handleIfEmpty(cartContainer) {
    let emptyListItem = document.getElementById("emptyListItem") ?? document.createElement("div");
    if (cartList.length == 0) {
        emptyListItem.innerHTML = "<h3>No Items Yet!</h3>";
        setAttributes(emptyListItem, {
            "class": "col-sm-12 text-center w-100 mt-4 text-larger tk-source-serif-4-display",
            "id": "emptyListItem"
        });
        cartContainer.appendChild(emptyListItem);
    } else {
        emptyListItem.remove();
    }
}

/**
 * Sets up a repeating interval that attempts to update the total and price of the first item in a cart list.
 * This operation is attempted every 1000 milliseconds (1 second).
 */
setInterval(() => {
    try {
        cartList[0].updateTotalAndPrice();
        handleIfEmpty(imblissCartContainer);
    } catch { }
}, 500);
