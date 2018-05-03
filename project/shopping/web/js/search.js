$(function () {
    $("#searchproduct").autocomplete({
        source: "search.php",
        minLength: 2,
        select: function (event, ui) {
            window.location = "/Description.php?id=" + ui.item.value;
        }
    });


   
});

