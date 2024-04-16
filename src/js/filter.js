
document.querySelectorAll('input[name="filter"], input[name="sort"]').forEach(function(checkbox) {
    checkbox.addEventListener('change', function() {
        filterItems();
    });
});

function filterItems() {
    var selectedFilters = Array.from(document.querySelectorAll('input[name="filter"]:checked')).map(el => el.value);

    // Get references to the radio buttons
    const priceLowToHighRadio = document.getElementById('sortLowToHigh');
    const priceHighToLowRadio = document.getElementById('sortHighToLow');
    const reviewRadio = document.getElementById('sortHighestRating');

    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("filteredProducts").innerHTML = this.responseText;
        }
    };

    switch(true){
        case priceLowToHighRadio.checked:
            xhr.open("GET", "partial/product.php?filters=" + JSON.stringify(selectedFilters) + "&sort=low-to-high", true);
            break;
        case priceHighToLowRadio.checked:
            xhr.open("GET", "partial/product.php?filters=" + JSON.stringify(selectedFilters) + "&sort=high-to-low", true);
            break;
        case reviewRadio:
        default:
            xhr.open("GET", "partial/product.php?filters=" + JSON.stringify(selectedFilters), true);
    }

    xhr.send();
    
}

filterItems();
