
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

    var url = "partial/product.php?filters=" + JSON.stringify(selectedFilters);

    switch(true){
        case priceLowToHighRadio.checked:
            url += "&sort=low-to-high";
            break;
        case priceHighToLowRadio.checked:
            url += "&sort=high-to-low";
            break;
        case reviewRadio:
        default:
        }

    if(searchQuery !== null || searchQuery == " "){
        url += "&search_query=" + searchQuery;
    }
        
    xhr.open("GET", url, true);
    xhr.send();
    
}

filterItems();
