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
            document.addEventListener("DOMContentLoaded", (event) => {
                const form = document.getElementById("form-registrar");
                const invalidFeedbacks =
                    document.querySelectorAll(".invalid-feedback");

                // Iterar sobre cada elemento y ocultarlo

                document
                    .getElementById("form-registrar")
                    .addEventListener("submit", function (event) {
                        event.preventDefault();
                        invalidFeedbacks.forEach(function (element) {
                            element.style.display = "none";
                        });
                        var action = form.action;
                        console.log(action);
                        const formData = new FormData(form);
                        fetch(action, {
                            method: "POST",
                            body: formData,
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
                                        if (
                                            data.errors.hasOwnProperty(atributo)
                                        ) {
                                            data.errors[atributo].forEach(
                                                function (elemento, indice) {
                                                    document.getElementById(
                                                        "alerta_" + atributo
                                                    ).innerText = elemento;

                                                    document.getElementById(
                                                        "alerta_" + atributo
                                                    ).style.display = "block";
                                                }
                                            );
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
                                    window.location.href = "./login";
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
        })();
        /******/
    })();
    /******/
})();
