<template>
  <div class="container">
    <Blog :data="DataBlog">
      <div class="search">
        <input type="text" v-model="searchTerm" class="searchTerm" placeholder="Cari judul">
        <button @click="searchBlogs" class="searchButton">Cari</button>
      </div>
    </Blog>
  </div>
</template>

<script>
import Blog from '@/components/Beranda/Blog.vue';
import { Get } from '../Api/index.js';

export default {
  components: {
    Blog
  },
  data() {
    return {
      DataBlog: [],
      searchTerm: '', // Add a searchTerm data property
    }
  },
  async mounted() {
    // Load all blogs initially
    await this.loadBlogs();
  },
  methods: {
    async loadBlogs() {
      const response = await Get('blog', { search: this.searchTerm }); // Pass the search term as a query parameter
      this.DataBlog = response.data.data;
    },
    async searchBlogs() {
      // Trigger the search by loading blogs based on the search term
      await this.loadBlogs();
    },
  }
}
</script>
