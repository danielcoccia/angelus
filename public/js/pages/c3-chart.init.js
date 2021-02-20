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
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/pages/c3-chart.init.js":
/*!*********************************************!*\
  !*** ./resources/js/pages/c3-chart.init.js ***!
  \*********************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/*
Template Name: Lexa - Responsive Bootstrap 4 Admin Dashboard
Author: Themesbrand
Website: https://themesbrand.com/
Contact: themesbrand@gmail.com
File: C3
*/
!function ($) {
  "use strict";

  var ChartC3 = function ChartC3() {};

  ChartC3.prototype.init = function () {
    //generating chart 
    c3.generate({
      bindto: '#chart',
      data: {
        columns: [['Desktop', 150, 80, 70, 152, 250, 95], ['Mobile', 200, 130, 90, 240, 130, 220], ['Tablet', 300, 200, 160, 400, 250, 250]],
        type: 'bar',
        colors: {
          Desktop: '#f0f1f4',
          Mobile: '#7a6fbe',
          Tablet: '#28bbe3'
        }
      }
    }); //combined chart

    c3.generate({
      bindto: '#combine-chart',
      data: {
        columns: [['SonyVaio', 30, 20, 50, 40, 60, 50], ['iMacs', 200, 130, 90, 240, 130, 220], ['Tablets', 300, 200, 160, 400, 250, 250], ['iPhones', 200, 130, 90, 240, 130, 220], ['Macbooks', 130, 120, 150, 140, 160, 150]],
        types: {
          SonyVaio: 'bar',
          iMacs: 'bar',
          Tablets: 'spline',
          iPhones: 'line',
          Macbooks: 'bar'
        },
        colors: {
          SonyVaio: '#f0f1f4',
          iMacs: '#7a6fbe',
          Tablets: '#2f8ee0',
          iPhones: '#fb4',
          Macbooks: '#28bbe3'
        },
        groups: [['SonyVaio', 'iMacs']]
      },
      axis: {
        x: {
          type: 'categorized'
        }
      }
    }); //roated chart

    c3.generate({
      bindto: '#roated-chart',
      data: {
        columns: [['Revenue', 30, 200, 100, 400, 150, 250], ['Pageview', 50, 20, 10, 40, 15, 25]],
        types: {
          Revenue: 'bar'
        },
        colors: {
          Revenue: '#f0f1f4',
          Pageview: '#28bbe3'
        }
      },
      axis: {
        rotated: true,
        x: {
          type: 'categorized'
        }
      }
    }); //stacked chart

    c3.generate({
      bindto: '#chart-stacked',
      data: {
        columns: [['Revenue', 130, 120, 150, 140, 160, 150, 130, 120, 150, 140, 160, 150], ['Pageview', 200, 130, 90, 240, 130, 220, 200, 130, 90, 240, 130, 220]],
        types: {
          Revenue: 'area-spline',
          Pageview: 'area-spline' // 'line', 'spline', 'step', 'area', 'area-step' are also available to stack

        },
        colors: {
          Revenue: '#f0f1f4',
          Pageview: '#28bbe3'
        }
      }
    }); //Donut Chart

    c3.generate({
      bindto: '#donut-chart',
      data: {
        columns: [['Desktops', 78], ['Smart Phones', 55], ['Mobiles', 40], ['Tablets', 25]],
        type: 'donut'
      },
      donut: {
        title: "Candidates",
        width: 30,
        label: {
          show: false
        }
      },
      color: {
        pattern: ['#f0f1f4', '#7a6fbe', '#28bbe3', '#2f8ee0']
      }
    }); //Pie Chart

    c3.generate({
      bindto: '#pie-chart',
      data: {
        columns: [['Desktops', 78], ['Smart Phones', 55], ['Mobiles', 40], ['Tablets', 25]],
        type: 'pie'
      },
      color: {
        pattern: ['#f0f1f4', '#7a6fbe', '#28bbe3', '#2f8ee0']
      },
      pie: {
        label: {
          show: false
        }
      }
    });
  }, $.ChartC3 = new ChartC3(), $.ChartC3.Constructor = ChartC3;
}(window.jQuery), //initializing 
function ($) {
  "use strict";

  $.ChartC3.init();
}(window.jQuery);

/***/ }),

/***/ "./resources/scss/app-dark.scss":
/*!**************************************!*\
  !*** ./resources/scss/app-dark.scss ***!
  \**************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/scss/app-rtl.scss":
/*!*************************************!*\
  !*** ./resources/scss/app-rtl.scss ***!
  \*************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/scss/app.scss":
/*!*********************************!*\
  !*** ./resources/scss/app.scss ***!
  \*********************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/scss/bootstrap-dark.scss":
/*!********************************************!*\
  !*** ./resources/scss/bootstrap-dark.scss ***!
  \********************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/scss/bootstrap.scss":
/*!***************************************!*\
  !*** ./resources/scss/bootstrap.scss ***!
  \***************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/scss/icons.scss":
/*!***********************************!*\
  !*** ./resources/scss/icons.scss ***!
  \***********************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 0:
/*!*******************************************************************************************************************************************************************************************************************************************!*\
  !*** multi ./resources/js/pages/c3-chart.init.js ./resources/scss/bootstrap.scss ./resources/scss/bootstrap-dark.scss ./resources/scss/icons.scss ./resources/scss/app-rtl.scss ./resources/scss/app.scss ./resources/scss/app-dark.scss ***!
  \*******************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! /var/www/html/LexaLaravel/resources/js/pages/c3-chart.init.js */"./resources/js/pages/c3-chart.init.js");
__webpack_require__(/*! /var/www/html/LexaLaravel/resources/scss/bootstrap.scss */"./resources/scss/bootstrap.scss");
__webpack_require__(/*! /var/www/html/LexaLaravel/resources/scss/bootstrap-dark.scss */"./resources/scss/bootstrap-dark.scss");
__webpack_require__(/*! /var/www/html/LexaLaravel/resources/scss/icons.scss */"./resources/scss/icons.scss");
__webpack_require__(/*! /var/www/html/LexaLaravel/resources/scss/app-rtl.scss */"./resources/scss/app-rtl.scss");
__webpack_require__(/*! /var/www/html/LexaLaravel/resources/scss/app.scss */"./resources/scss/app.scss");
module.exports = __webpack_require__(/*! /var/www/html/LexaLaravel/resources/scss/app-dark.scss */"./resources/scss/app-dark.scss");


/***/ })

/******/ });