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

            const form = document.getElementById("form-add-producto");
            const btn_crear_producto =
                document.getElementById("btn_crear_producto");

            btn_crear_producto.addEventListener("click", function (event) {
                // Crear un objeto para almacenar los valores de los inputs

                var csrfToken = form.querySelector(
                    'input[name="_token"]'
                ).value;
                // Obtener los valores de los inputs por su id y almacenarlos en el objeto formData
                var ean = document.getElementById("ean-producto").value;
                var codigo = document.getElementById("codigo-producto").value;
                var cantidad =
                    document.getElementById("cantidad-producto").value;
                var tipo_unidad = document.getElementById(
                    "tipo-unidad-producto"
                ).value;
                var nombre =
                    document.getElementById("nombre-producto").value != "No"
                        ? document.getElementById("nombre-producto").value
                        : null;
                var id_familia =
                    document.getElementById("select_familia_producto").value !=
                    "No"
                        ? document.getElementById("select_familia_producto")
                              .value
                        : null;
                var id_almacenes =
                    document.getElementById("select_almacenes").value != "No"
                        ? document.getElementById("select_almacenes").value
                        : null;
                var id_racks =
                    document.getElementById("select_racks").value != "No"
                        ? document.getElementById("select_racks").value
                        : null;
                var id_estantes =
                    document.getElementById("select_estantes").value != "No"
                        ? document.getElementById("select_estantes").value
                        : null;

                // Si el campo "foto-producto" no está vacío, agregarlo al objeto formData
                const fotoProductoInput =
                    document.getElementById("foto-producto");
                if (fotoProductoInput.files.length > 0) {
                    var foto = fotoProductoInput.files[0];
                } else {
                    var foto = false;
                }

                // Mostrar los datos en la consola

                // Crear un nuevo objeto FormData
                var formDataToSend = new FormData();
                formDataToSend.append("_token", csrfToken);
                formDataToSend.append("ean", ean);
                formDataToSend.append("codigo", codigo);
                formDataToSend.append("cantidad", cantidad);
                formDataToSend.append("tipo_unidad", tipo_unidad);
                formDataToSend.append("nombre", nombre);
                formDataToSend.append("id_familia", id_familia);
                formDataToSend.append("id_almacenes", id_almacenes);
                formDataToSend.append("id_racks", id_racks);
                formDataToSend.append("id_estantes", id_estantes);
                formDataToSend.append("foto", foto);
                console.log(formDataToSend);

                var object2 = {};
                formDataToSend.forEach(function (value, key) {
                    object2[key] = value;
                });
                var json2 = JSON.stringify(object2);
                console.log(json2);
                // Enviar la solicitud fetch con los datos del formDataToSend
                const action = form.getAttribute("data-action");
                fetch(action, {
                    method: "POST",
                    body: formDataToSend,
                })
                    .then((response) => {
                        console.log(response);
                        return response.json();
                    })
                    .then((data) => {
                        // Manejar la respuesta JSON
                        console.log(data);
                        if (!data.success) {
                            for (let a of data.errors.codigo) {
                                iziToast.show({
                                    title: "Problema de validación!",
                                    titleSize: "",
                                    titleLineHeight: "",
                                    titleColor: "#ffffff",
                                    message: a,
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
                        }
                        // Aquí puedes hacer algo con la respuesta, como mostrar un mensaje de éxito o actualizar la interfaz de usuario
                    })
                    .catch((error) => {
                        // Manejar los errores
                        console.error("Error:", error);
                        // Aquí puedes mostrar un mensaje de error al usuario o realizar alguna acción específica
                    });

                // Aquí puedes enviar los datos serializados a través de una petición AJAX o hacer lo que necesites con ellos
            });

            /******/
        })();
        /******/
    })();
    /******/
})();
