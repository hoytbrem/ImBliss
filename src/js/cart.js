const itemSkus = [
    {
        sku: 1,
        img_src: "./img/bar1.jpg"
    }
];

/*
    {
        item_id: 0,
        qty: 0,
        price: 1.00, // the total for the individual item. (these will be validated upon checkout, the cart is really just for viewing purposes other than quantity and item sku)
        sku_price: 1.00 
        sku: itemSkus[0].sku,
        item_img: itemSkus[0].img_src,
        mini_cart: []
    }
*/

const cartItems = [
    {
        item_id: 0,
        name: "Item Name",
        qty: 1,
        price: 4.99,
        sku_price: 4.99,
        sku: itemSkus[0].sku,
        item_img: itemSkus[0].img_src,
        mini_cart: []
    },
    {
        item_id: 1,
        name: "Item Name",
        qty: 1,
        price: 9.99,
        sku_price: 9.99,
        sku: itemSkus[0].sku,
        item_img: itemSkus[0].img_src,
        mini_cart: [
            {
                item_id: 3,
                sku: itemSkus[0].sku,
                item_img: itemSkus[0].img_src,
                mini_cart: []
            }
        ]
    },
    {
        item_id: 2,
        name: "Item Name",
        qty: 1,
        price: 14.99,
        sku_price: 14.99,
        sku: itemSkus[0].sku,
        item_img: itemSkus[0].img_src,
        mini_cart: []
    },
];

let counter = 3;

var cartReady = false;


async function addItem({ item_id, qty = 1, price = 0.00, sku, sku_price, item_img, mini_cart }) {
    cartItems.push({ item_id, qty, price: sku_price * qty, sku, sku_price, item_img, mini_cart });
    await refreshCart();
}

/**
 * Adds quantity to the item in the cart.
 * @param {number} cartItemId This is the unique shopping cart item id (not sku).
 * @returns 0 if the cart/document isn't finished loading if this function is triggered.
 */
function addQty(cartItemId) {
    if (!cartReady)
        return 0;

    const found = cartItems.find(({ item_id }) => item_id === cartItemId);

    if (typeof found !== 'undefined') {
        found.qty++;
        found.price = found.sku_price * found.qty;
        cartItems[cartItemId] = found;
    }

    const { price, qty } = found ?? { price: null, qty: null };

    const qtyElements = document.body.getElementsByClassName(`imbliss-cart-item-qty-id-${cartItemId}`);
    const priceElement = document.getElementById(`imbliss-cart-item-price-id-${cartItemId}`);

    // If the quantity isn't 0, we set and format the currency here accordingly, otherwise it's pointless.
    qty !== 0 && qty !== null && (priceElement.innerHTML = `&dollar;${price.toFixed(2)}`);

    if (typeof found === "undefined") {
        return 0;
    } else {
        updateCartItem(found, cartItemId);
    }

    for (qtyElement of qtyElements) {
        qtyElement.innerHTML = qty;
    }
}

/**
 * Removes quantity from an item in the cart, or the item if it reaches 0.
 * @param {number} cartItemId This is the unique shopping cart item id (not sku).
 * @returns 0 if the cart/document isn't finished loading if this function is triggered.
 */
function removeQty(cartItemId) {
    if (!cartReady)
        return 0;

    // looking for the item in the cartItems array to remove.
    const found = cartItems.find(({ item_id }) => item_id === cartItemId);
    const cartElement = document.getElementById(`imbliss-cart-item-id-${cartItemId}`);

    // Making sure the cart item object was found and the quantity is above 0 before proceeding.
    if (typeof found != 'undefined' && found.qty >= 1) {
        found.qty--;
        found.price = found.sku_price * found.qty;
        cartItems[cartItemId] = found;

        // "Removing" the item from the cart - we're just setting 0 property values to the original item object.
        if (found.qty <= 0) {
            cartElement && cartElement.remove();
            found.qty = 0;
            found.price = 0;
            found.sku = 0;
            cartItems[cartItemId] = found;
        }
    } else if (typeof found == 'undefined') { // removing the element if the object isn't found.
        document.getElementById(`imbliss-cart-item-id-${cartItemId}`).remove();
    }

    // returning 0 if the object isn't found, otherwise, updating the cart.
    if (typeof found === "undefined") {
        return 0;
    } else {
        updateCartItem(found, cartItemId);
    }
}

/**
 * 
 * @param {Object} found The cart item object that's found, and to update (view and data).
 * @param {number} item_id This is the actual DIV; this will be used to remove the cart item's div if 
 * it no longer exists in the array.
 */
function updateCartItem(found, item_id) {
    const { qty, price } = found ?? { qty: null, price: null };

    if (typeof found == 'undefined') {
        document.getElementById(`imbliss-cart-item-id-${item_id}`).remove();
    }

    found.price = found.sku_price * found.qty;
    cartItems[item_id] = found;

    const priceElement = document.getElementById(`imbliss-cart-item-price-id-${item_id}`) ?? null;
    const qtyElements = document.body.getElementsByClassName(`imbliss-cart-item-qty-id-${item_id}`);

    if (priceElement)
        priceElement.innerHTML = qty === 0 ? "0.00" : price.toFixed(2);

    for (let qtyElement of qtyElements) {
        qtyElement.innerHTML = qty;
    }
}

/**
 * This function just refreshes the cart, filling out quantity and price information.
 * Does not delete any elements.
 */
async function refreshCart() {
    cartItems.forEach(async ({ item_id, qty, price }) => {
        let cartElement = document.getElementById(`imbliss-cart-item-id-${item_id}`);
        if (qty == 0) // just doing a last check to make sure the element has been removed from the shopping cart.
            cartElement && cartElement.remove();

        let qtyIds = document.getElementsByClassName(`imbliss-cart-item-qty-id-${item_id}`);
        let priceIds = document.getElementsByClassName(`imbliss-cart-item-price-id-${item_id}`);

        for (let qtyId of qtyIds)
            qtyId.innerHTML = qty;

        for (let priceId of priceIds)
            priceId.innerHTML = price;
    });
    console.log(cartItems);
}

/**
 * Just loads these functions after the document is finished loading.
 */
document.addEventListener("DOMContentLoaded", async () => {
    cartItems.forEach(({ item_id }) => {
        const minusButton = document.getElementById(`imbliss-cart-minus-${item_id}`);
        const plusButton = document.getElementById(`imbliss-cart-plus-${item_id}`);
        minusButton?.addEventListener('click', () => removeQty(item_id));
        plusButton?.addEventListener('click', () => addQty(item_id));
    });
    await refreshCart();

    // IMPORTANT - set to true once the document is loaded; cart functions will return 0 otherwise.
    cartReady = true;
    console.log("Cart ready!");
});