import Vue from "vue";
import VueRouter from "vue-router";
import ListPost from "../pages/ListPost";
import CreatePost from "../pages/CreatePost";
import EditPost from '../pages/EditPost';
import UserList from '../pages/UserList';
import CreateUser from '../pages/CreateUser';
import EditUser from '../pages/EditUser';

Vue.use(VueRouter);
const routes = [
    {
        name: 'posts',
        path: "/",
        component: ListPost
    },
    {
        name: 'create',
        path: '/post/create',
        component: CreatePost
    },
    {
        name: 'edit',
        path: '/edit/:id',
        component: EditPost,
        props: true,
    },
    {
        name: 'users',
        path: "/users",
        component: UserList
    },
    {
        name: 'createuser',
        path: '/user/create',
        component: CreateUser
    },
    {
        name: 'edituser',
        path: '/edit/:id',
        component: EditUser,
        props: true,
    }
];

export default new VueRouter({
    mode: "history",
    routes,
});