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
/******/ 	return __webpack_require__(__webpack_require__.s = 4);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/pages/dashboard.init.js":
/*!**********************************************!*\
  !*** ./resources/js/pages/dashboard.init.js ***!
  \**********************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/*
Template Name: Lexa - Responsive Bootstrap 4 Admin Dashboard
Author: Themesbrand
Website: https://themesbrand.com/
Contact: themesbrand@gmail.com
File: Dashboard
*/
!function ($) {
  "use strict";

  var Dashboard = function Dashboard() {}; //creates area chart


  Dashboard.prototype.createAreaChart = function (element, pointSize, lineWidth, data, xkey, ykeys, labels, lineColors) {
    Morris.Area({
      element: element,
      pointSize: 0,
      lineWidth: 1,
      data: data,
      xkey: xkey,
      ykeys: ykeys,
      labels: labels,
      resize: true,
      gridLineColor: 'rgba(108, 120, 151, 0.1)',
      hideHover: 'auto',
      lineColors: lineColors,
      fillOpacity: .9,
      behaveLikeLine: true
    });
  }, //creates Donut chart
  Dashboard.prototype.createDonutChart = function (element, data, colors) {
    Morris.Donut({
      element: element,
      data: data,
      resize: true,
      colors: colors
    });
  }, //creates Stacked chart
  Dashboard.prototype.createStackedChart = function (element, data, xkey, ykeys, labels, lineColors) {
    Morris.Bar({
      element: element,
      data: data,
      xkey: xkey,
      ykeys: ykeys,
      stacked: true,
      labels: labels,
      hideHover: 'auto',
      resize: true,
      //defaulted to true
      gridLineColor: 'rgba(108, 120, 151, 0.1)',
      barColors: lineColors
    });
  }, $('#sparkline').sparkline([8, 6, 4, 7, 10, 12, 7, 4, 9, 12, 13, 11, 12], {
    type: 'bar',
    height: '130',
    barWidth: '10',
    barSpacing: '7',
    barColor: '#7A6FBE'
  });
  Dashboard.prototype.init = function () {
    //creating area chart
    var $areaData = [{
      y: '2011',
      a: 0,
      b: 0,
      c: 0
    }, {
      y: '2012',
      a: 150,
      b: 45,
      c: 15
    }, {
      y: '2013',
      a: 60,
      b: 150,
      c: 195
    }, {
      y: '2014',
      a: 180,
      b: 36,
      c: 21
    }, {
      y: '2015',
      a: 90,
      b: 60,
      c: 360
    }, {
      y: '2016',
      a: 75,
      b: 240,
      c: 120
    }, {
      y: '2017',
      a: 30,
      b: 30,
      c: 30
    }];
    this.createAreaChart('morris-area-example', 0, 0, $areaData, 'y', ['a', 'b', 'c'], ['Series A', 'Series B', 'Series C'], ['#ccc', '#7a6fbe', '#28bbe3']); //creating donut chart

    var $donutData = [{
      label: "Download Sales",
      value: 12
    }, {
      label: "In-Store Sales",
      value: 30
    }, {
      label: "Mail-Order Sales",
      value: 20
    }];
    this.createDonutChart('morris-donut-example', $donutData, ['#f0f1f4', '#7a6fbe', '#28bbe3']);
    var $stckedData = [{
      y: '2005',
      a: 45,
      b: 180
    }, {
      y: '2006',
      a: 75,
      b: 65
    }, {
      y: '2007',
      a: 100,
      b: 90
    }, {
      y: '2008',
      a: 75,
      b: 65
    }, {
      y: '2009',
      a: 100,
      b: 90
    }, {
      y: '2010',
      a: 75,
      b: 65
    }, {
      y: '2011',
      a: 50,
      b: 40
    }, {
      y: '2012',
      a: 75,
      b: 65
    }, {
      y: '2013',
      a: 50,
      b: 40
    }, {
      y: '2014',
      a: 75,
      b: 65
    }, {
      y: '2015',
      a: 100,
      b: 90
    }, {
      y: '2016',
      a: 80,
      b: 65
    }];
    this.createStackedChart('morris-bar-stacked', $stckedData, 'y', ['a', 'b'], ['Series A', 'Series B'], ['#28bbe3', '#f0f1f4']);
  }, //init
  $.Dashboard = new Dashboard(), $.Dashboard.Constructor = Dashboard;
}(window.jQuery), //initializing 
function ($) {
  "use strict";

  $.Dashboard.init();
}(window.jQuery);

/***/ }),

/***/ 4:
/*!****************************************************!*\
  !*** multi ./resources/js/pages/dashboard.init.js ***!
  \****************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /var/www/html/LexaLaravel/resources/js/pages/dashboard.init.js */"./resources/js/pages/dashboard.init.js");


/***/ })

/******/ });