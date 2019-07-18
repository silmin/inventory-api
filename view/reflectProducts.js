function reflectProducts(json) {
    console.log("reflect");
    console.log(json);

    for(let i = 0;i < json.length;i++) {
        let id = json[i]['productID'];
        let title = json[i]['title'];
        let description = json[i]['description'] || "no description.";
        let price = json[i]['price'];

        let card = `<div id="${i}" class="uk-card uk-card-default uk-card-hover uk-card-body uk-margin-left uk-margin-bottom uk-margin-right"></div>`;

        $('.uk-flex').append(card);

        let title_html = `<h3 class="uk-margin-remove-bottom">${title}</h3>`;
        let price_html = `<p class="uk-margin-remove-top">${price} JPY</p>`;
        let desc_html = `<p class="uk-margin-remove-bottom">${description}</p>`;

        let card_html = `<div>${title_html}${price_html}${desc_html}`;

        $(`#${i}`).html(card_html);
    }
}
