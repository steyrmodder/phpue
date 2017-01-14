$(document).ready(function () {
    // Cache search element to avoid duplicate selection
    var search = $("#search");

    // Trigger AJAX functionality on keyup
    search.keyup(function () {
        var suggestions = $(".Suggestions").empty();
        $.getJSON("search.php", {search: search.val()}, function (data) {
            $.each(data, function (index, personObject) {
                $("<div></div>").text(personObject.fullName).addClass("Suggestions-entry").hover(function () {
                    $(this).addClass("Suggestions-over");
                }, function () {
                    $(this).removeClass("Suggestions-over");
                }).click(function () {
                    search.val($(this).text());
                    suggestions.empty();
                }).appendTo(suggestions);
            });
        });
    });
});