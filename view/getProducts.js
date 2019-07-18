var getProducts = $(function() {
    $.get("localhost:8000/api.php/", function(data) {
        console.log(data);
    });
});

getProducts();
