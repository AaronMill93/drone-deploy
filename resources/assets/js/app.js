/**
 * JavaScript dependencies
 */
require('./bootstrap');
require('./gmap');

window.Vue = require('vue'); 

/**
 * Vanilla JS Initializations
 */
$('#calendar').datepicker({
});

$("#menu-toggle").click(function(e) {
e.preventDefault();
$("#wrapper").toggleClass("toggled");
});

window.onload = function () {
	var chart2 = document.getElementById("bar-chart").getContext("2d");
	window.myBar = new Chart(chart2).Bar(barChartData, {
	responsive: true,
	scaleLineColor: "rgba(0,0,0,.2)",
	scaleGridLineColor: "rgba(0,0,0,.05)",
	scaleFontColor: "#c5c7cc"
	});
};

/**
 * Vue Components
 */

Vue.component('deployment-table', require('./components/deployment-table.vue'));
Vue.component('test', require('./components/test.vue'));
const app = new Vue({
    el: '#app',
});
