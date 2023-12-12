import './bootstrap';
import Vue from 'vue'
window.Vue = require('vue').default;

Vue.component('home', require('./components/Home.vue').default)
Vue.component('reporte', require('./components/Reporte.vue').default)
const app = new Vue({
    el: '#app',
});