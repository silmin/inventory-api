window.onload = function() {
    console.log("onload add");
    let json;
    $.get("https://silmin-inventory.herokuapp.com/api.php/shop", function(data) {
         json = JSON.parse(data);
    })
        .done(function() {
            console.log('done');
            reflectShops(json);
        })
        .fail(function() {
            console.log('fail');
        });
}
