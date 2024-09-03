/******/ (() => {
    // webpackBootstrap
    var __webpack_exports__ = {};
    /*!*******************************************!*\
      !*** ./resources/js/pages/gridjs.init.js ***!
      \*******************************************/
    /******/ (function () {
        // webpackBootstrap
        var __webpack_exports__ = {};
        /*!*******************************************!*\
        !*** ./resources/js/pages/gridjs.init.js ***!
        \*******************************************/
        /******/
        (function () {
            // webpackBootstrap
            var __webpack_exports__ = {};
            /*!*******************************************!*\
          !*** ./resources/js/pages/gridjs.init.js ***!
          \*******************************************/
            /*
        Template Name: Vuesy - Admin & Dashboard Template
        Author: Themesdesign
        Website: https://Themesdesign.in/
        Contact: themesdesign.in@gmail.com
        File: grid Js File
        */

            var table = document.getElementById("tabla-pedidos");
            console.log(table);
            var url = table.getAttribute("data-url");

            const modal_verificar = new bootstrap.Modal("#modal-scanner");
            const modal_ver_producto = new bootstrap.Modal(
                "#modal-ver-producto"
            );
            const modal_sacar_foto = new bootstrap.Modal("#modal-sacar-foto");
            const modal_buscar_productos = new bootstrap.Modal(
                "#modal-buscar-productos"
            );
            const modal_anomalias = new bootstrap.Modal("#modal-anomalia");
            var table4 = document.getElementById("tabla-buscar-productos");

            var tabla_buscar_productos = new DataTable(table4, {
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
                    info: "Mostrando productos del pedido",
                    infoEmpty: "Mostrando productos del pedido",
                    infoFiltered: "(Filtrado de _MAX_ total entradas)",
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
                buttons: [
                    {
                        extend: "colvis",
                        text: "Ocultar Columnas",
                        collectionLayout: "fixed two-column",
                        className: "form-control mb-4",
                    },
                ],
                searching: true,
                serverSide: false,
                columns: [
                    {
                        className: "text-start align-middle",
                        name: "nombre",
                        data: "nombre",
                    },
                    {
                        className: "text-start align-middle",
                        name: "codigo",
                        data: "codigo",
                    },
                    {
                        className: "text-start align-middle",
                        name: "ean",
                        data: "ean",
                    },
                    {
                        className: "text-start align-middle",
                        name: "Acciones",
                        data: "ean",
                        render: function (data, type, row) {
                            return (
                                '<button data-ean="' +
                                data +
                                '" class="btn btn-success btn_verificar">Verificar</button>'
                            );
                        },
                    },
                ],
                initComplete: function (settings, json) {
                    var paginationContainer = table4
                        .closest(".dt-container")
                        .querySelector(".dt-paging");
                    paginationContainer.classList.add("mt-4");
                },
            });
            var tabla_productos = new DataTable(table, {
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
                    info: "Mostrando _START_ a _END_ de _TOTAL_ en pedidos",
                    infoEmpty: "Mostrando 0 a 0 de 0 en pedidos",
                    infoFiltered: "(Filtrado de _MAX_ total entradas)",
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
                buttons: [
                    {
                        extend: "colvis",
                        text: "Ocultar Columnas",
                        collectionLayout: "fixed two-column",
                        className: "form-control mb-4",
                    },
                ],

                searching: true,
                serverSide: false,
                ajax: {
                    url: url, // Ruta que devuelve los datos de los clientes
                    method: "GET",
                    cache: false,
                    dataSrc: function (json) {
                        console.log(json);
                        document.getElementById("pedidos_count").innerText =
                            json.length;
                        return json;
                    }, // La propiedad que contiene los datos en la respuesta del servidor
                },
                columns: [
                    {
                        name: "Productos",
                        className: "text-start align-middle",
                        data: "inventario",
                        render: function (data, type, row, meta) {
                            console.log(JSON.parse(data));
                            var nombres = JSON.parse(data);

                            let ul = document.createElement("ul");

                            // Recorrer el arreglo 'data' y crear elementos li para cada elemento
                            for (let r of nombres) {
                                // Crear un elemento li
                                let li = document.createElement("li");

                                // Establecer el texto del li como el valor de 'nombre'
                                li.textContent = r.nombre;

                                // Agregar el li al ul
                                ul.appendChild(li);
                            }
                            return ul.outerHTML;
                        },
                    },
                    {
                        name: "Cantidades",
                        className: "text-start align-middle",
                        data: "inventario",
                        render: function (data, type, row, meta) {
                            console.log(JSON.parse(data));
                            var nombres = JSON.parse(data);

                            let ul = document.createElement("ul");

                            // Recorrer el arreglo 'data' y crear elementos li para cada elemento
                            for (let r of nombres) {
                                // Crear un elemento li
                                let li = document.createElement("li");

                                // Establecer el texto del li como el valor de 'nombre'
                                li.textContent = r.cantidad;

                                // Agregar el li al ul
                                ul.appendChild(li);
                            }
                            return ul.outerHTML;
                        },
                    },
                    {
                        className: "text-start align-middle",
                        name: "Transportista",
                        data: null,
                        render: function (data, type, row, meta) {
                            return "Ninguno";
                        },
                    },
                    {
                        className: "text-start align-middle",
                        name: "Nº pedido",
                        data: "numero",
                    },
                    {
                        className: "text-start align-middle",
                        name: "Acciones",
                        data: "id",
                        render: function (data, type, row) {
                            return (
                                '<button data-id="' +
                                data +
                                '" class="btn btn-success btn_verificar">Verificar</button>'
                            );
                        },
                    },
                ],
                initComplete: function (settings, json) {
                    var paginationContainer = table
                        .closest(".dt-container")
                        .querySelector(".dt-paging");
                    paginationContainer.classList.add("mt-4");
                    var btn_verificar =
                        document.querySelectorAll(".btn_verificar");
                    btn_verificar.forEach(function (btn) {
                        btn.addEventListener("click", function (e) {
                            var id = e.target.getAttribute("data-id");
                            var modal =
                                document.getElementById("modal-scanner");
                            modal.setAttribute("data-id", id);
                            console.log(modal.getAttribute("data-id"));
                            modal_verificar.show();
                        });
                    });
                },
            });
            document
                .getElementById("btn_buscar_productos")
                .addEventListener("click", function (e) {
                    var modal = document.getElementById("modal-scanner");
                    var id = modal.getAttribute("data-id");
                    document.querySelector(
                        "#tabla-buscar-productos tbody"
                    ).innerHTML = "";
                    fetch("get-pedido/" + id)
                        .then((response) => response.json())
                        .then((data) => {
                            var inventario = JSON.parse(data.inventario);
                            for (let i of inventario) {
                                var tr = document.createElement("tr");
                                var td1 = document.createElement("td");
                                var td2 = document.createElement("td");
                                var td3 = document.createElement("td");
                                var td4 = document.createElement("td");

                                // Crear el elemento botón
                                var botonVerificar =
                                    document.createElement("button");
                                // Agregar clases al botón
                                botonVerificar.classList.add(
                                    "btn",
                                    "btn-success",
                                    "me-2",
                                    "btn_verificar"
                                );
                                // Agregar texto al botón
                                botonVerificar.innerText = "Verificar";

                                // Agregar event listener al botón
                                botonVerificar.addEventListener(
                                    "click",
                                    function () {
                                        document.getElementById(
                                            "ver_nombre_producto"
                                        ).innerText = i.nombre;
                                        document.getElementById(
                                            "ver_cantidad_producto"
                                        ).value = i.cantidad;
                                        document
                                            .getElementById(
                                                "ver_cantidad_producto"
                                            )
                                            .setAttribute(
                                                "data-cantidad",
                                                i.cantidad
                                            );
                                        document.getElementById(
                                            "ver_ean_producto"
                                        ).innerText = i.ean;

                                        modal_ver_producto.show();
                                    }
                                );

                                td1.innerText = i.nombre;
                                td2.innerText = i.codigo;
                                td3.innerText = i.ean;
                                td4.appendChild(botonVerificar); // Usamos appendChild en lugar de innerHTML para agregar el botón al td4
                                tr.appendChild(td1);
                                tr.appendChild(td2);
                                tr.appendChild(td3);
                                tr.appendChild(td4);
                                document
                                    .querySelector(
                                        "#tabla-buscar-productos tbody"
                                    )
                                    .appendChild(tr);
                            }
                        });
                    modal_buscar_productos.show();
                });

            Quagga.init(
                {
                    inputStream: {
                        name: "Live",
                        type: "LiveStream",
                        target: document.querySelector("#quagga-scanner"), // Elemento HTML donde se mostrará la vista previa
                        constraints: {
                            facingMode: "environment", // Usa la cámara trasera del dispositivo si está disponible
                        },
                    },
                    decoder: {
                        readers: ["ean_8_reader", "ean_reader"],
                        multiple: false,
                    },
                },
                function (err) {
                    if (err) {
                        console.log(err);
                        return;
                    }

                    Quagga.stop();
                }
            );
            document
                .getElementById("btn-modificar-producto")
                .addEventListener("click", function () {
                    document.querySelector("#anomalias_producto").innerHTML =
                        "";
                    var cantidad_esperada = document
                        .getElementById("ver_cantidad_producto")
                        .getAttribute("data-cantidad");
                    var cantidad_encontrada = document.getElementById(
                        "ver_cantidad_producto"
                    ).value;
                    if (cantidad_esperada != cantidad_encontrada) {
                        var a = cantidad_esperada - cantidad_encontrada;
                        var li = document.createElement("li");
                        li.classList.add("anomalia", "text-start");
                        li.setAttribute("data-tipo", "cantidad");
                        li.setAttribute("data-anomalia", a);
                        li.innerText =
                            "El inventario del producto especifica una cantidad de " +
                            cantidad_esperada +
                            " productos pero se contaron " +
                            cantidad_encontrada;
                        document
                            .querySelector("#anomalias_producto")
                            .appendChild(li);
                        modal_anomalias.show();
                    }
                });

            document
                .getElementById("btn-escanear")
                .addEventListener("click", function () {
                    Quagga.init(
                        {
                            inputStream: {
                                name: "Live",
                                type: "LiveStream",
                                target: document.querySelector(
                                    "#quagga-scanner"
                                ),
                            },
                            decoder: {
                                readers: ["ean_8_reader", "ean_reader"],
                                multiple: false,
                            },
                        },
                        function (err) {
                            if (err) {
                                console.log(err);
                                return;
                            }

                            Quagga.start();
                            Quagga.onDetected((result) => {
                                var modal =
                                    document.getElementById("modal-scanner");
                                var id = modal.getAttribute("data-id");
                                Quagga.stop();
                                fetch("get-pedido/" + id)
                                    .then((response) => response.json())
                                    .then((data) => {
                                        var inventario = JSON.parse(
                                            data.inventario
                                        );
                                        console.log(result);
                                        console.log(result.codeResult.code);

                                        if (
                                            existsWithEAN(
                                                inventario,
                                                result.codeResult.code
                                            )
                                        ) {
                                            var producto;
                                            for (
                                                var i = 0;
                                                i < inventario.length;
                                                i++
                                            ) {
                                                // Verificar si el EAN coincide
                                                if (
                                                    inventario[i].ean ===
                                                    result.codeResult.code
                                                ) {
                                                    producto = inventario[i];
                                                    document.getElementById(
                                                        "ver_nombre_producto"
                                                    ).innerText =
                                                        producto.nombre;
                                                    document.getElementById(
                                                        "ver_cantidad_producto"
                                                    ).value = producto.cantidad;
                                                    document.getElementById(
                                                        "ver_ean_producto"
                                                    ).innerText = producto.ean;

                                                    modal_ver_producto.show();
                                                    console.log(producto);
                                                }
                                            }
                                        } else {
                                            iziToast.show({
                                                title: "Producto no encontrado!",
                                                titleSize: "",
                                                titleLineHeight: "",
                                                titleColor: "#ffffff",
                                                message:
                                                    "El pedido no contiene ningún producto con este EAN.",
                                                messageSize: "",
                                                messageLineHeight: "",
                                                messageColor: "#ffffff",
                                                backgroundColor: "#e1665d",
                                                theme: "light", // dark
                                                color: "", // blue, red, green, yellow
                                                icon: "fas fa-times-circle icono-toast",
                                                iconColor: "#ffffff",
                                                timeout: 7000,
                                                position: "topRight", // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter, center
                                                transitionIn: "fadeInUp",
                                                transitionOut: "fadeOut",
                                                transitionInMobile: "fadeInUp",
                                                transitionOutMobile:
                                                    "fadeOutDown",
                                                layout: 2,
                                                maxWidth: "400px",
                                                onOpening: function (
                                                    instance,
                                                    toast
                                                ) {
                                                    toast.querySelector(
                                                        ".icono-toast"
                                                    ).style.fontSize = "20px"; // Cambiar el tamaño del icono
                                                },
                                                onClosed: function () {},
                                            });
                                        }
                                    });
                            });
                        }
                    );
                });
            function existsWithEAN(array, name) {
                // Utiliza el método some() para verificar si al menos un objeto cumple la condición
                return array.some((obj) => obj.ean === name);
            }

            document
                .getElementById("btn-sacar-foto")
                .addEventListener("click", function () {
                    console.log("gg");
                    capturarFoto();

                    modal_sacar_foto.show();
                });
            document
                .getElementById("vaciar-camara")
                .addEventListener("click", function () {
                    console.log("gg");
                    capturarFoto();
                });
            function capturarFoto() {
                const videoContainer =
                    document.getElementById("video-container");
                videoContainer.innerHTML = "";
                // Acceder a la cámara del dispositivo
                navigator.mediaDevices
                    .getUserMedia({
                        video: true,
                    })
                    .then((stream) => {
                        // Mostrar la transmisión de la cámara en un elemento de vídeo
                        const videoElement = document.createElement("video");
                        videoElement.srcObject = stream;
                        videoElement.play();
                        videoContainer.appendChild(videoElement);
                        document
                            .getElementById("capturar-foto")
                            .addEventListener("click", () => {
                                // Crear un lienzo para capturar la foto
                                const canvas = document.createElement("canvas");
                                canvas.width = videoElement.videoWidth;
                                canvas.height = videoElement.videoHeight;
                                const ctx = canvas.getContext("2d");
                                ctx.drawImage(
                                    videoElement,
                                    0,
                                    0,
                                    canvas.width,
                                    canvas.height
                                );

                                // Detener la transmisión de la cámara
                                stream
                                    .getTracks()
                                    .forEach((track) => track.stop());

                                videoContainer.innerHTML = "";
                                const imageElement =
                                    document.createElement("img");
                                imageElement.src = canvas.toDataURL(); // Utiliza la última captura del lienzo
                                imageElement.classList.add("w-100");
                                videoContainer.appendChild(imageElement);
                                // Analizar la foto para extraer el código de barras

                                Quagga.decodeSingle(
                                    {
                                        src: canvas.toDataURL(),
                                        numOfWorkers: 0, // Deshabilitar Web Workers para compatibilidad con navegadores móviles
                                        decoder: {
                                            readers: [
                                                "ean_8_reader",
                                                "ean_reader",
                                            ],
                                            multiple: false, // Especificar el tipo de código de barras a buscar
                                        },
                                        locate: true,
                                    },
                                    (result) => {
                                        console.log(result);

                                        if (result && result.codeResult) {
                                            console.log(
                                                "Código de barras encontrado:",
                                                result.codeResult.code
                                            );
                                            var modal =
                                                document.getElementById(
                                                    "modal-scanner"
                                                );
                                            var id =
                                                modal.getAttribute("data-id");
                                            fetch("get-pedido/" + id)
                                                .then((response) =>
                                                    response.json()
                                                )
                                                .then((data) => {
                                                    var inventario = JSON.parse(
                                                        data.inventario
                                                    );
                                                    console.log(
                                                        result.codeResult.code
                                                    );
                                                    console.log(inventario);

                                                    if (
                                                        existsWithEAN(
                                                            inventario,
                                                            result.codeResult
                                                                .code
                                                        )
                                                    ) {
                                                        var producto;
                                                        for (
                                                            var i = 0;
                                                            i <
                                                            inventario.length;
                                                            i++
                                                        ) {
                                                            // Verificar si el EAN coincide
                                                            if (
                                                                inventario[i]
                                                                    .ean ===
                                                                result
                                                                    .codeResult
                                                                    .code
                                                            ) {
                                                                producto =
                                                                    inventario[
                                                                        i
                                                                    ];
                                                                document.getElementById(
                                                                    "ver_nombre_producto"
                                                                ).innerText =
                                                                    producto.nombre;
                                                                document.getElementById(
                                                                    "ver_cantidad_producto"
                                                                ).value =
                                                                    producto.cantidad;
                                                                document.getElementById(
                                                                    "ver_ean_producto"
                                                                ).innerText =
                                                                    producto.ean;
                                                                modal_sacar_foto.hide();
                                                                modal_ver_producto.show();
                                                            }
                                                        }
                                                    } else {
                                                        iziToast.show({
                                                            title: "Producto no encontrado!",
                                                            titleSize: "",
                                                            titleLineHeight: "",
                                                            titleColor:
                                                                "#ffffff",
                                                            message:
                                                                "El pedido no contiene ningún producto con este EAN.",
                                                            messageSize: "",
                                                            messageLineHeight:
                                                                "",
                                                            messageColor:
                                                                "#ffffff",
                                                            backgroundColor:
                                                                "#e1665d",
                                                            theme: "light", // dark
                                                            color: "", // blue, red, green, yellow
                                                            icon: "fas fa-times-circle icono-toast",
                                                            iconColor:
                                                                "#ffffff",
                                                            timeout: 7000,
                                                            position:
                                                                "topRight", // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter, center
                                                            transitionIn:
                                                                "fadeInUp",
                                                            transitionOut:
                                                                "fadeOut",
                                                            transitionInMobile:
                                                                "fadeInUp",
                                                            transitionOutMobile:
                                                                "fadeOutDown",
                                                            layout: 2,
                                                            maxWidth: "400px",
                                                            onOpening:
                                                                function (
                                                                    instance,
                                                                    toast
                                                                ) {
                                                                    toast.querySelector(
                                                                        ".icono-toast"
                                                                    ).style.fontSize =
                                                                        "20px"; // Cambiar el tamaño del icono
                                                                },
                                                            onClosed:
                                                                function () {},
                                                        });
                                                    }
                                                });
                                        } else {
                                            iziToast.show({
                                                title: "EAN no encontrado!",
                                                titleSize: "",
                                                titleLineHeight: "",
                                                titleColor: "#ffffff",
                                                message:
                                                    "No se reconoció ningún EAN.",
                                                messageSize: "",
                                                messageLineHeight: "",
                                                messageColor: "#ffffff",
                                                backgroundColor: "#e1665d",
                                                theme: "light", // dark
                                                color: "", // blue, red, green, yellow
                                                icon: "fas fa-times-circle icono-toast",
                                                iconColor: "#ffffff",
                                                timeout: 7000,
                                                position: "topRight", // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter, center
                                                transitionIn: "fadeInUp",
                                                transitionOut: "fadeOut",
                                                transitionInMobile: "fadeInUp",
                                                transitionOutMobile:
                                                    "fadeOutDown",
                                                layout: 2,
                                                maxWidth: "400px",
                                                onOpening: function (
                                                    instance,
                                                    toast
                                                ) {
                                                    toast.querySelector(
                                                        ".icono-toast"
                                                    ).style.fontSize = "20px"; // Cambiar el tamaño del icono
                                                },
                                                onClosed: function () {},
                                            });
                                        }
                                    }
                                );
                            });
                    })
                    .catch((error) => {
                        console.error("Error al acceder a la cámara:", error);
                    });
            }
            /******/
        })();
        /******/
    })();
    /******/
})();
