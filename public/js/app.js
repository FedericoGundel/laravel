/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./node_modules/@deltablot/malle/dist/main.js":
/*!****************************************************!*\
  !*** ./node_modules/@deltablot/malle/dist/main.js ***!
  \****************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   Action: () => (/* binding */ Action),
/* harmony export */   EventType: () => (/* binding */ EventType),
/* harmony export */   InputType: () => (/* binding */ InputType),
/* harmony export */   Malle: () => (/* binding */ Malle)
/* harmony export */ });
/*!
 * This file is part of the "malle" library
 * Copyright 2021, 2022 Nicolas CARPi @ Deltablot
 * License MIT
 * https://github.com/deltablot/malle
 */
var InputType;
(function (InputType) {
    InputType["Color"] = "color";
    InputType["Date"] = "date";
    InputType["Datetime"] = "datetime-local";
    InputType["Email"] = "email";
    InputType["Number"] = "number";
    InputType["Select"] = "select";
    InputType["Text"] = "text";
    InputType["Textarea"] = "textarea";
    InputType["Time"] = "time";
    InputType["Url"] = "url";
})(InputType || (InputType = {}));
var EventType;
(function (EventType) {
    EventType["Click"] = "click";
    EventType["Mouseenter"] = "mouseenter";
    EventType["Mouseover"] = "mouseover";
})(EventType || (EventType = {}));
var Action;
(function (Action) {
    Action["Submit"] = "submit";
    Action["Cancel"] = "cancel";
    Action["Ignore"] = "ignore";
})(Action || (Action = {}));
class Malle {
    constructor(options) {
        this.opt = this.normalizeOptions(options);
        this.debug(`Options: ${JSON.stringify(this.opt)}`);
        if (this.opt.listenNow) {
            this.listen();
        }
        this.innerFun = this.opt.returnedValueIsTrustedHtml ? 'innerHTML' : 'innerText';
    }
    normalizeOptions(options) {
        const defaultOptions = {
            after: undefined,
            before: undefined,
            cancel: '',
            cancelClasses: [],
            formClasses: [],
            inputClasses: [],
            debug: false,
            event: EventType.Click,
            focus: true,
            fun: () => new Error('No user function defined!'),
            inputType: InputType.Text,
            listenNow: false,
            listenOn: '[data-malleable="true"]',
            onBlur: Action.Submit,
            onCancel: undefined,
            onEdit: undefined,
            onEnter: Action.Submit,
            onEscape: Action.Cancel,
            placeholder: '',
            requireDiff: true,
            returnedValueIsTrustedHtml: false,
            selectOptions: [],
            selectOptionsValueKey: 'value',
            selectOptionsTextKey: 'text',
            submit: '',
            submitClasses: [],
            tooltip: '',
            inputValue: '',
        };
        return Object.assign(defaultOptions, options);
    }
    listen() {
        document.querySelectorAll(this.opt.listenOn)
            .forEach((el) => {
            const opt = this.opt;
            opt.listenNow = false;
            const m = new Malle(opt);
            el.addEventListener(this.opt.event, m.process.bind(m));
            el.style.cursor = 'pointer';
            if (this.opt.tooltip) {
                el.title = this.opt.tooltip;
            }
        });
        this.debug(`malle now listening for ${this.opt.event} events on elements with selector: ${this.opt.listenOn}`);
        return this;
    }
    debug(msg) {
        if (this.opt.debug) {
            console.debug(msg);
        }
    }
    submit(event) {
        event.preventDefault();
        if (!this.form.reportValidity()) {
            return false;
        }
        if (this.opt.requireDiff) {
            const newValue = this.opt.inputType === InputType.Select
                ? this.input.options[this.input.selectedIndex].text
                : this.input.value;
            if (this.original.innerText === newValue) {
                this.debug('original value is same as new value, reverting without calling fun');
                this.form.replaceWith(this.original);
                return false;
            }
        }
        this.opt.fun.call(this, this.input.value, this.original, event, this.input).then((value) => {
            this.original[this.innerFun] = this.opt.inputType === InputType.Select ? this.input.options[this.input.selectedIndex].text : value;
            this.form.replaceWith(this.original);
            if (typeof this.opt.after === 'function') {
                return this.opt.after(this.original, event, value);
            }
        });
        return true;
    }
    cancel(event) {
        event.preventDefault();
        this.debug(event.toString());
        if (typeof this.opt.onCancel === 'function') {
            this.debug('running onCancel function');
            if (this.opt.onCancel(this.original, event, this.input) !== true) {
                return;
            }
        }
        this.debug('reverting to original element');
        this.form.replaceWith(this.original);
        return true;
    }
    handleBlur(event) {
        let blurAction = this.opt.onBlur;
        if (this.original.dataset.maBlur) {
            blurAction = this.original.dataset.maBlur;
        }
        if (blurAction === Action.Ignore) {
            return;
        }
        this[blurAction](event);
    }
    handleKeypress(event) {
        if (this.opt.inputType === InputType.Textarea) {
            return false;
        }
        if (event.key === 'Enter') {
            let enterAction = this.opt.onEnter;
            if (this.original.dataset.maEnter) {
                enterAction = this.original.dataset.maEnter;
            }
            if (enterAction === Action.Ignore) {
                event.preventDefault();
                return;
            }
            this[enterAction](event);
            return;
        }
        if (event.key === 'Escape') {
            let escAction = this.opt.onEscape;
            if (this.original.dataset.maEscape) {
                escAction = this.original.dataset.maEscape;
            }
            if (escAction === Action.Ignore) {
                event.preventDefault();
                return;
            }
            this[escAction](event);
        }
    }
    getInput() {
        let inputElement = 'input';
        if (this.opt.inputType === InputType.Textarea) {
            inputElement = 'textarea';
        }
        if (this.opt.inputType === InputType.Select) {
            inputElement = 'select';
        }
        const input = document.createElement(inputElement);
        if (this.opt.inputType !== InputType.Textarea && this.opt.inputType !== InputType.Select) {
            input.type = this.opt.inputType;
        }
        if (this.original.dataset.maType) {
            input.type = this.original.dataset.maType;
        }
        this.opt.inputClasses.forEach(cl => {
            input.classList.add(cl);
        });
        let value;
        if (this.opt.inputValue) {
            value = this.opt.inputValue;
        }
        if (this.original.dataset.maInputValue) {
            value = this.original.dataset.maInputValue;
        }
        if (!value) {
            value = this.original.innerText;
        }
        input.value = value;
        if (this.opt.placeholder) {
            input.placeholder = this.opt.placeholder;
        }
        if (this.original.dataset.maPlaceholder) {
            input.placeholder = this.original.dataset.maPlaceholder;
        }
        if (this.opt.inputType === InputType.Select) {
            Promise.resolve(this.opt.selectOptions).then(o => {
                o.forEach(o => {
                    var _a;
                    const option = document.createElement('option');
                    option.value = o[this.opt.selectOptionsValueKey];
                    option[this.innerFun] = o[this.opt.selectOptionsTextKey];
                    option.selected = ((_a = o.selected) !== null && _a !== void 0 ? _a : false) || this.original[this.innerFun] === o[this.opt.selectOptionsTextKey];
                    input.appendChild(option);
                });
            });
        }
        input.addEventListener('keydown', this.handleKeypress.bind(this));
        if (this.opt.submit === '' && this.opt.cancel === '') {
            input.addEventListener('blur', this.handleBlur.bind(this));
        }
        return input;
    }
    process(event) {
        this.debug('Event triggered:');
        this.debug(event.toString());
        const el = event.currentTarget;
        this.original = el;
        if (typeof this.opt.before === 'function') {
            if (this.opt.before(this.original, event) !== true) {
                return;
            }
        }
        const form = document.createElement('form');
        this.opt.formClasses.forEach(cl => {
            form.classList.add(cl);
        });
        const input = this.getInput();
        form.appendChild(input);
        [Action.Submit, Action.Cancel].forEach(action => {
            if (this.opt[action]) {
                const btn = document.createElement('button');
                btn.innerText = this.opt[action];
                const actionClasses = action + 'Classes';
                this.opt[actionClasses].forEach((cl) => {
                    btn.classList.add(cl);
                });
                btn.addEventListener('click', this[action].bind(this));
                form.appendChild(btn);
            }
        });
        el.replaceWith(form);
        if (this.opt.focus) {
            input.focus();
        }
        this.input = input;
        this.form = form;
        if (typeof this.opt.onEdit === 'function') {
            this.opt.onEdit(this.original, event, this.input);
        }
    }
}
//# sourceMappingURL=main.js.map

