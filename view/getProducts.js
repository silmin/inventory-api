var getProducts = $(function() {
    $.get("https://silmin-inventory.herokuapp.com/api.php/", function(data) {
        console.log(data);
    });
});

getProducts();
