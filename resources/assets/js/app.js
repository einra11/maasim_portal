
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('calendar-app', require('./components/Calendar.vue')); 
Vue.component('clock-app', require('./components/Clock.vue'));
Vue.component('about-app', require('./components/About.vue'));
Vue.component('side-nav', require('./components/Sidenav.vue'));
Vue.component('main-app', require('./components/MainDashboard.vue'));


// import Vue from 'vue';
import Vuetify from 'vuetify'
Vue.use(Vuetify)

import fullcalendar from 'vue-fullcalendar'
Vue.component('full-calendar', fullcalendar)


const app = new Vue({
    el: '#app'
});
