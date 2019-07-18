function getProducts() {
    let json;
    $.get("https://silmin-inventory.herokuapp.com/api.php", function(data) {
         json = JSON.parse(data);
    })
        .done(function() {
            console.log('done');
            reflectProducts(json);
        })
        .fail(function() {
            console.log('fail');
        });
}

