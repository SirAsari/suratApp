import './assets/main.css'
import { createRouter, createWebHistory } from 'vue-router';
import { createApp } from 'vue';
import Home from "@/Pages/Home.vue";
import App from './App.vue';


// import Header from "@/components/Beranda/Header.vue";
import Portofolio from "@/pages/Portofolio.vue";
// import Service from "@/pages/Service.vue";
import Blog from "@/pages/Blog.vue";
import Contact from "@/pages/Contact.vue";

const routes = [
    {
        path: "/",
        name: "home",
        component: Home,
    },
    {
        path: "/Portofolio",
        name: "Portofolio",
        component: Portofolio,
    },
    {
        path: "/Contact",
        name: "Contact",
        component: Contact,
    },
    {
        path: "/Blog",
        component: Blog,
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

createApp(App).use(router).mount('#app')
