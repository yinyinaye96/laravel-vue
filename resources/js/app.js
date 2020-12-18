import "./bootstrap";
import Vue from "vue";
import router from "./routes/routes";
import Layout from "./components/Layout";

// require('./bootstrap');

window.Vue = Vue;
Vue.component("app-layout", Layout);
const app = new Vue({
    el:'#app',
    router
}) 