/***/ }),

/***/ "./resources/js/app.js":
/*!*****************************!*\
  !*** ./resources/js/app.js ***!
  \*****************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _deltablot_malle__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @deltablot/malle */ "./node_modules/@deltablot/malle/dist/main.js");
/*
Template Name: Vuesy - Admin & Dashboard Template
Author: Themesdesign
Version: 1.0.0
Website: https://Themesdesign.in/
Contact: themesdesign.in@gmail.com
File: Main Js File
*/

(function () {
  "use strict";

  var malle = new _deltablot_malle__WEBPACK_IMPORTED_MODULE_0__.Malle({
    inputType: "text",
    cancel: "Cancelar",
    submit: "Guardar",
    cancelClasses: ["btn", "btn-danger"],
    submitClasses: ["btn", "btn-success"],
    inputClasses: ["form-control"],
    formClasses: ["d-flex"],
    fun: function fun(value, original, event, input) {
      return new Promise(function (resolve, reject) {
        var atributo = original.getAttribute("data-atributo");

        // Verificar si el atributo es 'email'
        if (atributo === "email") {
          // Expresión regular para validar un email
          var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

          // Verificar si el valor cumple con la expresión regular
          if (!emailRegex.test(value) && value != "") {
            var ValorIncorrecto = new CustomEvent("ValorIncorrecto", {
              detail: {
                mensaje: "El valor proporcionado no es un email válido."
              }
            });
            document.dispatchEvent(ValorIncorrecto);
            // Si no es un email válido, rechazar la promesa con un mensaje de error
            return reject("El valor proporcionado no es un email válido.");
          }
        }
        if (atributo === "username") {
          if (value == "") {
            var _ValorIncorrecto = new CustomEvent("ValorIncorrecto", {
              detail: {
                mensaje: "El nombre de usuario no puede estar vacío."
              }
            });
            document.dispatchEvent(_ValorIncorrecto);
            // Si no es un email válido, rechazar la promesa con un mensaje de error
            return reject("El nombre de usuario no puede estar vacío.");
          }
          if (value.length < 8) {
            var _ValorIncorrecto2 = new CustomEvent("ValorIncorrecto", {
              detail: {
                mensaje: "El nombre de usuario debe tener al menos 8 caracteres."
              }
            });
            document.dispatchEvent(_ValorIncorrecto2);
            // Si no es un email válido, rechazar la promesa con un mensaje de error
            return reject("El nombre de usuario debe tener al menos 8 caracteres.");
          }
        }
        if (atributo === "password") {
          if (value.length < 8) {
            var _ValorIncorrecto3 = new CustomEvent("ValorIncorrecto", {
              detail: {
                mensaje: "La contraseña debe tener al menos 8 caracteres."
              }
            });
            document.dispatchEvent(_ValorIncorrecto3);
            // Si no es un email válido, rechazar la promesa con un mensaje de error
            return reject("La contraseña debe tener al menos 8 caracteres.");
          }
        }
        // Crear y despachar el evento personalizado
        var DatosCambiados = new CustomEvent("DatosCambiados", {
          detail: {
            atributo: original.getAttribute("data-atributo"),
            value: value
          }
        });
        document.dispatchEvent(DatosCambiados);

        // Devolver el nuevo texto o el texto original si el valor está vacío
        resolve(value);
      });
    }
  }).listen();
  var language = localStorage.getItem("language");
  // Default Language
  var default_lang = "en";
  function initLanguage() {
    // Set new language
    if (language != "null" && language !== default_lang) setLanguage(language);
    var languages = document.querySelectorAll(".language");
    languages && languages.forEach(function (dropdown) {
      dropdown.addEventListener("click", function (event) {
        setLanguage(dropdown.getAttribute("data-lang"));
      });
    });
  }
  function setLanguage(lang) {
    if (document.getElementById("header-lang-img")) {
      if (lang == "en") {
        document.getElementById("header-lang-img").src = "assets/images/flags/us.jpg";
      } else if (lang == "sp") {
        document.getElementById("header-lang-img").src = "assets/images/flags/spain.jpg";
      } else if (lang == "gr") {
        document.getElementById("header-lang-img").src = "assets/images/flags/germany.jpg";
      } else if (lang == "it") {
        document.getElementById("header-lang-img").src = "assets/images/flags/italy.jpg";
      } else if (lang == "ru") {
        document.getElementById("header-lang-img").src = "assets/images/flags/russia.jpg";
      }
      localStorage.setItem("language", lang);
      language = localStorage.getItem("language");
      getLanguage();
    }
  }

  // Multi language setting
  function getLanguage() {
    language == null ? setLanguage(default_lang) : false;
    var request = new XMLHttpRequest();

    // Instantiating the request object
    request.open("GET", "/assets/lang/" + language + ".json");

    // Defining event listener for readystatechange event
    request.onreadystatechange = function () {
      // Check if the request is compete and was successful
      if (this.readyState === 4 && this.status === 200) {
        var data = JSON.parse(this.responseText);
        Object.keys(data).forEach(function (key) {
          var elements = document.querySelectorAll("[data-key='" + key + "']");
          elements.forEach(function (elem) {
            elem.textContent = data[key];
          });
        });
      }
    };

    // Sending the request to the server
    request.send();
  }
  function initMetisMenu() {
    // MetisMenu js
    document.addEventListener("DOMContentLoaded", function (event) {
      if (document.getElementById("side-menu")) new MetisMenu("#side-menu");
    });
  }
  function initCounterNumber() {
    var counter = document.querySelectorAll(".counter-value");
    var speed = 250; // The lower the slower
    counter && counter.forEach(function (counter_value) {
      function updateCount() {
        var target = +counter_value.getAttribute("data-target");
        var count = +counter_value.innerText;
        var inc = target / speed;
        if (inc < 1) {
          inc = 1;
        }
        // Check if target is reached
        if (count < target) {
          // Add inc to count and output in counter_value
          counter_value.innerText = (count + inc).toFixed(0);
          // Call function every ms
          setTimeout(updateCount, 1);
        } else {
          counter_value.innerText = target;
        }
      }
      updateCount();
    });
  }
  function initLeftMenuCollapse() {
    var currentSIdebarSize = document.body.getAttribute("data-sidebar-size");
    window.onload = function () {
      if (window.innerWidth >= 1024 && window.innerWidth <= 1366) {
        document.body.setAttribute("data-sidebar-size", "sm");
        updateRadio("sidebar-size-small");
      }
    };
    var verticalButton = document.getElementsByClassName("vertical-menu-btn");
    for (var i = 0; i < verticalButton.length; i++) {
      (function (index) {
        verticalButton[index] && verticalButton[index].addEventListener("click", function (event) {
          event.preventDefault();
          document.body.classList.toggle("sidebar-enable");
          if (window.innerWidth >= 992) {
            if (currentSIdebarSize == null) {
              document.body.getAttribute("data-sidebar-size") == null || document.body.getAttribute("data-sidebar-size") == "lg" ? document.body.setAttribute("data-sidebar-size", "sm") : document.body.setAttribute("data-sidebar-size", "lg");
            } else if (currentSIdebarSize == "md") {
              document.body.getAttribute("data-sidebar-size") == "md" ? document.body.setAttribute("data-sidebar-size", "sm") : document.body.setAttribute("data-sidebar-size", "md");
            } else {
              document.body.getAttribute("data-sidebar-size") == "sm" ? document.body.setAttribute("data-sidebar-size", "lg") : document.body.setAttribute("data-sidebar-size", "sm");
            }
          } else {
            initMenuItemScroll();
          }
        });
      })(i);
    }
  }
  function initActiveMenu() {
    setTimeout(function () {
      // === following js will activate the menu in left side bar based on url ====
      var menuItems = document.querySelectorAll("#sidebar-menu a");
      menuItems && menuItems.forEach(function (item) {
        var pageUrl = window.location.href.split(/[?#]/)[0];
        if (item.href == pageUrl) {
          item.classList.add("active");
          var parent = item.parentElement;
          if (parent && parent.id !== "side-menu") {
            parent.classList.add("mm-active");
            var parent2 = parent.parentElement; // ul .
            if (parent2 && parent2.id !== "side-menu") {
              parent2.classList.add("mm-show"); // ul tag
              if (parent2.classList.contains("mm-collapsing")) {
                console.log("has mm-collapsing");
              }
              var parent3 = parent2.parentElement; // li tag
              if (parent3 && parent3.id !== "side-menu") {
                parent3.classList.add("mm-active"); // li
                var parent4 = parent3.parentElement; // ul
                if (parent4 && parent4.id !== "side-menu") {
                  parent4.classList.add("mm-show"); // ul
                  var parent5 = parent4.parentElement;
                  if (parent5 && parent5.id !== "side-menu") {
                    parent5.classList.add("mm-active"); // li
                  }
                }
              }
            }
          }
        }
      });
    }, 0);
  }
  function initMenuItemScroll() {
    setTimeout(function () {
      var sidebarMenu = document.getElementById("side-menu");
      if (sidebarMenu) {
        var activeMenu = sidebarMenu.querySelector(".mm-active .active");
        var offset = activeMenu ? activeMenu.offsetTop : 0;
        if (offset > 300) {
          offset = offset - 100;
          var verticalMenu = document.getElementsByClassName("vertical-menu") ? document.getElementsByClassName("vertical-menu")[0] : "";
          if (verticalMenu && verticalMenu.querySelector(".simplebar-content-wrapper")) {
            setTimeout(function () {
              verticalMenu.querySelector(".simplebar-content-wrapper").scrollTop = offset;
            }, 0);
          }
        }
      }
    }, 0);
  }
  function initHoriMenuActive() {
    var navlist = document.querySelectorAll(".navbar-nav a");
    navlist && navlist.forEach(function (item) {
      var pageUrl = window.location.href.split(/[?#]/)[0];
      if (item.href == pageUrl) {
        item.classList.add("active");
        var parent = item.parentElement;
        if (parent) {
          parent.classList.add("active"); // li
          var parent2 = parent.parentElement;
          parent2.classList.add("active"); // li
          var parent3 = parent2.parentElement;
          if (parent3) {
            parent3.classList.add("active"); // li
            var parent4 = parent3.parentElement;
            if (parent4.closest("li")) parent4.closest("li").classList.add("active");
            if (parent4) {
              parent4.classList.add("active"); // li
              var parent5 = parent4.parentElement;
              if (parent5) {
                parent5.classList.add("active"); // li
                var parent6 = parent5.parentElement;
                if (parent6) {
                  parent6.classList.add("active"); // li
                }
              }
            }
          }
        }
      }
    });
  }
  function initFullScreen() {
    var fullscreenBtn = document.querySelector('[data-toggle="fullscreen"]');
    fullscreenBtn && fullscreenBtn.addEventListener("click", function (e) {
      e.preventDefault();
      document.body.classList.toggle("fullscreen-enable");
      if (!document.fullscreenElement && /* alternative standard method */!document.mozFullScreenElement && !document.webkitFullscreenElement) {
        // current working methods
        if (document.documentElement.requestFullscreen) {
          document.documentElement.requestFullscreen();
        } else if (document.documentElement.mozRequestFullScreen) {
          document.documentElement.mozRequestFullScreen();
        } else if (document.documentElement.webkitRequestFullscreen) {
          document.documentElement.webkitRequestFullscreen(Element.ALLOW_KEYBOARD_INPUT);
        }
      } else {
        if (document.cancelFullScreen) {
          document.cancelFullScreen();
        } else if (document.mozCancelFullScreen) {
          document.mozCancelFullScreen();
        } else if (document.webkitCancelFullScreen) {
          document.webkitCancelFullScreen();
        }
      }
    });
    document.addEventListener("fullscreenchange", exitHandler);
    document.addEventListener("webkitfullscreenchange", exitHandler);
    document.addEventListener("mozfullscreenchange", exitHandler);
    function exitHandler() {
      if (!document.webkitIsFullScreen && !document.mozFullScreen && !document.msFullscreenElement) {
        document.body.classList.remove("fullscreen-enable");
      }
    }
  }
  function initDropdownMenu() {
    if (document.getElementById("topnav-menu-content")) {
      var elements = document.getElementById("topnav-menu-content").getElementsByTagName("a");
      for (var i = 0, len = elements.length; i < len; i++) {
        elements[i].onclick = function (elem) {
          if (elem.target.getAttribute("href") === "#") {
            elem.target.parentElement.classList.toggle("active");
            elem.target.nextElementSibling.classList.toggle("show");
          }
        };
      }
      window.addEventListener("resize", updateMenu);
    }
  }
  function updateMenu() {
    var elements = document.getElementById("topnav-menu-content").getElementsByTagName("a");
    for (var i = 0, len = elements.length; i < len; i++) {
      if (elements[i].parentElement.getAttribute("class") === "nav-item dropdown active") {
        elements[i].parentElement.classList.remove("active");
        elements[i].nextElementSibling.classList.remove("show");
      }
    }
  }
  function initComponents() {
    // tooltip
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
      return new bootstrap.Tooltip(tooltipTriggerEl);
    });

    // popover
    var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'));
    var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
      return new bootstrap.Popover(popoverTriggerEl);
    });

    // toast
    var toastElList = [].slice.call(document.querySelectorAll(".toast"));
    var toastList = toastElList.map(function (toastEl) {
      return new bootstrap.Toast(toastEl);
    });
  }
  function fadeOutEffect(elem, delay) {
    var fadeTarget = document.getElementById(elem);
    fadeTarget.style.display = "block";
    var fadeEffect = setInterval(function () {
      if (!fadeTarget.style.opacity) {
        fadeTarget.style.opacity = 1;
      }
      if (fadeTarget.style.opacity > 0) {
        fadeTarget.style.opacity -= 0.2;
      } else {
        clearInterval(fadeEffect);
        fadeTarget.style.display = "none";
      }
    }, 200);
  }
  function initPreloader() {
    window.onload = function () {
      if (document.getElementById("preloader")) {
        fadeOutEffect("pre-status", 300);
        fadeOutEffect("preloader", 400);
      }
    };
  }
  function initSettings() {
    // Feather Icons
    feather.replace();
    if (window.sessionStorage) {
      var alreadyVisited = sessionStorage.getItem("is_visited");
      if (!alreadyVisited) {
        sessionStorage.setItem("is_visited", "layout-direction-ltr");
      } else {
        var value = document.querySelector("#" + alreadyVisited);
        if (value !== null) {
          value.checked = true;
          changeDirection(alreadyVisited);
        }
      }
    }
  }
  function changeDirection(id) {
    if (document.getElementById("layout-direction-ltr").checked == true && id === "layout-direction-ltr") {
      document.getElementsByTagName("html")[0].removeAttribute("dir");
      document.getElementById("layout-direction-rtl").checked = false;
      document.getElementById("bootstrap-style").setAttribute("href", "assets/css/bootstrap.min.css");
      document.getElementById("app-style").setAttribute("href", "assets/css/app.min.css");
      sessionStorage.setItem("is_visited", "layout-direction-ltr");
    } else if (document.getElementById("layout-direction-rtl").checked == true && id === "layout-direction-rtl") {
      document.getElementById("layout-direction-ltr").checked = false;
      document.getElementById("bootstrap-style").setAttribute("href", "assets/css/bootstrap.rtl.css");
      document.getElementById("app-style").setAttribute("href", "assets/css/app.rtl.css");
      document.getElementsByTagName("html")[0].setAttribute("dir", "rtl");
      sessionStorage.setItem("is_visited", "layout-direction-rtl");
    }
  }
  function updateRadio(radioId) {
    if (document.getElementById(radioId)) document.getElementById(radioId).checked = true;
  }
  function layoutSetting() {
    var body = document.body;
    document.getElementById("right-bar-toggle").addEventListener("click", function (e) {
      body.classList.toggle("right-bar-enabled");
    });
    body.addEventListener("click", function (e) {
      if (e.target.parentElement.classList.contains("right-bar-toggle-close")) {
        document.body.classList.remove("right-bar-enabled");
        return;
      } else if (e.target.closest(".right-bar-toggle, .right-bar")) {
        return;
      }
      document.body.classList.remove("right-bar-enabled");
      return;
    });
    var body = document.getElementsByTagName("body")[0];
    if (body.hasAttribute("data-layout") && body.getAttribute("data-layout") == "horizontal") {
      updateRadio("layout-horizontal");
      document.getElementById("sidebar-setting").style.display = "none";
    } else {
      updateRadio("layout-vertical");
    }
    body.hasAttribute("data-bs-theme") && body.getAttribute("data-bs-theme") == "dark" ? updateRadio("layout-mode-dark") : updateRadio("layout-mode-light");
    body.hasAttribute("data-layout-size") && body.getAttribute("data-layout-size") == "boxed" ? updateRadio("layout-width-boxed") : updateRadio("layout-width-fluid");
    body.hasAttribute("data-layout-scrollable") && body.getAttribute("data-layout-scrollable") == "true" ? updateRadio("layout-position-scrollable") : updateRadio("layout-position-fixed");
    body.hasAttribute("data-topbar") && body.getAttribute("data-topbar") == "dark" ? updateRadio("topbar-color-dark") : updateRadio("topbar-color-light");
    body.hasAttribute("data-sidebar-size") && body.getAttribute("data-sidebar-size") == "sm" ? updateRadio("sidebar-size-small") : body.hasAttribute("data-sidebar-size") && body.getAttribute("data-sidebar-size") == "md" ? updateRadio("sidebar-size-compact") : updateRadio("sidebar-size-default");
    body.hasAttribute("data-sidebar") && body.getAttribute("data-sidebar") == "brand" ? updateRadio("sidebar-color-brand") : body.hasAttribute("data-sidebar") && body.getAttribute("data-sidebar") == "dark" ? updateRadio("sidebar-color-dark") : updateRadio("sidebar-color-light");
    document.getElementsByTagName("html")[0].hasAttribute("dir") && document.getElementsByTagName("html")[0].getAttribute("dir") == "rtl" ? updateRadio("layout-direction-rtl") : updateRadio("layout-direction-ltr");

    // on layout change
    document.querySelectorAll("input[name='layout'").forEach(function (input) {
      input.addEventListener("change", function (e) {
        if (e && e.target && e.target.value) window.location.href = e.target.value == "vertical" ? "layout-vertical" : "index";
      });
    });

    // on layout light mode change
    document.querySelectorAll("input[name='layout-mode']").forEach(function (input) {
      input.addEventListener("change", function (e) {
        if (e && e.target && e.target.value) {
          if (e.target.value == "light") {
            document.body.setAttribute("data-bs-theme", "light");
            document.body.setAttribute("data-topbar", "light");
            document.body.setAttribute("data-sidebar", "light");
            body.hasAttribute("data-layout") && body.getAttribute("data-layout") == "horizontal" ? "" : document.body.setAttribute("data-sidebar", "light");
            updateRadio("topbar-color-light");
            updateRadio("sidebar-color-light");
          } else {
            document.body.setAttribute("data-bs-theme", "dark");
            document.body.setAttribute("data-topbar", "dark");
            document.body.setAttribute("data-sidebar", "dark");
            body.hasAttribute("data-layout") && body.getAttribute("data-layout") == "horizontal" ? "" : document.body.setAttribute("data-sidebar", "dark");
            updateRadio("topbar-color-dark");
            updateRadio("sidebar-color-dark");
          }
        }
      });
    });

    // on layout direction change
    document.querySelectorAll("input[name='layout-direction']").forEach(function (input) {
      input.addEventListener("change", function (e) {
        if (e && e.target && e.target.value) {
          if (e.target.value == "ltr") {
            document.getElementsByTagName("html")[0].removeAttribute("dir");
            document.getElementById("bootstrap-style").setAttribute("href", "assets/css/bootstrap.min.css");
            document.getElementById("app-style").setAttribute("href", "assets/css/app.min.css");
            sessionStorage.setItem("is_visited", "layout-direction-ltr");
          } else {
            document.getElementById("bootstrap-style").setAttribute("href", "assets/css/bootstrap.rtl.css");
            document.getElementById("app-style").setAttribute("href", "assets/css/app.rtl.css");
            document.getElementsByTagName("html")[0].setAttribute("dir", "rtl");
            sessionStorage.setItem("is_visited", "layout-direction-rtl");
          }
        }
      });
    });
  }
  function initCheckAll() {
    var checkAll = document.getElementById("checkAll");
    if (checkAll) {
      checkAll.onclick = function () {
        var checkboxes = document.querySelectorAll('.table-check input[type="checkbox"]');
        for (var i = 0; i < checkboxes.length; i++) {
          checkboxes[i].checked = this.checked;
        }
      };
    }
  }
  function updateHorizontlMenu() {
    // Horizontal toggle menu
    if (document.getElementById("horimenu-btn")) {
      document.getElementById("horimenu-btn").addEventListener("click", function (e) {
        document.body.classList.toggle("horimenu-enabled");
      });
      var horiMenuCollapse = document.getElementById("topnav-menu-content");
      var horiMenuBSCollapse = new bootstrap.Collapse(horiMenuCollapse, {
        toggle: false
      });
      document.querySelector(".hori-overlay").addEventListener("click", function (e) {
        horiMenuBSCollapse.hide();
        document.body.classList.remove("horimenu-enabled");
      });
      window.addEventListener("resize", function () {
        horiMenuBSCollapse.hide();
        if (window.innerWidth < 991) document.body.classList.remove("horimenu-enabled");
      });
    }
    // dash toggle collapse
    var horiMenuBtn = document.getElementById("dash-troggle-icon");
    var menuStatus = true;
    var myCollapse = document.getElementById("dashtoggle");
    var bsCollapse = new bootstrap.Collapse(myCollapse, {
      toggle: false
    });
    horiMenuBtn.addEventListener("click", function () {
      menuStatus = false;
      setTimeout(function () {
        menuStatus = true;
      }, 500);
    });
    window.addEventListener("scroll", function () {
      if ((document.documentElement.scrollTop > 100 || document.documentElement.scrollTop == 0) && menuStatus) {
        var scrollHeight = window.pageYOffset;
        var navHeight = 20;
        if (scrollHeight > navHeight) {
          bsCollapse.hide();
        } else {
          bsCollapse.show();
        }
        if (window.innerWidth <= 992) {
          menuStatus = false;
          setTimeout(function () {
            menuStatus = false;
          }, 500);
          bsCollapse.hide();
        }
      }
    });
  }
  function init() {
    initPreloader();
    initSettings();
    initMetisMenu();
    initCounterNumber();
    initLeftMenuCollapse();
    initActiveMenu();
    initHoriMenuActive();
    initFullScreen();
    initDropdownMenu();
    initComponents();
    initLanguage();
    layoutSetting();
    initMenuItemScroll();
    updateHorizontlMenu();
    initCheckAll();
  }
  init();
})();

