<template>
  <div class="container">
      <Portofolio :data="DataPortfolio"></Portofolio>
  </div>
</template>

<script>
import Portofolio from '@/components/Beranda/Portofolio.vue';
import { Get } from '@/Api/index.js';
export default {
  components: {
    Portofolio,
  },
  data() {
    return {
      DataPortfolio: [],
      DataCategories: [],
    }
  },
  methods: {
        async filter(id) {
            const response = await Get('portfolio?category_id=' + id);
            // console.log(response.data.data);
            this.DataPortfolio = response.data.data;
            console.log(this.DataPortfolio);
        }
    },
  async created() {
    // api untuk portofolio
    const responsePortfolio = await Get('portfolio');
    this.DataPortfolio = responsePortfolio.data.data;
    const responseCategories = await Get('categories');
    this.DataCategories = responseCategories.data;
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