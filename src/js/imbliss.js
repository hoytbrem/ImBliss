document.addEventListener("DOMContentLoaded", () => {
    main();
});

function main() {
    let searchClicked = false;

    let searchIcon = document.getElementById("imbliss-search-icon");
    let search_query = document.getElementById("search_query");
    let searchBar = document.getElementById("searchBar");


    let clickOutside = (element, callBackFn) => {
        document.addEventListener("click", (event) => {
            if (event.target !== element)
                callBackFn();
        });
    }

    // makes the icon disappear
    let addIconBack = () => {
        if (searchClicked)
            searchIcon.classList.toggle("imbliss-hidden");
        searchClicked = false;
    }

    //element.click
    search_query.addEventListener("click", () => {
        searchIcon.classList.add("imbliss-hidden");
        searchClicked = true;
    });
    clickOutside(search_query, addIconBack);

    searchBar.style.width = searchBar.style.maxWidth;

    // Get the cart open button element
    let accountOpenButton = document.getElementById("accountOpenButton");
    let navAccountContextMenu = document.getElementById("navAccountContextMenu");
    accountOpenButton.addEventListener("click", () => {
        navAccountContextMenu.classList.toggle("account-context-collapse-open");
    });
    
    var productGrid = document.getElementById("productGrid");
    var imblissHeader = document.getElementById("imbliss-Header");
    var footer = document.getElementById("imblissFooter");

    if (productGrid != null) {
        //setYPosition(productGrid, imblissHeader, footer);
        console.log(productGrid, imblissHeader, footer);
    }
    window.addEventListener("resize", (event) => {
        if (productGrid.style.top != imblissHeader.offsetHeight) {
            setYPosition(productGrid, imblissHeader);
        }
    });
}

// sets the top position of an element (Y-Axis) based on the second parameter element's height.
function setYPosition(elementToMove, aboveElement, belowElement = null) {
    if (belowElement == null) {
        elementToMove.style.top = `${aboveElement.offsetHeight}px`;
    } else {
        elementToMove.style.top = `${aboveElement.offsetHeight}px`;
        belowElement.top = `${aboveElement.offsetHeight}px`;
    }

}