/***/ }),

/***/ "./resources/scss/bootstrap.scss":
/*!***************************************!*\
  !*** ./resources/scss/bootstrap.scss ***!
  \***************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./resources/scss/icons.scss":
/*!***********************************!*\
  !*** ./resources/scss/icons.scss ***!
  \***********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./resources/scss/app.scss":
/*!*********************************!*\
  !*** ./resources/scss/app.scss ***!
  \*********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = __webpack_modules__;
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/chunk loaded */
/******/ 	(() => {
/******/ 		var deferred = [];
/******/ 		__webpack_require__.O = (result, chunkIds, fn, priority) => {
/******/ 			if(chunkIds) {
/******/ 				priority = priority || 0;
/******/ 				for(var i = deferred.length; i > 0 && deferred[i - 1][2] > priority; i--) deferred[i] = deferred[i - 1];
/******/ 				deferred[i] = [chunkIds, fn, priority];
/******/ 				return;
/******/ 			}
/******/ 			var notFulfilled = Infinity;
/******/ 			for (var i = 0; i < deferred.length; i++) {
/******/ 				var [chunkIds, fn, priority] = deferred[i];
/******/ 				var fulfilled = true;
/******/ 				for (var j = 0; j < chunkIds.length; j++) {
/******/ 					if ((priority & 1 === 0 || notFulfilled >= priority) && Object.keys(__webpack_require__.O).every((key) => (__webpack_require__.O[key](chunkIds[j])))) {
/******/ 						chunkIds.splice(j--, 1);
/******/ 					} else {
/******/ 						fulfilled = false;
/******/ 						if(priority < notFulfilled) notFulfilled = priority;
/******/ 					}
/******/ 				}
/******/ 				if(fulfilled) {
/******/ 					deferred.splice(i--, 1)
/******/ 					var r = fn();
/******/ 					if (r !== undefined) result = r;
/******/ 				}
/******/ 			}
/******/ 			return result;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/define property getters */
/******/ 	(() => {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = (exports, definition) => {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/jsonp chunk loading */
/******/ 	(() => {
/******/ 		// no baseURI
/******/ 		
/******/ 		// object to store loaded and loading chunks
/******/ 		// undefined = chunk not loaded, null = chunk preloaded/prefetched
/******/ 		// [resolve, reject, Promise] = chunk loading, 0 = chunk loaded
/******/ 		var installedChunks = {
/******/ 			"/js/app": 0,
/******/ 			"assets/css/app": 0,
/******/ 			"assets/css/icons": 0,
/******/ 			"assets/css/bootstrap": 0
/******/ 		};
/******/ 		
/******/ 		// no chunk on demand loading
/******/ 		
/******/ 		// no prefetching
/******/ 		
/******/ 		// no preloaded
/******/ 		
/******/ 		// no HMR
/******/ 		
/******/ 		// no HMR manifest
/******/ 		
/******/ 		__webpack_require__.O.j = (chunkId) => (installedChunks[chunkId] === 0);
/******/ 		
/******/ 		// install a JSONP callback for chunk loading
/******/ 		var webpackJsonpCallback = (parentChunkLoadingFunction, data) => {
/******/ 			var [chunkIds, moreModules, runtime] = data;
/******/ 			// add "moreModules" to the modules object,
/******/ 			// then flag all "chunkIds" as loaded and fire callback
/******/ 			var moduleId, chunkId, i = 0;
/******/ 			if(chunkIds.some((id) => (installedChunks[id] !== 0))) {
/******/ 				for(moduleId in moreModules) {
/******/ 					if(__webpack_require__.o(moreModules, moduleId)) {
/******/ 						__webpack_require__.m[moduleId] = moreModules[moduleId];
/******/ 					}
/******/ 				}
/******/ 				if(runtime) var result = runtime(__webpack_require__);
/******/ 			}
/******/ 			if(parentChunkLoadingFunction) parentChunkLoadingFunction(data);
/******/ 			for(;i < chunkIds.length; i++) {
/******/ 				chunkId = chunkIds[i];
/******/ 				if(__webpack_require__.o(installedChunks, chunkId) && installedChunks[chunkId]) {
/******/ 					installedChunks[chunkId][0]();
/******/ 				}
/******/ 				installedChunks[chunkId] = 0;
/******/ 			}
/******/ 			return __webpack_require__.O(result);
/******/ 		}
/******/ 		
/******/ 		var chunkLoadingGlobal = self["webpackChunk"] = self["webpackChunk"] || [];
/******/ 		chunkLoadingGlobal.forEach(webpackJsonpCallback.bind(null, 0));
/******/ 		chunkLoadingGlobal.push = webpackJsonpCallback.bind(null, chunkLoadingGlobal.push.bind(chunkLoadingGlobal));
/******/ 	})();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module depends on other loaded chunks and execution need to be delayed
/******/ 	__webpack_require__.O(undefined, ["assets/css/app","assets/css/icons","assets/css/bootstrap"], () => (__webpack_require__("./resources/js/app.js")))
/******/ 	__webpack_require__.O(undefined, ["assets/css/app","assets/css/icons","assets/css/bootstrap"], () => (__webpack_require__("./resources/scss/bootstrap.scss")))
/******/ 	__webpack_require__.O(undefined, ["assets/css/app","assets/css/icons","assets/css/bootstrap"], () => (__webpack_require__("./resources/scss/icons.scss")))
/******/ 	var __webpack_exports__ = __webpack_require__.O(undefined, ["assets/css/app","assets/css/icons","assets/css/bootstrap"], () => (__webpack_require__("./resources/scss/app.scss")))
/******/ 	__webpack_exports__ = __webpack_require__.O(__webpack_exports__);
/******/ 	
/******/ })()
;