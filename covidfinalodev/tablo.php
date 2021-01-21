<?php
$links = [
    "turkey" => "https://api.covid19api.com/country/turkey?from=2020-11-7T00:00:00Z&to=2021-1-15T00:00:00Z",
    "united-kingdom" => "https://api.covid19api.com/country/united-kingdom?from=2020-11-7T00:00:00Z&to=2021-1-15T00:00:00Z"
];
$covid = [
    "turkey" => [],
    "united-kingdom" => []
];

foreach ($links as $key => $link) {
    $data = file_get_contents($link);
    $data = json_decode($data,1);

    array_push($covid[$key],$data[($key=="turkey")? 0: 10]['Active']);
    array_push($covid[$key],$data[($key=="turkey")? 7: 77]['Active']);
    array_push($covid[$key],$data[($key=="turkey")? 14: 164]['Active']);
    array_push($covid[$key],$data[($key=="turkey")? 21: 234]['Active']);
    array_push($covid[$key],$data[($key=="turkey")? 29: 320]['Active']);
    array_push($covid[$key],$data[($key=="turkey")? 36: 398]['Active']);
    array_push($covid[$key],$data[($key=="turkey")? 43: 473]['Active']);
    array_push($covid[$key],$data[($key=="turkey")? 50: 553]['Active']);
    array_push($covid[$key],$data[($key=="turkey")? 59: 655]['Active']);
    array_push($covid[$key],$data[($key=="turkey")? 66: 733]['Active']);
    array_push($covid[$key],$data[($key=="turkey")? 69: 768]['Active']);
}

?>
<!doctype html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="header">
    Covid-19
</div>
<div class="content">
    <div class="side-bar">
        <ul>
            <li><i class="fas fa-stethoscope"></i> <a href="index.html">COVID-19 Hakkında</a></li>
            <li><i class="fas fa-stethoscope"></i> <a href="asilama-sureci.html">COVID-19 Aşılama Süreci</a></li>
            <li><i class="fas fa-stethoscope"></i> <a href="https://www.pusholder.com/corona-virus/" target="_blank">COVID-19 Haberleri</a></li>
            <li><i class="fas fa-stethoscope"></i> <a class="active" href="tablo.php">COVID-19 Tablo</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="table"></div>
    </div>
</div>
<div class="footer">
    Covid-19 - 21
    <a href="mailto:sercinyous@gmail.com">İletişim</a>
</div>
<script src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
<script src="https://canvasjs.com/assets/script/jquery-ui.1.11.2.min.js"></script>
<script src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>
<script>
    $(document).ready(function () {
        var options = {
            animationEnabled: true,
            theme: "light2",
            title: {
                text: "İngiltere - Türkiye Covid Tablosu"
            },
            axisX: {
                valueFormatString: "DD MMM"
            },
            axisY: {
                title: "Vaka Sayıları",
                suffix: "",
                minimum: 30
            },
            toolTip: {
                shared: true
            },
            legend: {
                cursor: "pointer",
                verticalAlign: "bottom",
                horizontalAlign: "left",
                dockInsidePlotArea: true,
                itemclick: toogleDataSeries
            },
            data: [{
                type: "line",
                showInLegend: true,
                name: "Türkiye",
                markerType: "square",
                xValueFormatString: "DD MMM, YYYY",
                color: "#F08080",
                yValueFormatString: "#,##0",
                dataPoints: [
                    {x: new Date(2020, 11, 7), y: <?=$covid['turkey'][0]?>},
                    {x: new Date(2020, 11, 14), y: <?=$covid['turkey'][1]?>},
                    {x: new Date(2020, 11, 21), y: <?=$covid['turkey'][2]?>},
                    {x: new Date(2020, 11, 28), y: <?=$covid['turkey'][3]?>},
                    {x: new Date(2020, 12, 6), y: <?=$covid['turkey'][4]?>},
                    {x: new Date(2020, 12, 13), y: <?=$covid['turkey'][5]?>},
                    {x: new Date(2020, 12, 20), y: <?=$covid['turkey'][6]?>},
                    {x: new Date(2020, 12, 27), y: <?=$covid['turkey'][7]?>},
                    {x: new Date(2021, 1, 5), y: <?=$covid['turkey'][8]?>},
                    {x: new Date(2021, 1, 12), y: <?=$covid['turkey'][9]?>},
                    {x: new Date(2021, 1, 15), y: <?=$covid['turkey'][10]?>}
                ]
            },
                {
                    type: "line",
                    showInLegend: true,
                    name: "İngiltere",
                    lineDashType: "dash",
                    yValueFormatString: "#,##0",
                    dataPoints: [
                        {x: new Date(2020, 11, 7), y: <?=$covid['united-kingdom'][0]?>},
                        {x: new Date(2020, 11, 14), y: <?=$covid['united-kingdom'][1]?>},
                        {x: new Date(2020, 11, 21), y: <?=$covid['united-kingdom'][2]?>},
                        {x: new Date(2020, 11, 28), y: <?=$covid['united-kingdom'][3]?>},
                        {x: new Date(2020, 12, 6), y: <?=$covid['united-kingdom'][4]?>},
                        {x: new Date(2020, 12, 13), y: <?=$covid['united-kingdom'][5]?>},
                        {x: new Date(2020, 12, 20), y: <?=$covid['united-kingdom'][6]?>},
                        {x: new Date(2020, 12, 27), y: <?=$covid['united-kingdom'][7]?>},
                        {x: new Date(2021, 1, 5), y: <?=$covid['united-kingdom'][8]?>},
                        {x: new Date(2021, 1, 12), y: <?=$covid['united-kingdom'][9]?>},
                        {x: new Date(2021, 1, 15), y: <?=$covid['united-kingdom'][10]?>}
                    ]
                }]
        };
        $(".table").CanvasJSChart(options);

        function toogleDataSeries(e) {
            if (typeof (e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
                e.dataSeries.visible = false;
            } else {
                e.dataSeries.visible = true;
            }
            e.chart.render();
        }
    })
</script>
</body>
</html>
