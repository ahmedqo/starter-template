const donut = $dom("#donut"),
    chart = $dom("#chart"),
    loaders = $dom(".loader", { many: true }),
    ldonut = $dom(".donut-loader"),
    lchart = $dom(".chart-loader");

loaders.forEach(loader => {
    setTimeout(() => {
        loader.remove();
    }, Math.floor(Math.random() * 500) + 500);
});