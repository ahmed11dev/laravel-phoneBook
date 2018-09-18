
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

 //Vue.component('exampleComponent', require('./components/ExampleComponent.vue'));
    // Vue.component('MyHeader', require('./components/MyHeader.vue'));
//Vue.component('MyHeader', require('./components/MyHeader.vue'));

let myheader = require('./components/MyHeader.vue');
let home = require('./components/Home.vue');
let about = require('./components/About.vue');
let myfooter = require('./components/Myfooter.vue');


const routes = [
    { path: '/home', component: home },
    { path: '/about', component: about }
]

const router = new VueRouter({
    //mode:'history', //علشان نشيل الهاش الي في اليو ار ال
    routes // short for `routes: routes`
})

const app = new Vue({
    el: '#app',
    router,
    components: { myheader, myfooter}

});
