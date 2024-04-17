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
}