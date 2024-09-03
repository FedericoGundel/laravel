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

            var tabla_pedidos = document.getElementById("tabla-pedidos");
            var url = tabla_pedidos.getAttribute("data-url");
            const modal_verificar = new bootstrap.Modal("#modal-scanner");
            const modal_confirmar_verificacion = new bootstrap.Modal(
                "#modal-confirmar-verificacion"
            );

            const modal_ver_producto = new bootstrap.Modal(
                "#modal-ver-producto"
            );
            const modal_sacar_foto = new bootstrap.Modal("#modal-sacar-foto");
            const modal_buscar_productos = new bootstrap.Modal(
                "#modal-buscar-productos"
            );
            const modal_anomalias = new bootstrap.Modal("#modal-anomalia");
            var tabla_ver_productos = document.getElementById(
                "tabla-ver-productos"
            );

            var data_tabla_pedidos = new DataTable(tabla_pedidos, {
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
                        data: "productos_pedido",
                        render: function (data, type, row, meta) {
                            let ul = document.createElement("ul");

                            // Recorrer el arreglo 'data' y crear elementos li para cada elemento
                            for (let r of data) {
                                // Crear un elemento li
                                console.log(r.nombre);

                                let li = document.createElement("li");

                                // Establecer el texto del li como el valor de 'nombre'
                                li.textContent = r.producto.nombre;

                                // Agregar el li al ul
                                ul.appendChild(li);
                            }
                            return ul.outerHTML;
                        },
                    },
                    {
                        name: "cantidades",
                        className: "text-start align-middle",
                        data: "productos_pedido",
                        render: function (data, type, row, meta) {
                            let ul = document.createElement("ul");

                            // Recorrer el arreglo 'data' y crear elementos li para cada elemento
                            for (let r of data) {
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
                        name: "transportista",
                        data: null,
                        render: function (data, type, row, meta) {
                            return "Ninguno";
                        },
                    },
                    {
                        className: "text-start align-middle",
                        name: "numero",
                        data: "numero",
                    },
                    {
                        className: "text-start align-middle",
                        name: "acciones",
                        data: "id",
                        render: function (data, type, row) {
                            return (
                                '<button data-id="' +
                                data +
                                '" class="btn btn-success btn_verificar_pedido">Verificar productos</button>'
                            );
                        },
                    },
                ],
                initComplete: function (settings, json) {
                    var paginationContainer = tabla_pedidos
                        .closest(".dt-container")
                        .querySelector(".dt-paging");
                    paginationContainer.classList.add("mt-4");
                },
            });

            var data_tabla_ver_productos = new DataTable(tabla_ver_productos, {
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
                        name: "foto",
                        data: "producto",
                        render: function (data, type, row) {
                            var url =
                                data.foto != 0
                                    ? "/assets/images/product_images/" +
                                      data.ean +
                                      "." +
                                      data.foto
                                    : "/assets/images/product_images/default.svg";
                            return `<div class="flex-shrink-0 me-3">
                                            <img src="${url}" alt=""
                                            class="avatar rounded-circle"></div>`;
                        },
                    },
                    {
                        className: "text-start align-middle",
                        name: "nombre",
                        data: "producto",
                        render: function (data, type, row) {
                            return data.nombre;
                        },
                    },
                    {
                        className: "text-start align-middle",
                        name: "ean",
                        data: "producto",
                        render: function (data, type, row) {
                            return data.ean;
                        },
                    },
                    {
                        className: "text-start align-middle",
                        name: "acciones",
                        data: null,
                        render: function (data, type, row) {
                            var clase = data.verificado ? "info" : "success";
                            var texto = data.verificado
                                ? "Verificado"
                                : "Verificar";
                            return (
                                '<button data-id="' +
                                data.id +
                                '" class="btn btn-' +
                                clase +
                                ' btn_verificar">' +
                                texto +
                                "</button>"
                            );
                        },
                    },
                ],
                initComplete: function (settings, json) {
                    var paginationContainer = tabla_ver_productos
                        .closest(".dt-container")
                        .querySelector(".dt-paging");
                    paginationContainer.classList.add("mt-4");
                },
            });
            function actualizarProductos(id) {
                fetch("get-pedido/" + id)
                    .then((response) => response.json())
                    .then((data) => {
                        data_tabla_ver_productos.clear();
                        data_tabla_ver_productos.rows.add(
                            data.productos_pedido
                        );

                        // Paso 3: Redibujar la tabla
                        data_tabla_ver_productos.draw();
                        modal_verificar.show();
                    });
            }

            document.addEventListener("click", function (e) {
                if (
                    e.target &&
                    e.target.classList.contains("btn_verificar_pedido")
                ) {
                    var id = e.target.getAttribute("data-id");
                    var modal = document.getElementById("modal-scanner");
                    modal.setAttribute("data-id", id);
                    actualizarProductos(id);
                }
                if (e.target && e.target.classList.contains("btn_verificar")) {
                    var id = e.target.getAttribute("data-id");

                    fetch("get-producto-pedido/" + id)
                        .then((response) => response.json())
                        .then((data) => {
                            if (data.producto.foto == 0) {
                                document.getElementById(
                                    "ver_imagen_producto"
                                ).src =
                                    "/assets/images/product_images/default.svg";
                            } else {
                                document.getElementById(
                                    "ver_imagen_producto"
                                ).src =
                                    "/assets/images/product_images/" +
                                    data.producto.ean +
                                    "." +
                                    data.producto.foto;
                            }
                            document.getElementById(
                                "ver_nombre_producto"
                            ).innerText = data.producto.nombre;
                            document.getElementById(
                                "ver_cantidad_producto"
                            ).value = data.cantidad;
                            document
                                .getElementById("ver_cantidad_producto")
                                .setAttribute("data-cantidad", data.cantidad);
                            document.getElementById(
                                "ver_ean_producto"
                            ).innerText = data.producto.ean;

                            document
                                .getElementById("btn-modificar-producto")
                                .setAttribute("data-id", id);

                            modal_ver_producto.show();
                        })
                        .catch((error) => {
                            console.error(
                                "Hubo un problema con la operación de fetch:",
                                error
                            );
                            alert(
                                "No se pudo obtener el producto. Verifica el EAN ingresado."
                            );
                        });
                }
            });

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

                    if (cantidad_encontrada == "") {
                        iziToast.show({
                            title: "Cantidad no encontrada!",
                            titleSize: "",
                            titleLineHeight: "",
                            titleColor: "#ffffff",
                            message: "Debes especificar una cantidad.",
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
                            transitionOutMobile: "fadeOutDown",
                            layout: 2,
                            maxWidth: "400px",
                            onOpening: function (instance, toast) {
                                toast.querySelector(
                                    ".icono-toast"
                                ).style.fontSize = "20px"; // Cambiar el tamaño del icono
                            },
                            onClosed: function () {},
                        });
                        return false;
                    }
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
                    } else {
                        modal_confirmar_verificacion.show();
                    }
                });
            const elementos = document.querySelectorAll(
                ".btn_confirmar_verificacion"
            );
            // Itera sobre cada elemento y agrega un evento onClick
            elementos.forEach((elemento) => {
                elemento.addEventListener("click", () => {
                    var cantidad_esperada = document
                        .getElementById("ver_cantidad_producto")
                        .getAttribute("data-cantidad");
                    var cantidad_encontrada = document.getElementById(
                        "ver_cantidad_producto"
                    ).value;
                    var id_producto_pedido = document
                        .getElementById("btn-modificar-producto")
                        .getAttribute("data-id");
                    var action = "edit-producto-pedido/" + id_producto_pedido;

                    var csrfToken = document.querySelector(
                        'input[name="_token"]'
                    ).value;
                    console.log(csrfToken);

                    fetch(action, {
                        method: "PUT",
                        headers: {
                            "X-CSRF-TOKEN": csrfToken,
                            "Content-Type": "application/json",
                            Accept: "application/json",
                        },
                        body: JSON.stringify({
                            id_almacen:
                                document.getElementById("select_almacenes")
                                    .value != "No"
                                    ? document.getElementById(
                                          "select_almacenes"
                                      ).value
                                    : null,
                            id_rack:
                                document.getElementById("select_racks").value !=
                                "No"
                                    ? document.getElementById("select_racks")
                                          .value
                                    : null,
                            id_estante:
                                document.getElementById("select_estantes")
                                    .value != "No"
                                    ? document.getElementById("select_estantes")
                                          .value
                                    : null,
                            cantidad: cantidad_encontrada,
                            cantidad_i: cantidad_esperada,
                            _token: csrfToken,
                        }),
                    })
                        .then((response) => {
                            console.log(response);
                            return response.json();
                        })
                        .then((data) => {
                            // Manejar la respuesta JSON
                            console.log(data);

                            if (!data.success) {
                                for (var atributo in data.errors) {
                                    if (data.errors.hasOwnProperty(atributo)) {
                                        data.errors[atributo].forEach(function (
                                            elemento,
                                            indice
                                        ) {
                                            iziToast.show({
                                                title: "Problema de validación!",
                                                titleSize: "",
                                                titleLineHeight: "",
                                                titleColor: "#ffffff",
                                                message: elemento,
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
                                        });
                                    }
                                }
                            } else {
                                iziToast.show({
                                    title: "Exitoso!",
                                    titleSize: "",
                                    titleLineHeight: "",
                                    titleColor: "#ffffff",
                                    message: data.message,
                                    messageSize: "",
                                    messageLineHeight: "",
                                    messageColor: "#ffffff",
                                    backgroundColor: "#6dcba3",
                                    theme: "light", // dark
                                    color: "", // blue, red, green, yellow
                                    icon: "fa fa-check icono-toast",
                                    iconColor: "#ffffff",
                                    timeout: 7000,
                                    position: "topRight", // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter, center
                                    transitionIn: "fadeInUp",
                                    transitionOut: "fadeOut",
                                    transitionInMobile: "fadeInUp",
                                    transitionOutMobile: "fadeOutDown",
                                    layout: 2,
                                    maxWidth: "400px",
                                    onOpening: function (instance, toast) {
                                        toast.querySelector(
                                            ".icono-toast"
                                        ).style.fontSize = "20px"; // Cambiar el tamaño del icono
                                    },
                                    onClosed: function () {},
                                });
                                var modal =
                                    document.getElementById("modal-scanner");
                                var id = modal.getAttribute("data-id", id);
                                actualizarProductos(id);

                                modal_anomalias.hide();
                                modal_confirmar_verificacion.hide();
                                modal_ver_producto.hide();
                            }
                            // Aquí puedes hacer algo con la respuesta, como mostrar un mensaje de éxito o actualizar la interfaz de usuario
                        })
                        .catch((error) => {
                            // Manejar los errores
                            console.error("Error:", error);
                            // Aquí puedes mostrar un mensaje de error al usuario o realizar alguna acción específica
                        });
                });
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
                                        console.log(data);

                                        console.log(result);
                                        console.log(result.codeResult.code);

                                        if (
                                            buscarPorEan(
                                                data.productos_pedido,
                                                result.codeResult.code
                                            )
                                        ) {
                                            var producto;
                                            for (
                                                var i = 0;
                                                i <
                                                data.productos_pedido.length;
                                                i++
                                            ) {
                                                // Verificar si el EAN coincide
                                                if (
                                                    data.productos_pedido[i]
                                                        .producto.ean ===
                                                    result.codeResult.code
                                                ) {
                                                    if (
                                                        data.productos_pedido[i]
                                                            .producto.foto == 0
                                                    ) {
                                                        document.getElementById(
                                                            "ver_imagen_producto"
                                                        ).src =
                                                            "/assets/images/product_images/default.svg";
                                                    } else {
                                                        document.getElementById(
                                                            "ver_imagen_producto"
                                                        ).src =
                                                            "/assets/images/product_images/" +
                                                            data
                                                                .productos_pedido[
                                                                i
                                                            ].producto.ean +
                                                            "." +
                                                            data
                                                                .productos_pedido[
                                                                i
                                                            ].producto.foto;
                                                    }
                                                    document.getElementById(
                                                        "ver_nombre_producto"
                                                    ).innerText =
                                                        data.productos_pedido[
                                                            i
                                                        ].producto.nombre;
                                                    document.getElementById(
                                                        "ver_cantidad_producto"
                                                    ).value =
                                                        data.productos_pedido[
                                                            i
                                                        ].cantidad;
                                                    document
                                                        .getElementById(
                                                            "ver_cantidad_producto"
                                                        )
                                                        .setAttribute(
                                                            "data-cantidad",
                                                            data
                                                                .productos_pedido[
                                                                i
                                                            ].cantidad
                                                        );
                                                    document.getElementById(
                                                        "ver_ean_producto"
                                                    ).innerText =
                                                        data.productos_pedido[
                                                            i
                                                        ].producto.ean;

                                                    document
                                                        .getElementById(
                                                            "btn-modificar-producto"
                                                        )
                                                        .setAttribute(
                                                            "data-id",
                                                            data
                                                                .productos_pedido[
                                                                i
                                                            ].id
                                                        );

                                                    modal_ver_producto.show();
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
            function buscarPorEan(array, ean) {
                // Busca el elemento cuyo producto.ean sea igual al parámetro ean
                const elementoEncontrado = array.find(
                    (elemento) => elemento.producto.ean === ean
                );

                // Retorna el elemento encontrado o null si no se encuentra
                return elementoEncontrado || null;
            }

            /******/
        })();
        /******/
    })();
    /******/
})();
