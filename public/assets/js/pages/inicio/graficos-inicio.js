/******/ (() => {
    // webpackBootstrap

    var __webpack_exports__ = {};

    /*!****************************************************!*\

      !*** ./resources/js/pages/apexcharts-area.init.js ***!

      \****************************************************/

    /******/ (function () {
        // webpackBootstrap

        var __webpack_exports__ = {};

        /*!****************************************************!*\

        !*** ./resources/js/pages/apexcharts-area.init.js ***!

        \****************************************************/

        /******/

        (function () {
            // webpackBootstrap

            var __webpack_exports__ = {};

            /*!****************************************************!*\

          !*** ./resources/js/pages/apexcharts-area.init.js ***!

          \****************************************************/

            /*

        Template Name: Vuesy - Admin & Dashboard Template

        Author: Themesdesign

        Website: https://Themesdesign.in/

        Contact: themesdesign.in@gmail.com

        File: Area Chart init js

        */

            // get colors array from the string

            function getChartColorsArray(chartId) {
                console.log(chartId);

                if (document.getElementById(chartId) !== null) {
                    var colors = document
                        .getElementById(chartId)
                        .getAttribute("data-colors");

                    colors = JSON.parse(colors);

                    return colors.map(function (value) {
                        var newValue = value.replace(" ", "");

                        if (newValue.indexOf(",") === -1) {
                            var color = getComputedStyle(
                                document.documentElement
                            ).getPropertyValue(newValue);

                            if (color) return color;
                            else return newValue;
                        } else {
                            var val = value.split(",");

                            if (val.length == 2) {
                                var rgbaColor = getComputedStyle(
                                    document.documentElement
                                ).getPropertyValue(val[0]);

                                rgbaColor =
                                    "rgba(" + rgbaColor + "," + val[1] + ")";

                                return rgbaColor;
                            } else {
                                return newValue;
                            }
                        }
                    });
                }
            }

            let today = new Date();

            // Calcula la fecha de hace 7 días
            let sevenDaysAgo = new Date();
            sevenDaysAgo.setDate(today.getDate() - 7);

            var date_range = flatpickr("#rango-fechas-inicio", {
                mode: "range",
                locale: "es", // Configura el idioma a español
                defaultDate: [sevenDaysAgo, today], // Establece el rango de los últimos 7 días
                onChange: function (selectedDates, dateStr, instance) {
                    // Reemplaza "to" con "hasta"
                    instance.element.value = dateStr.replace("to", "hasta");
                },
                // Al cargar el componente, se asegura de que las fechas iniciales se impriman
                onReady: function (selectedDates) {
                    printDateArray(selectedDates);
                },
            });

            var form = document.getElementById("form_dates");
            form.addEventListener("submit", (event) => {
                event.preventDefault();
                var selectedDates = date_range.selectedDates;
                printDateArray(selectedDates);
            });

            // Función para imprimir el arreglo de fechas
            function printDateArray(selectedDates) {
                if (selectedDates.length === 2) {
                    const startDate = selectedDates[0];
                    const endDate = selectedDates[1];
                    const dateArray = [];

                    let currentDate = new Date(startDate);

                    // Recorre todas las fechas desde startDate hasta endDate
                    while (currentDate <= endDate) {
                        dateArray.push(currentDate.toISOString().split("T")[0]);
                        currentDate.setDate(currentDate.getDate() + 1); // Avanza un día
                    }

                    // Imprime el arreglo en la consola
                    console.log(dateArray);
                    var csrfToken = document.querySelector(
                        'input[name="_token"]'
                    ).value;
                    fetch("get-productos-pedido-days", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                        },
                        body: JSON.stringify({
                            dates: dateArray,
                            _token: csrfToken,
                        }), // Envía el arreglo de fechas
                    })
                        .then((response) => response.json())
                        .then((data) => {
                            let totalCantidadRango = 0;
                            let totalVerificadoRango = 0;
                            let totalCantidadHoy = 0;
                            let totalVerificadoHoy = 0;
                            for (const [date, pedidos] of Object.entries(
                                data.productosPedidosPorDia
                            )) {
                                if (data.dateRange.includes(date)) {
                                    // Calculate totals for the date range
                                    totalCantidadRango += pedidos
                                        .filter(
                                            (pedido) => pedido.verificado === 0
                                        )
                                        .reduce((sum, pedido) => sum + 1, 0);
                                    totalVerificadoRango += pedidos
                                        .filter(
                                            (pedido) => pedido.verificado === 1
                                        )
                                        .reduce((sum, pedido) => sum + 1, 0);
                                }
                            }

                            // Process data for today
                            totalCantidadHoy = data.today.reduce(
                                (sum, pedido) => sum + 1,
                                0
                            );
                            totalVerificadoHoy = data.today
                                .filter((pedido) => pedido.verificado === 1)
                                .reduce((sum, pedido) => sum + 1, 0);
                            document.getElementById("entradas").innerText =
                                totalCantidadRango;
                            document.getElementById("referencias").innerText =
                                totalVerificadoRango;
                            document.getElementById("entradas_hoy").innerText =
                                totalCantidadHoy;
                            document.getElementById(
                                "referencias_hoy"
                            ).innerText = totalVerificadoHoy;
                            initChart(data);
                            console.log(data);
                        })
                        .catch((error) => {
                            console.error("Error:", error);
                        });

                    fetch("get-productos-pedido-days-user", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                        },
                        body: JSON.stringify({
                            dates: dateArray,
                            _token: csrfToken,
                        }), // Envía el arreglo de fechas
                    })
                        .then((response) => response.json())
                        .then((data) => {
                            console.log(data);
                            initChart2(data);
                        })
                        .catch((error) => {
                            console.error("Error:", error);
                        });
                }
            }

            // Basic area Charts

            //  Spline Area Charts

            var chartBarColors = getChartColorsArray(
                "grafico-entradas-referencias"
            );
            var chart;
            function initChart(dataObject) {
                var categories = dataObject.dateRange;

                // Calcular "Entradas" y "Referencias" para cada día
                var entradas = categories.map(
                    (date) => dataObject.productosPedidosPorDia[date].length
                );
                var referencias = categories.map(
                    (date) =>
                        dataObject.productosPedidosPorDia[date].filter(
                            (producto) => producto.verificado === 1
                        ).length
                );

                var options = {
                    series: [
                        {
                            name: "Entradas",
                            data: entradas, // Cantidad total de productos por día
                        },
                        {
                            name: "Referencias",
                            data: referencias, // Cantidad de productos verificados por día
                        },
                    ],
                    chart: {
                        height: 350,
                        type: "area",
                        defaultLocale: "en",
                        locales: [
                            {
                                name: "en",
                                options: {
                                    months: [
                                        "Enero",
                                        "Febrero",
                                        "Marzo",
                                        "Abril",
                                        "Mayo",
                                        "Junio",
                                        "Julio",
                                        "Agosto",
                                        "Septiembre",
                                        "Octubre",
                                        "Noviembre",
                                        "Diciembre",
                                    ],
                                    shortMonths: [
                                        "Jan",
                                        "Feb",
                                        "Mar",
                                        "Apr",
                                        "May",
                                        "Jun",
                                        "Jul",
                                        "Aug",
                                        "Sep",
                                        "Oct",
                                        "Nov",
                                        "Dec",
                                    ],
                                    days: [
                                        "Domingo",
                                        "Lunes",
                                        "Martes",
                                        "Miércoles",
                                        "Jueves",
                                        "Viernes",
                                        "Sábado",
                                    ],
                                    shortDays: [
                                        "Sun",
                                        "Mon",
                                        "Tue",
                                        "Wed",
                                        "Thu",
                                        "Fri",
                                        "Sat",
                                    ],
                                    toolbar: {
                                        download: "Descargar",
                                        selection: "Seleccion",
                                        selectionZoom: "Zoom",
                                        zoomIn: "Zoom In",
                                        zoomOut: "Zoom Out",
                                        pan: "Panning",
                                        reset: "Reset Zoom",
                                    },
                                },
                            },
                        ],
                    },
                    dataLabels: {
                        enabled: false,
                    },
                    stroke: {
                        curve: "smooth",
                    },
                    colors: chartBarColors,
                    xaxis: {
                        type: "datetime",
                        categories: categories, // Fechas del rango
                    },
                    tooltip: {
                        x: {
                            format: "dd/MM/yy HH:mm",
                        },
                    },
                    yaxis: {
                        labels: {
                            formatter: function (value) {
                                return Math.floor(value); // Redondear el valor hacia abajo para que sea un entero
                            },
                        },
                    },
                    tooltip: {
                        y: {
                            formatter: function (value) {
                                return Math.floor(value); // Redondear el valor hacia abajo para que sea un entero
                            },
                        },
                    },
                };
                if (chart) {
                    chart.destroy();
                }
                chart = new ApexCharts(
                    document.querySelector("#grafico-entradas-referencias"),
                    options
                );

                chart.render();
            }

            chartBarColors = getChartColorsArray("grafico-operarios");
            var chart2;

            function initChart2(dataObject) {
                var categories = dataObject.dateRange;
                var series = [];

                // Crear una serie para cada operario y contar productos por día
                var operarios = {};

                for (let date in dataObject.productosPedidosPorDia) {
                    let pedidosPorDia = dataObject.productosPedidosPorDia[date];

                    pedidosPorDia.forEach((pedido) => {
                        if (!operarios[pedido.username]) {
                            operarios[pedido.username] = {
                                name: pedido.username,
                                data: new Array(categories.length).fill(0), // Inicializar datos a 0
                            };
                        }

                        let dayIndex = categories.indexOf(date);
                        if (dayIndex !== -1) {
                            operarios[pedido.username].data[dayIndex] +=
                                pedido.productos_pedido.length;
                        }
                    });
                }

                // Convertir el objeto en un array de series
                for (let operario in operarios) {
                    series.push(operarios[operario]);
                }

                var options = {
                    series: series,
                    chart: {
                        height: 350,
                        type: "area",
                        defaultLocale: "en",
                        locales: [
                            {
                                name: "en",
                                options: {
                                    months: [
                                        "Enero",
                                        "Febrero",
                                        "Marzo",
                                        "Abril",
                                        "Mayo",
                                        "Junio",
                                        "Julio",
                                        "Agosto",
                                        "Septiembre",
                                        "Octubre",
                                        "Noviembre",
                                        "Diciembre",
                                    ],
                                    shortMonths: [
                                        "Jan",
                                        "Feb",
                                        "Mar",
                                        "Apr",
                                        "May",
                                        "Jun",
                                        "Jul",
                                        "Aug",
                                        "Sep",
                                        "Oct",
                                        "Nov",
                                        "Dec",
                                    ],
                                    days: [
                                        "Domingo",
                                        "Lunes",
                                        "Martes",
                                        "Miércoles",
                                        "Jueves",
                                        "Viernes",
                                        "Sábado",
                                    ],
                                    shortDays: [
                                        "Sun",
                                        "Mon",
                                        "Tue",
                                        "Wed",
                                        "Thu",
                                        "Fri",
                                        "Sat",
                                    ],
                                    toolbar: {
                                        download: "Descargar",
                                        selection: "Seleccion",
                                        selectionZoom: "Zoom",
                                        zoomIn: "Zoom In",
                                        zoomOut: "Zoom Out",
                                        pan: "Panning",
                                        reset: "Reset Zoom",
                                    },
                                },
                            },
                        ],
                    },
                    dataLabels: {
                        enabled: false,
                    },
                    stroke: {
                        curve: "smooth",
                    },
                    colors: chartBarColors,
                    xaxis: {
                        type: "datetime",
                        categories: categories, // Fechas del rango
                    },
                    yaxis: {
                        labels: {
                            formatter: function (value) {
                                return Math.floor(value); // Redondear el valor hacia abajo para que sea un entero
                            },
                        },
                    },
                    tooltip: {
                        x: {
                            format: "dd/MM/yy HH:mm",
                        },
                        y: {
                            formatter: function (value) {
                                return Math.floor(value); // Redondear el valor hacia abajo para que sea un entero
                            },
                        },
                    },
                };

                if (chart2) {
                    chart2.destroy();
                }

                chart2 = new ApexCharts(
                    document.querySelector("#grafico-operarios"),
                    options
                );

                chart2.render();
            }

            var table = document.getElementById("tabla-usuarios");

            var tabla_miembros = new DataTable(table, {
                responsive: true,
                dom: "Blfrtip",
                lengthMenu: [
                    [10, 25, 50, -1],
                    [10, 25, 50, "Todos"],
                ],
                pageLength: 10,
                language: {
                    search: "Buscar",
                    emptyTable: "No hay información",
                    info: "Mostrando _START_ a _END_ de _TOTAL_ en operarios",
                    infoEmpty: "Mostrando operarios",
                    infoFiltered: "(Filtrado del total de entradas)",
                    infoPostFix: "",
                    thousands: ",",
                    lengthMenu: "Mostrar _MENU_ Entradas",
                    // loadingRecords: "Cargando...",

                    processing: "Cargando...",
                    loadingRecords: "",
                    paginate: {
                        first: "Primero",
                        last: "Ultimo",
                        next: "Siguiente",
                        previous: "Anterior",
                    },
                },
                stateSave: true,
                stateSaveCallback: function (settings, data) {
                    localStorage.setItem(
                        "DataTables_" + settings.sInstance,
                        JSON.stringify(data)
                    );
                },
                stateLoadCallback: function (settings) {
                    return JSON.parse(
                        localStorage.getItem("DataTables_" + settings.sInstance)
                    );
                },
                order: [[0, "desc"]],
                buttons: [],
                searching: true,
                serverSide: false,
                ajax: {
                    url: "get-users", // Ruta que devuelve los datos de los clientes
                    method: "GET",
                    cache: false,
                    dataSrc: function (json) {
                        console.log(json);

                        return json;
                    }, // La propiedad que contiene los datos en la respuesta del servidor
                },
                columns: [
                    {
                        name: "foto",
                        className: "text-start align-middle",
                        data: null,
                        render: function (data, type, row, meta) {
                            var imagen;
                            if (!data.profile_image) {
                                imagen =
                                    '<div class="flex-shrink-0 me-3"><img src="/assets/images/profile_images/default.svg" alt="" class="avatar rounded-circle"></div>';
                            } else {
                                imagen =
                                    '<div class="flex-shrink-0 me-3"><img src="/assets/images/profile_images/' +
                                    data.id +
                                    '.png" alt="" class="avatar rounded-circle"></div>';
                            }
                            return imagen;
                        },
                    },
                    {
                        className: "text-start align-middle",
                        name: "Usuario",
                        data: "username",
                    },
                    {
                        className: "text-start align-middle",
                        name: "referencias",
                        data: "productos_pedido",
                        render: function (data, type, row, meta) {
                            return data.length;
                        },
                    },
                ],
                initComplete: function (settings, json) {},
            });

            /******/
        })();

        /******/
    })();

    /******/
})();
