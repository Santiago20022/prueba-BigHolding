import './bootstrap';
import Vue from 'vue'
window.Vue = require('vue').default;

Vue.component('example', require('./components/Example.vue').default)

const app = new Vue({
    el: '#app',
});