am4core.useTheme(am4themes_animated);

var chart = am4core.create("chartdiv", am4charts.PieChart);
setTimeout(()=>{
    console.log(popo);
    chart.data = [{
        "name": popo[0].name,
        "numero": popo[0].numero ,
    }, {
        "name": popo[1].name,
        "numero": popo[1].numero
    },
    {
        "name": popo[2].name,
        "numero": popo[2].numero ,
    }, {
        "name": popo[3].name,
        "numero": popo[3].numero
    }, 
    {
        "name": popo[4].name,
        "numero": popo[4].numero ,
    }, ];
    },500)

/*chart.data = [{
    "name": "Lithuania",
    "numero": popo[0].numero ,
}, {
    "name": "Czech Republic",
    "numero": popo[2].numero
}, ];*/

var series = chart.series.push(new am4charts.PieSeries());
series.dataFields.value = "numero";
series.dataFields.category = "name";

// this creates initial animation
series.hiddenState.properties.opacity = 1;
series.hiddenState.properties.endAngle = -20;
series.hiddenState.properties.startAngle = -90;
