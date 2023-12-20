<template>
    <div class="container">
        <Service :data="DataLayanan"></Service>
    </div>
 </template>
  
  <script>
  import Service from '@/components/Beranda/Service.vue';
  import { Get } from '@/Api/index.js';
  export default {
    components: {
      Service,
    },
    data() {
      return {
        DataLayanan: [],
      }
    },
    async mounted() {
      // api untuk layanan
      const responseLayanan = await Get('services');
      this.DataLayanan = responseLayanan.data.data;
    },
  }
  </script>
  
  <style>
  html, 
  body {
    padding: 0;
    margin: 0;
    font-family: 'Poppins', sans-serif;
  }
  </style>