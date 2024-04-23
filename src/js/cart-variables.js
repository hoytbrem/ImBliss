const cartList = [];

class Cart {
    constructor() {
        this.directoryLevelOfPage = dirLevel;
        this.initialLoad = true;
        this.cartList = cartList;
        this.imblissCartContainer = document.createElement("div");
        this.documentDone = false;

        document.addEventListener("DOMContentLoaded", () => {
            this.documentDone = true;
            this.cartMain();
        });
    }

    revive(key, value) {
        switch (key) {
            case "_item_id":
                return parseInt(value);
            case "_qty":
                return parseInt(value);
            case "_name":
            case "_description":
            case "_category":
            case "_image":
            case "_alt_text":
                return value.toString();
            case "_price":
            case "_totalPrice":
                return parseFloat(value);
            case "_rating":
                return parseInt(value);
            default:
                return value;
        }
    }

    getCartItems() {
        let storageCartItems = JSON.parse(localStorage.getItem("cart_items"));
        if (!storageCartItems) return null;
        console.log("Here are the storage items:", storageCartItems);
        return storageCartItems;
    }

    /**
     * Grabs the cart items as a proper list, without private identifiers.
     * @param {boolean} justQty rebuilds just the cart item objects with item_ids and qtys.
     * @returns Either a minimal or complex list of item objects.
     */
    setCartItemsStorage(justQty = false) {
        if (justQty) {
            let minList = this.cartList.map(item => ({ item_id: item.item_id, qty: item.qty }));
            localStorage.setItem("cart_items", JSON.stringify(minList));
        } else {
            localStorage.setItem("cart_items", JSON.stringify(this.cartList));
        }
    }

    /**
     * Sets multiple attributes on a given DOM element.
     * 
     * @param {Element} element - The DOM element to modify.
     * @param {Object} attributes - An object where each key-value pair represents the attribute name and its value.
     */
    setAttributes(element, attributes) {
        for (let key in attributes) {
            element.setAttribute(key, attributes[key]);
        }
    }

    /**
     * Asynchronously populates the shopping cart with items based on the received data.
     * It first checks if the dataReceived is not empty or null. If it is, it handles the empty state.
     * Otherwise, it proceeds to render each item in the dataReceived array by calling the itemRender function.
     * After all items are rendered, it updates the cart items storage and marks the initial load as complete.
     * 
     * @param {Array} dataReceived - The array of item data to be rendered in the cart.
     * @param {Function} itemRender - A function that takes an item object and the container element as arguments to render the item.
     */
    async populateCart(dataReceived, itemRender) {
        let paddedControlledContainer = document.getElementById("imbliss-cart-list");
        this.setAttributes(this.imblissCartContainer, { "class": "imbliss-cart-list" });
        paddedControlledContainer.appendChild(this.imblissCartContainer);

        if (!dataReceived) {
            this.handleIfEmpty();
            return null;
        }

        let data = [...dataReceived];
        if (data.length === 0 && this.cartList.length === 0) {
            this.handleIfEmpty();
        }

        for (let itemObject of data) {
            await itemRender(itemObject, this.imblissCartContainer);
        }

        this.setCartItemsStorage();
        this.initialLoad = false;
    }

    /**
     * Asynchronously validates the items in the cart by sending a request to the server.
     * It fetches the cart data from the get cart php script, checks the response, and then populates the cart if data is received.
     * Any errors during the fetch or data processing are caught and logged to the console.
     */
    async validateItems() {
        let myRequest = new Request(`${this.directoryLevelOfPage}/src/php/get-cart-data.php`);

        try {
            let response = await fetch(myRequest, {
                method: "POST",
                body: JSON.stringify(this.cartList),
                headers: { 'Content-Type': 'application/json' }
            });

            if (!response.ok) throw new Error("Could not grab cart data.");
            let data = await response.json();
            if (!data) return null;
            this.populateCart(data, this.renderCartItem.bind(this));
        } catch (error) {
            console.error(error);
        }
    }

    /**
     * Removes an item from the cart list based on the provided item ID.
     * 
     * @param {number|string} value The ID of the item to be removed from the cart list.
     */
    removeItem(value) {
        this.cartList = this.cartList.filter(element => element.item_id !== value);
    }

