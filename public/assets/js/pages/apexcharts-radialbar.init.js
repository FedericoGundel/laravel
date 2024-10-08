/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*********************************************************!*\
  !*** ./resources/js/pages/apexcharts-radialbar.init.js ***!
  \*********************************************************/
/******/(function () {
  // webpackBootstrap
  var __webpack_exports__ = {};
  /*!*********************************************************!*\
    !*** ./resources/js/pages/apexcharts-radialbar.init.js ***!
    \*********************************************************/
  /******/
  (function () {
    // webpackBootstrap
    var __webpack_exports__ = {};
    /*!*********************************************************!*\
      !*** ./resources/js/pages/apexcharts-radialbar.init.js ***!
      \*********************************************************/
    /*
    Template Name: Vuesy - Admin & Dashboard Template
    Author: Themesdesign
    Website: https://Themesdesign.in/
    Contact: themesdesign.in@gmail.com
    File: Radialbar Chart init js
    */

    // get colors array from the string
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

    //  Radialbar Charts
    var chartBarColors = getChartColorsArray("basic_radialbar");
    var options = {
      series: [70],
      chart: {
        height: 350,
        type: 'radialBar'
      },
      plotOptions: {
        radialBar: {
          hollow: {
            size: '70%'
          }
        }
      },
      labels: ['Cricket'],
      colors: chartBarColors
    };
    var chart = new ApexCharts(document.querySelector("#basic_radialbar"), options);
    chart.render();

    // Multi-Radial Bar
    var chartBarColors = getChartColorsArray("multiple_radialbar");
    var options = {
      series: [44, 55, 67, 83],
      chart: {
        height: 350,
        type: 'radialBar'
      },
      plotOptions: {
        radialBar: {
          dataLabels: {
            name: {
              fontSize: '22px'
            },
            value: {
              fontSize: '16px'
            },
            total: {
              show: true,
              label: 'Total',
              formatter: function formatter(w) {
                return 249;
              }
            }
          }
        }
      },
      labels: ['Apples', 'Oranges', 'Bananas', 'Berries'],
      colors: chartBarColors
    };
    var chart = new ApexCharts(document.querySelector("#multiple_radialbar"), options);
    chart.render();

    // Circle Chart - Custom Angle
    var chartBarColors = getChartColorsArray("circle_radialbar");
    var options = {
      series: [76, 67, 61, 55],
      chart: {
        height: 350,
        type: 'radialBar'
      },
      plotOptions: {
        radialBar: {
          offsetY: 0,
          startAngle: 0,
          endAngle: 270,
          hollow: {
            margin: 5,
            size: '30%',
            background: 'transparent',
            image: undefined
          },
          dataLabels: {
            name: {
              show: false
            },
            value: {
              show: false
            }
          }
        }
      },
      colors: chartBarColors,
      labels: ['Vimeo', 'Messenger', 'Facebook', 'LinkedIn'],
      legend: {
        show: true,
        floating: true,
        fontSize: '16px',
        position: 'left',
        offsetX: 160,
        offsetY: 15,
        labels: {
          useSeriesColors: true
        },
        markers: {
          size: 0
        },
        formatter: function formatter(seriesName, opts) {
          return seriesName + ":  " + opts.w.globals.series[opts.seriesIndex];
        },
        itemMargin: {
          vertical: 3
        }
      },
      responsive: [{
        breakpoint: 480,
        options: {
          legend: {
            show: false
          }
        }
      }]
    };
    var chart = new ApexCharts(document.querySelector("#circle_radialbar"), options);
    chart.render();

    // Gradient Radialbar
    var chartBarColors = getChartColorsArray("gradient_radialbar");
    var options = {
      series: [75],
      chart: {
        height: 350,
        type: 'radialBar',
        toolbar: {
          show: false
        }
      },
      plotOptions: {
        radialBar: {
          startAngle: -135,
          endAngle: 225,
          hollow: {
            margin: 0,
            size: '70%',
            image: undefined,
            imageOffsetX: 0,
            imageOffsetY: 0,
            position: 'front'
          },
          track: {
            strokeWidth: '67%',
            margin: 0 // margin is in pixels
          },
          dataLabels: {
            show: true,
            name: {
              offsetY: -10,
              show: true,
              color: '#888',
              fontSize: '17px'
            },
            value: {
              formatter: function formatter(val) {
                return parseInt(val);
              },
              color: '#111',
              fontSize: '36px',
              show: true
            }
          }
        }
      },
      fill: {
        type: 'gradient',
        gradient: {
          shade: 'dark',
          type: 'horizontal',
          shadeIntensity: 0.5,
          gradientToColors: chartBarColors,
          inverseColors: true,
          opacityFrom: 1,
          opacityTo: 1,
          stops: [0, 100]
        }
      },
      stroke: {
        lineCap: 'round'
      },
      labels: ['Percent']
    };
    var chart = new ApexCharts(document.querySelector("#gradient_radialbar"), options);
    chart.render();

    // Stroked Gauge
    var chartBarColors = getChartColorsArray("stroked_radialbar");
    var options = {
      series: [67],
      chart: {
        height: 326,
        type: 'radialBar',
        offsetY: -10
      },
      plotOptions: {
        radialBar: {
          startAngle: -135,
          endAngle: 135,
          dataLabels: {
            name: {
              fontSize: '16px',
              color: undefined,
              offsetY: 120
            },
            value: {
              offsetY: 76,
              fontSize: '22px',
              color: undefined,
              formatter: function formatter(val) {
                return val + "%";
              }
            }
          }
        }
      },
      fill: {
        type: 'gradient',
        gradient: {
          shade: 'dark',
          shadeIntensity: 0.15,
          inverseColors: false,
          opacityFrom: 1,
          opacityTo: 1,
          stops: [0, 50, 65, 91]
        }
      },
      stroke: {
        dashArray: 4
      },
      labels: ['Median Ratio'],
      colors: chartBarColors
    };
    var chart = new ApexCharts(document.querySelector("#stroked_radialbar"), options);
    chart.render();

    // Semi Circle
    var chartBarColors = getChartColorsArray("semi_radialbar");
    var options = {
      series: [76],
      chart: {
        type: 'radialBar',
        height: 350,
        offsetY: -20,
        sparkline: {
          enabled: true
        }
      },
      plotOptions: {
        radialBar: {
          startAngle: -90,
          endAngle: 90,
          track: {
            background: "#e7e7e7",
            strokeWidth: '97%',
            margin: 5,
            // margin is in pixels
            dropShadow: {
              enabled: true,
              top: 2,
              left: 0,
              color: '#999',
              opacity: 1,
              blur: 2
            }
          },
          dataLabels: {
            name: {
              show: false
            },
            value: {
              offsetY: -2,
              fontSize: '22px'
            }
          }
        }
      },
      grid: {
        padding: {
          top: -10
        }
      },
      fill: {
        type: 'gradient',
        gradient: {
          shade: 'light',
          shadeIntensity: 0.4,
          inverseColors: false,
          opacityFrom: 1,
          opacityTo: 1,
          stops: [0, 50, 53, 91]
        }
      },
      labels: ['Average Results'],
      colors: chartBarColors
    };
    var chart = new ApexCharts(document.querySelector("#semi_radialbar"), options);
    chart.render();
    /******/
  })();
  /******/
})();
/******/ })()
;