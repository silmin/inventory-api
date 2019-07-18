function searchProducts() {
    console.log("search");
    let json;
    let line = $('#search').val();
    console.log("line: " + line);
    $.get("https://silmin-inventory.herokuapp.com/api.php/search", {line: line})
        .done(function(data) {
            json = JSON.parse(data);
            console.log('done');
            reflectProducts(json);
        })
        .fail(function() {
            console.log('fail');
        });

}
