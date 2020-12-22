import "./bootstrap";
import "bootstrap/dist/css/bootstrap.min.css";
import Vue from "vue";
import router from "./routes/routes";
import Layout from "./components/Layout";

window.Vue = Vue;
Vue.component("app-layout", Layout);
const app = new Vue({
    el:'#app',
    router
}) 
