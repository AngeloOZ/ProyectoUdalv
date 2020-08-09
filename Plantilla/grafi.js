am4core.useTheme(am4themes_animated);

var chart = am4core.create("chartdiv", am4charts.PieChart);


chart.data = [{
    "estado": "Lithuania",
    "litres": 501.9,
}, {
    "country": "Czech Republic",
    "litres": 301.9
}, ];

var series = chart.series.push(new am4charts.PieSeries());
series.dataFields.value = "litres";
series.dataFields.category = "country";

// this creates initial animation
series.hiddenState.properties.opacity = 1;
series.hiddenState.properties.endAngle = -20;
series.hiddenState.properties.startAngle = -90;