    /**
     * Renders a cart item and adds it to the cart list.
     * 
     * @param {Object} itemObject - The object containing item details.
     * @param {HTMLElement} imblissCartContainer - The container where the cart item will be rendered.
     */
    renderCartItem(itemObject) {
        let item = this.createNewItemObject(itemObject);
        item.renderCartItem(this.imblissCartContainer);
        this.cartList.push(item);
        this.setCartItemsStorage();
    }

    /**
     * Creates a new item object based on the provided itemObject parameter.
     * 
     * @param {Object} itemObject - The source object containing item properties.
     * @param {number} itemObject.item_id - The unique identifier for the item.
     * @param {string} itemObject.name - The name of the item.
     * @param {number} itemObject.price - The price of the item.
     * @param {string} itemObject.description - A brief description of the item.
     * @param {string} itemObject.category - The category the item belongs to.
     * @param {string} itemObject.image - The URL of the item's image.
     * @param {string} itemObject.alt_text - Alternative text for the item's image.
     * @returns {Item} An instance of the Item class with the properties provided by itemObject.
     * @throws {Error} Throws an error if the item_id is not provided.
     */
    createNewItemObject(itemObject) {
        let { item_id, name, price, description, category, image, alt_text } = itemObject;

        if (!item_id) {
            let { _item_id, _name, _price, _description, _category, _image, _alt_text } = itemObject;
    
            if (!_item_id) {
                throw new Error("Item Object Parameter Error.");
            } else {
                try {
                    return new Item(_item_id, _name, _price, _description, _category, _image, _alt_text);
                } catch {
                    throw new Error("Item Object Type/Variable missing.");
                }
            }
    
        } else { // if the item_id is found in normal format.
            try {
                return new Item(item_id, name, price, description, category, image, alt_text);
            } catch {
                throw new Error("Item Object Type/Variable missing.");
            }
        }
    }

    /**
     * Asynchronously adds an item to the cart if the document is fully loaded.
     * It filters the item object to remove any leading underscores from its keys,
     * checks if the item already exists in the cart, and if so, increments its quantity.
     * If the item does not exist, it renders the new cart item and checks if the cart is empty.
     * 
     * @param {Object} itemObject - The item object to add to the cart. Expected to have at least an item_id property.
     * @returns {Promise<boolean>} Returns false if the document is not fully loaded, otherwise void.
     */
    async addItem(itemObject) {
        if (!this.documentDone) {
            console.log("Document is not finished loading. Cannot add item just yet.");
            return false;
        }

        let filteredItemObject = Object.keys(itemObject).reduce((acc, key) => {
            const newKey = key.replace(/^_/, ''); // Remove underscore at the beginning of the key
            acc[newKey] = itemObject[key];
            return acc;
        }, {});

        let { item_id } = filteredItemObject;
        let found = this.cartList.some(element => {
            if (element.item_id === item_id) {
                element.qty++;
                return true;
            }
            return false;
        });

        if (!found) {
            this.renderCartItem(filteredItemObject);
            this.handleIfEmpty();
        }
    }

    /**
     * Handles the display of an empty list message for the cart.
     * If the cart list is empty, it creates or updates an element to show a message.
     * If the cart list is not empty and the message element exists, it removes the element.
     */
    handleIfEmpty() {
        let emptyListItem = document.getElementById("emptyListItem") ?? document.createElement("div");
        if (this.cartList.length === 0) {
            emptyListItem.innerHTML = "<h3>No Items Yet!</h3>";
            this.setAttributes(emptyListItem, {
                "class": "col-sm-12 text-center w-100 mt-4 text-larger tk-source-serif-4-display",
                "id": "emptyListItem"
            });
            this.imblissCartContainer.appendChild(emptyListItem);
        } else {
            emptyListItem.remove();
        }
    }

    /**
     * Initializes the cart functionality by setting up the event listener for the cart open button
     * and populating the cart with items.
     */
    cartMain() {
        let cartCollapse = document.getElementById("cartRow");
        let cartOpenButton = document.getElementById("cartOpenButton");
        cartOpenButton.addEventListener("click", () => {
            cartCollapse.classList.toggle("cart-collapse-open");
        });
        this.populateCart(this.getCartItems(), this.renderCartItem.bind(this));
    }
}

//let cart = new Cart();
