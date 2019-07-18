function reflectShops(json) {
    console.log("reflect");
    console.log(json);

    for (let i = 0;i < json.length;i++) {
        let id = json[i]['shopID'];
        let name = json[i]['name'];

        let line = `<option>${id} ${name}</option>`;

        $('.uk-select').append(line);
    }

}
