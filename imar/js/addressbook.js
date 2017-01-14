$(function () {
    // Cache input elements to avoid duplicate selection
    var input = $(".InputCombo").find("input");
    // Add highlight and remove possible error message
    input.focus(function () {
        $(this).addClass("u-focused");
        $(this).next("div").remove();
    });

    // Remove highlight and add error message when field is empty
    input.blur(function () {
        $(this).removeClass("u-focused");
        if ($(this).val().length === 0) {
            $(this).after($("<div></div>").addClass("InputCombo-error").text("Please enter the " + $(this).prev("label").text().toLowerCase() + "."));
        }
    });

    // Add pointer cursor and toggle address
    $(".AddressEntry-name").addClass("u-pointer").click(function () {
        $(this).next("div").slideToggle("fast");
    });

    // Collect all address entries
    var addresses = $(".AddressEntry");

    // See if there are address entries present
    if (addresses.length > 0) {
        var links = $("<div></div>").addClass("Grid-full").append(
            $("<div>Show all</div>").addClass("Button u-spaceRM").click(function () {
                $(".AddressEntry-address").slideDown("fast");
            })
        ).append(
            $("<div>Hide all</div>").addClass("Button").click(function () {
                $(".AddressEntry-address").slideUp("fast");
            })
        );

        addresses.first().before(links.clone(true));
        addresses.last().after(links.clone(true));
    }

    // Add a hover-effect
    addresses.hover(function () {
        $(this).addClass("u-hover");
    }, function () {
        $(this).removeClass("u-hover");
    });

    // Display the number of addresses
    addresses.parent().prev("h2").append(" (" + addresses.length + ")");
});