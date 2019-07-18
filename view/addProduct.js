function addProduct() {
    let title = $('#title').val();
    let price = $('#price').val();
    let description = $('#description').val();
    let shop = $('.uk-select option:selected').val();
    let json = {title: title, price: price, description: description, shopID: shop.split(" ")[0]}; 
    console.log(json);

    $.post("https://silmin-inventory.herokuapp.com/api.php/", json)
        .done(function() {
            console.log('done');
        })
        .fail(function() {
            console.log('fail');
        });
}
