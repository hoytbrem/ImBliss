class Item {
    constructor(item_id, name, price, description, category, image, alt_text, qty, rating = 0) {
        this._item_id = item_id;
        this._name = name;
        this._price = price;
        this._qty = qty;
        this._description = description;
        this._category = category;
        this._image = image;
        this._alt_text = alt_text;
        this._rating = rating;
        this._totalPrice = price ?? 0;
        this._cartPrice = document.createElement("span");
        this._buttonQuantitySpacer = document.createElement("div");
        this._listGroupItemContainer = document.createElement("div");
        this._listGroupItem = document.createElement("div");
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

    setCartItemsStorage(justQty = false) {

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

    updateTotalAndPrice() {
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
        //cart_items();
    }
    this._totalPrice = this._qty * this._price;
    this._cartPrice.innerHTML = `&dollar;${this._totalPrice.toFixed(2)}`;
    }
    setAttributes(element, attributes) {
        for (let key in attributes) {
            element.setAttribute(key, attributes[key]);
        }
    }
    
    renderCartItem(imblissCartContainer) {
        // New List Item with its own container.
        setAttributes(this._listGroupItemContainer, { "class": "row item-holder" });
        imblissCartContainer.appendChild(this._listGroupItemContainer);

        setAttributes(this._listGroupItem, { "class": "list-group-item col-sm-7" });
        imblissCartContainer.append(this._listGroupItemContainer);

        // Container for product
        let cartItemRow = document.createElement("div");
        setAttributes(cartItemRow, { "class": "imbliss-cart-item row" });
        this._listGroupItem.appendChild(cartItemRow);

        // Cart product image
        let cartItemImage = document.createElement("img");
        setAttributes(cartItemImage, {
            "class": "col-sm-5 imbliss-cart-img ",
            "src": `${directoryLevelOfPage}/images/product-images/${this._image}`,
            "alt": this._alt_text
        });

        this._listGroupItemContainer.append(cartItemImage);
        this._listGroupItemContainer.append(this._listGroupItem);

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
        this.updateTotalAndPrice();
        if (typeof this._totalPrice !== 'number') 
            this._totalPrice = Number(this._totalPrice);
        
        this._cartPrice.innerHTML = `&dollar;${this._totalPrice.toFixed(2)}`;
        cartItemRow.append(this._cartPrice);

        // Cart Minus/Plus/Remove Buttons/Spacer for Buttons

        let cartButtonGroup = document.createElement("div");
        setAttributes(cartButtonGroup, {
            "class": "btn-group col-sm-5",
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
                this._listGroupItemContainer.remove();
                cartList = removeItem(this._item_id, cartList);

                // Renders empty item if there's no items in the cart.
                if (cartList.length == 0)
                    handleIfEmpty(imblissCartContainer);
            }
            this.updateTotalAndPrice();
            this.setCartItemsStorage();
            this._buttonQuantitySpacer.innerHTML = `<span class="item-qty">${this._qty}</span>`;
            if (typeof this._totalPrice !== 'number') 
                this._totalPrice = Number(this._totalPrice);
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
            this.setCartItemsStorage();
            validateItems(cartList);
            handleIfEmpty(imblissCartContainer);
            this._buttonQuantitySpacer.innerHTML = `<span class="item-qty">${this._qty}</span>`;
            if (typeof this._totalPrice !== 'number') 
                this._totalPrice = Number(this._totalPrice);
            this._cartPrice.innerHTML = `&dollar;${this._totalPrice.toFixed(2)}`;
        });
        cartButtonGroup.append(cartButtonAdd);

        // Remove Button
        let removeButton = document.createElement("button");
        setAttributes(removeButton, {
            "class": "imbliss-cart-remove-button cart-button-size"
        });

        removeButton.addEventListener("click", () => {
            this._listGroupItemContainer.remove();
            cartList = removeItem(this._item_id, cartList);

            // Renders empty item if there's no items in the cart.
            if (cartList.length == 0)
                handleIfEmpty(imblissCartContainer);

            this.updateTotalAndPrice();
            this.setCartItemsStorage();
            this._buttonQuantitySpacer.innerHTML = `<span class="item-qty">${this._qty}</span>`;
            if (typeof this._totalPrice !== 'number') 
                this._totalPrice = Number(this._totalPrice);
            this._cartPrice.innerHTML = `&dollar;${this._totalPrice.toFixed(2)}`;
        });
        cartButtonGroup.append(removeButton);
        
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

    get listGroupItemContainer() {
        return this._listGroupItemContainer;
    }

    get listGroupItem() {
        return this._listGroupItem;
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
        //this._cartPrice.innerHTML = `&dollar;${this._totalPrice.toFixed(2)}`;
        
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

    getItemObject() {
        // Create a new item object without underscores in the property names.
        const modifiedObject = {};
        for (const key in this) {
          const modifiedKey = key.replace('_', ''); // Remove underscores
          modifiedObject[modifiedKey] = this[key];
        }
        return modifiedObject;
      }
}
