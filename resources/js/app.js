/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */




require('./bootstrap');

window.Vue = require('vue');

// Vue router
import VueRouter from "vue-router";

Vue.use(VueRouter);

import Home from "./components/Home.vue";
import NotFound from "./components/NotFound";
import Upload from "./components/Upload";
import Profile from "./components/Profile";
import EditProfile from "./components/EditProfile";
const routes = [
    { path: "/home", component: Home },
    { path: "/feed", component: Home },
    { path: "/upload", component: Upload },
    { path: "/profile", component: Profile },
    { path: "/editprofile", component: EditProfile },
    { path: "*", component: NotFound }

];

const router = new VueRouter({
    mode: "history",
    routes // short for `routes: routes`
});

// end vue router

// v-form
import { Form, HasError, AlertError } from "vform";
Vue.component(HasError.name, HasError);
Vue.component(AlertError.name, AlertError);
window.Form = Form;
// end v-form

// vue progress bar
// vueprogressbar
import VueProgressBar from 'vue-progressbar'

Vue.use(VueProgressBar, {
    color: 'rgb(143, 255, 199)',
    // color: '#3490dc',
    failedColor: 'red',
    height: '7px'
})
// end vue progress bar

// sweet alert url - https://sweetalert2.github.io/#download
import swal from "sweetalert2";
window.swal = swal;

import Swalla from "sweetalert2";
window.Swalla = Swalla;

const toast = swal.mixin({
    toast: true,
    position: "top-end",
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    onOpen: toast => {
        toast.addEventListener("mouseenter", swal.stopTimer);
        toast.addEventListener("mouseleave", swal.resumeTimer);
    }
});
window.toast = toast;
// end sweet alert

// vue infinite scrolling
import InfiniteLoading from 'vue-infinite-loading';
Vue.component('InfiniteLoading', require('vue-infinite-loading'));
// end i-s
window.Fire = new Vue();

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router,
});
