import Vue from "vue";
import VueRouter from "vue-router";
import ListPost from "../pages/ListPost";
import CreatePost from "../pages/CreatePost";
import EditPost from '../pages/EditPost';

Vue.use(VueRouter);
const routes = [
    {
        name: 'posts',
        path: "/",
        component: ListPost
    },
    {
        name: 'create',
        path: '/create',
        component: CreatePost
    },
    {
        name: 'edit',
        path: '/edit/:id',
        component: EditPost,
    }
];

export default new VueRouter({
    mode: "history",
    routes,
});