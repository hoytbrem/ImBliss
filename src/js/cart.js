class Item {
    constructor(element_node, item_id, name, price, qty, description, category, image, alt_text, rating = 0) {
        this._element_node = element_node;
        this._item_id = item_id;
        this._name = name;
        this._price = price;
        this._qty = qty ?? 1;
        this._description = description;
        this._category = category;
        this._image = image;
        this._alt_text = alt_text;
        this._rating = rating;
        this._total = price * this._qty;
    }

    get element_node() {
        return this._element_node;
    }

    set element_node(value) {
        this._element_node = value;
    }

    get item_id() {
        return this._item_id;
    }

    set item_id(value) {
        this._item_id = value;
    }

    get name() {
        return this._name;
    }

    set name(value) {
        this._name = value;
    }

    get price() {
        return parseFloat(this._total).toFixed(2);
    }

    set price(value) {
        this._price = parseFloat(value).toFixed(2);
        this._total = this._price * this._qty;
    }

    get qty() {
        return this._qty;
    }

    set qty(value) {
        this._qty = value;
        this._total = this._price * this._qty;
    }

    get description() {
        return this._description;
    }

    set description(value) {
        this._description = value;
    }

    get category() {
        return this._category;
    }

    set category(value) {
        this._category = value;
    }

    get image() {
        return this._image;
    }

    set image(value) {
        this._image = value;
    }

    get alt_text() {
        return this._alt_text;
    }

    set alt_text(value) {
        this._alt_text = value;
    }
}

function setAttributes(element, attributes) {
    for (let key in attributes) {
        element.setAttribute(key, attributes[key]);
    }
}


function populateCart(dataReceived) {
    let paddedControlledContainer = document.getElementById("imbliss-cart-list");

    let imblissCartContainer = document.createElement("div");
    setAttributes(imblissCartContainer, {
        "class": "imbliss-cart-list"
    });
    paddedControlledContainer.appendChild(imblissCartContainer);

    var data = [...dataReceived];

    data.forEach(itemObject => {
        let { item_id, qty, name, description, category, image, price, alt_text } = itemObject;

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

        let item = new Item(listGroupItem, item_id, name, price, qty, description, category, image, alt_text);


        // Cart product image
        let cartItemImage = document.createElement("img");
        setAttributes(cartItemImage, {
            "class": "col-sm-5 imbliss-cart-img ",
            "src": `../images/product-images/${item.image}`,
            "alt": item.alt_text
        });
        listGroupItemContainer.append(cartItemImage);
        listGroupItemContainer.append(listGroupItem);

        // Cart header
        let cartHeader = document.createElement("h3");
        setAttributes(cartHeader, { "class": "col-sm-12" });
        cartHeader.innerText = item.name;
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

                console.log(starIndex);

                switch (starIndex) {
                    case 1:
                    //setAttributes(this, "");
                }
            });

            ratingGroup.appendChild(star);
        }

        // Price 
        let cartPrice = document.createElement("span");
        setAttributes(cartPrice, { "class": "col-sm-12 price-tag" });
        cartPrice.innerHTML = `&dollar;${item.price}`;
        cartItemRow.append(cartPrice);

        // Cart Minus/Plus/Remove Buttons/Spacer for Buttons

        let cartButtonGroup = document.createElement("div");
        setAttributes(cartButtonGroup, {
            "class": "btn-group col-sm-4",
            "role": "group",
            "aria-label": "cart-btn-group"
        });
        cartItemRow.append(cartButtonGroup);

        let buttonQuantitySpacer = document.createElement("div");

        // Minus Button
        let cartButtonMinus = document.createElement("button");
        setAttributes(cartButtonMinus, {
            "class": "imbliss-cart-minus-button cart-button-size",
            "type": "button"
        });
        cartButtonMinus.innerHTML = "";
        cartButtonMinus.addEventListener("click", () => {
            item.qty--;
            if (item.qty <= 0) {
                listGroupItemContainer.remove();
                data = removeItem(item.item_id, data);
            }
            buttonQuantitySpacer.innerHTML = `<span class="item-qty">${item.qty}</span>`;
            cartPrice.innerHTML = `&dollar;${item.price}`;
        });
        cartButtonGroup.append(cartButtonMinus);


        // disabled button in the middle between the two minus and plus buttons.
        let disabledButtonSpreader = document.createElement("span");
        setAttributes(disabledButtonSpreader, { "class": "cart-button-size text-center qty" });
        cartButtonGroup.append(disabledButtonSpreader);

        disabledButtonSpreader.appendChild(buttonQuantitySpacer);
        buttonQuantitySpacer.innerHTML = `<span class="item-qty">${item.qty}</span>`;


        // Add Button
        let cartButtonAdd = document.createElement("button");
        cartButtonAdd.innerHTML = "";
        setAttributes(cartButtonAdd, {
            "class": "imbliss-cart-add-button cart-button-size",
            "type": "button"
        });
        cartButtonAdd.addEventListener("click", () => {
            item.qty++;
            buttonQuantitySpacer.innerHTML = `<span class="item-qty">${item.qty}</span>`;
            cartPrice.innerHTML = `&dollar;${item.price}`;
        });

        cartButtonGroup.append(cartButtonAdd);
    });
}

fetch("../src/php/get-cart-data.php")
    .then((response) => {
        if (!response.ok) {
            throw new Error("Could not grab cart data.");
        }
        return response.json();
    })
    .then((data) => {
        populateCart(data);
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

document.addEventListener("DOMContentLoaded", () => {
    let cartCollapse = document.getElementById("cartRow");
    let cartOpenButton = document.getElementById("cartOpenButton");
    cartOpenButton.addEventListener("click", () => {
        cartCollapse.classList.toggle("cart-collapse-open")
    });
    documentDone = true;
});

function addItem({ item_id, qty, name, description, category, image, price, alt_text }) {
    if (documentDone) {
        let found = false;
        found = data.filter((element) => {
            if (element.item_id == item_id) {
                element.qty++;
                return true;
            }
        });

        if (!found)
            data.push({ item_id, qty, name, description, category, image, price, alt_text });
    }
}