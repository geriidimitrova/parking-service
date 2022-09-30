/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/service.js":
/*!*********************************!*\
  !*** ./resources/js/service.js ***!
  \*********************************/
/*! no static exports found */
/***/ (function(module, exports) {

$('.availabilities-btn').click(function () {
  // var leader_id = $(this).attr("id");
  $.ajax({
    url: 'api/vehicles',
    type: 'GET',
    success: function success(response) {
      $('#availabilities-modal').modal("show");
      $('#availabilities-details').html("At ".concat(getDateNow(), " there are ").concat(200 - response.length, " available places in the parking"));
    }
  });
});

function checkVehiclesTime(id) {
  var id = $('#' + id)[0];
  $.ajax({
    url: "api/vehicles/".concat(id.value),
    type: 'GET',
    success: function success(response) {
      if (!response.data) {
        $('#time-details').html('No exising vehicle with that registration number');
        return;
      }

      $('#time-details').html("".concat(sumPayment(response.data)) + ' lv.');
    },
    error: function error(req, status, err) {
      console.log('Something went wrong', status, err);
    }
  });
}

function register(formId) {
  var form = $("#".concat(formId));
  $("#".concat(formId, " input[type=\"text\"]")).blur(function () {
    if (!$(this).val()) {
      $(this).addClass("error");
    } else {
      $.ajax({
        url: form.attr('action'),
        type: form.attr('method'),
        data: form.serialize(),
        success: function success() {},
        error: function error(req, status, err) {
          console.log('Something went wrong', status, err);
        }
      });
    }
  });
}

function unregister(id) {
  var id = $('#' + id)[0];
  $.ajax({
    url: "api/vehicles/".concat(id.value),
    type: 'DELETE',
    success: function success() {
      alert("Unregister the vehicle successfully");
      location.reload();
    },
    error: function error() {
      alert("Problem while unregistering the vehicle. Try again latter.");
      location.reload();
    }
  });
}

function sumPayment(vehicle) {
  var dateNow = new Date();
  var time = Math.round((Math.round(dateNow / 1000) - vehicle.entrance_time) / 3600);
  var fee = 8 < dateNow.getHours() < 18 ? vehicle.vehicle_type.day_fee : vehicle.vehicle_type.night_fee;
  var discount = vehicle.discount_card ? vehicle.discount_card.value / 100 : 1;
  return discount * time * fee;
}

function getDateNow() {
  var dateNow = new Date();
  return dateNow.getHours() + ':' + dateNow.getMinutes();
}

/***/ }),

/***/ 1:
/*!***************************************!*\
  !*** multi ./resources/js/service.js ***!
  \***************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\Users\gdimitrova\Desktop\parking\resources\js\service.js */"./resources/js/service.js");


/***/ })

/******/ });