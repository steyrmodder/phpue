// Workaround for IE 5, 5.5 and 6. If XMLHttpRequest is not available, the best ActiveXObject version will be chosen
if (typeof XMLHttpRequest === "undefined") {
    XMLHttpRequest = function () {
        try {
            return new ActiveXObject("Msxml2.XMLHTTP.6.0");
        }
        catch (e) {
        }
        try {
            return new ActiveXObject("Msxml2.XMLHTTP.3.0");
        }
        catch (e) {
        }
        try {
            return new ActiveXObject("Microsoft.XMLHTTP");
        }
        catch (e) {
        }
        throw new Error("Entschuldige, Dein Browser ist nicht kompatibel.");
    };
}

var searchReq = new XMLHttpRequest();
var search;

//Called from onkeyup of the input field
//Starts the AJAX request.
function searchSuggest() {
    if (searchReq.readyState === 0 || searchReq.readyState === 4) {
        var str = encodeURIComponent(search.value);
        searchReq.open("GET", "search.php?search=" + str, true);
        searchReq.onreadystatechange = handleSearchSuggest;
        searchReq.send(null);
    }
}

//Called when the AJAX response is returned.
function handleSearchSuggest() {
    if (searchReq.readyState === 4) {
        var suggestDiv = document.getElementById("suggestions");
        suggestDiv.innerHTML = "";
        var words = searchReq.responseText.split("\n");
        for (var i = 0; i < words.length - 1; i++) {
            // Generate the element-DIVs.
            var entry = document.createElement("div");
            // Change class onmouseover
            entry.onmouseover = function () {
                this.classList.add("suggestlinkover");
            };
            // Change back class onmouseout
            entry.onmouseout = function () {
                this.classList.remove("suggestlinkover");
            };
            // Set the search value on click
            entry.onclick = function () {
                search.value = this.textContent;
                suggestDiv.innerHTML = "";
            };
            entry.classList.add("suggestlink");
            entry.textContent = words[i];
            suggestDiv.appendChild(entry);
        }
    }
}

// When the document is fully loaded, set the AJAX function as the onkeyup handler
// Also add attribute "autocomplete" to hide browser autocompletion
window.onload = function () {
    search = document.getElementById("search");
    search.onkeyup = searchSuggest;
};