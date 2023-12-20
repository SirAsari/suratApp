<template>
  <div>
    <Navbar></Navbar>
    <Sidebar></Sidebar>
    <router-view></router-view>
  </div>
</template>

<script>
import Navbar from '@/components/layouts/Navbar.vue';
import Sidebar from '@/components/layouts/Sidebar.vue';

export default {
  components: {
    Navbar,
    Sidebar,
  },
}
// import Header from './components/Beranda/Header.vue';
// import Service from './components/Beranda/Service.vue';
// import Portofolio from './components/Beranda/Portofolio.vue';
// import Blog from './components/Beranda/Blog.vue';
</script>

<style>
html, 
body {
  padding: 0;
  margin: 0;
  font-family: 'Poppins', sans-serif;
}
</style>