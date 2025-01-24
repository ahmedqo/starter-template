const donut = $query("#donut"),
    chart = $query("#chart"),
    loaders = $queryAll(".loader"),
    ldonut = $query(".donut-loader"),
    lchart = $query(".chart-loader");

loaders.forEach(loader => {
    setTimeout(() => {
        loader.remove();
    }, Math.floor(Math.random() * 500) + 500);
});

new Chart(donut, {
    type: "doughnut",
    data: {
        labels: $flip([$trans("Payments"), $trans("Charges")]),
        datasets: [{
            data: $flip(counts),
            borderWidth: 1,
            backgroundColor: $flip(["rgb(34 197 94)", "rgb(239 68 68)"]),
            borderColor: $flip(["rgb(34 197 94)", "rgb(239 68 68)"]),
        }, ]
    },
    options: {
        responsive: true,
        cutout: '70%',
        plugins: {
            legend: {
                display: false
            },
        },
        animation: {
            onComplete: () => {
                ldonut.remove();
            }
        }
    }
});

(async() => {
    const data = await getData($routes.chart);
    if (!$zeros(data['creances']) && !$zeros(data['payments']) && !$zeros(data['charges'])) {
        chart.parentElement.innerHTML = notFound();
        lchart.remove();
    } else {
        data['keys'] = data['keys'].map(e => $trans(e));
        new Chart(chart, {
            data: {
                labels: $flip(data['keys']),
                datasets: [
                    ...($zeros(data['creances']) ? [{
                        order: 2,
                        type: "bar",
                        borderWidth: 2,
                        label: $trans('Creance'),
                        data: $flip(data['creances']),
                        backgroundColor: "rgb(234 179 8)",
                        borderColor: "rgb(234 179 8)",
                    }] : []),
                    ...($zeros(data['payments']) ? [{
                        order: 2,
                        type: "bar",
                        borderWidth: 2,
                        label: $trans('Payments'),
                        data: $flip(data['payments']),
                        backgroundColor: "rgb(34 197 94)",
                        borderColor: "rgb(34 197 94)",
                    }] : []),
                    ...($zeros(data['charges']) ? [{
                        order: 1,
                        type: "line",
                        borderWidth: 2,
                        label: $trans('Charges'),
                        data: $flip(data['charges']),
                        backgroundColor: "rgb(239 68 68)",
                        borderColor: "rgb(239 68 68)",
                    }] : []),
                ]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        position: rtl ? "right" : "left"
                    }
                },
                animation: {
                    onComplete: () => {
                        lchart.remove();
                    }
                }
            }
        });
    }
})();