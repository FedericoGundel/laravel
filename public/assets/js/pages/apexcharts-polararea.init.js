/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*********************************************************!*\
  !*** ./resources/js/pages/apexcharts-polararea.init.js ***!
  \*********************************************************/
/******/(function () {
  // webpackBootstrap
  var __webpack_exports__ = {};
  /*!*********************************************************!*\
    !*** ./resources/js/pages/apexcharts-polararea.init.js ***!
    \*********************************************************/
  /******/
  (function () {
    // webpackBootstrap
    var __webpack_exports__ = {};
    /*!*********************************************************!*\
      !*** ./resources/js/pages/apexcharts-polararea.init.js ***!
      \*********************************************************/
    /*
    Template Name: Vuesy - Admin & Dashboard Template
    Author: Themesdesign
    Website: https://Themesdesign.in/
    Contact: themesdesign.in@gmail.com
    File: Polar Area Chart init js
    */

    function getChartColorsArray(chartId) {
      console.log(chartId);
      if (document.getElementById(chartId) !== null) {
        var colors = document.getElementById(chartId).getAttribute("data-colors");
        colors = JSON.parse(colors);
        return colors.map(function (value) {
          var newValue = value.replace(" ", "");
          if (newValue.indexOf(",") === -1) {
            var color = getComputedStyle(document.documentElement).getPropertyValue(newValue);
            if (color) return color;else return newValue;
            ;
          } else {
            var val = value.split(',');
            if (val.length == 2) {
              var rgbaColor = getComputedStyle(document.documentElement).getPropertyValue(val[0]);
              rgbaColor = "rgba(" + rgbaColor + "," + val[1] + ")";
              return rgbaColor;
            } else {
              return newValue;
            }
          }
        });
      }
    }

    // Basic Polar Area 
    var chartBarColors = getChartColorsArray("basic_polar_area");
    var options = {
      series: [14, 23, 21, 17, 15, 10, 12, 17, 21],
      chart: {
        type: 'polarArea',
        width: 400
      },
      labels: ['Series A', 'Series B', 'Series C', 'Series D', 'Series E', 'Series F', 'Series G', 'Series H', 'Series I'],
      stroke: {
        colors: ['#fff']
      },
      fill: {
        opacity: 0.8
      },
      legend: {
        position: 'bottom'
      },
      colors: chartBarColors
    };
    var chart = new ApexCharts(document.querySelector("#basic_polar_area"), options);
    chart.render();

    // Polar-Area Monochrome Charts
    var chartBarColors = getChartColorsArray("monochrome_polar_area");
    var options = {
      series: [42, 47, 52, 58, 65],
      chart: {
        width: 400,
        type: 'polarArea'
      },
      labels: ['Rose A', 'Rose B', 'Rose C', 'Rose D', 'Rose E'],
      fill: {
        opacity: 1
      },
      stroke: {
        width: 1,
        colors: undefined
      },
      yaxis: {
        show: false
      },
      legend: {
        position: 'bottom'
      },
      plotOptions: {
        polarArea: {
          rings: {
            strokeWidth: 0
          },
          spokes: {
            strokeWidth: 0
          }
        }
      },
      theme: {
        mode: 'light',
        palette: 'palette1',
        monochrome: {
          enabled: true,
          shadeTo: 'light',
          color: chartBarColors[0],
          shadeIntensity: 0.6
        }
      }
    };
    var chart = new ApexCharts(document.querySelector("#monochrome_polar_area"), options);
    chart.render();
    /******/
  })();
  /******/
})();
/******/ })()
;