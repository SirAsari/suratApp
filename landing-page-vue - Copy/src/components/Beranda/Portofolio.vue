<template>
    <div class="portofolio">
        <h3>Portfolio kami</h3>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium, atque.</p>
        <div class="category">
            <span v-for="category in DataCategories" :key="category.id" @click="filter(category.id)"> {{ category.title }}</span>
        </div>
        <div class="row-portofolio">
            <CardPortofolio v-for="item in DataPortfolio" :portfolio="item"></CardPortofolio>
        </div>
    </div>
</template>
<script>
import CardPortofolio from '@/components/Portofolio/Card.vue';
import { Get } from '@/Api/index.js';
export default {
    components: {
        CardPortofolio
    },
    // props: ['data'],
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
        },
    },
    async mounted() {
        // api untuk portofolio
        const response = await Get('portfolio');
        this.DataPortfolio = response.data.data;
        const responseCategories = await Get('categories');
        this.DataCategories = responseCategories.data;
        // console.log(this.DataCategories);
    } // async mounted() {
    //     const response = await Get('http://localhost:9000/api/portfolio');
    //     this.data = response.data.data;
    // }
}
</script>
<style >
.category {
    margin: 100px 0 35px 40px;
    display: flex;
    flex-wrap: wrap;
}

.category span {
    background-color: #bdcdff;
    padding: 10px 15px;
    font-weight: 500;
    border-radius: 20px;
    margin: 5px;
    cursor: pointer;
}

.portofolio {
    margin-top: 10px;

}

.portofolio h3 {
    margin-top: 10px;
    font-family: 'Raleway', sans-serif;
    font-weight: 900;
    font-size: 30px;
    line-height: 35px;
    color: #042181;
    margin-bottom: 15px;
    text-align: center;
}

.portofolio p {
    font-weight: 900;
    font-size: 14px;
    line-height: 20px;
    color: #4F556A;
    max-width: 680px;
    margin: auto;
    margin-top: 14px;
    margin-bottom: 25px;

}

.portofolio p span {
    color: gray;
}

.row-portofolio {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    grid-gap: 10px;
}


@media screen and (max-width: 600px) {
    .row-portofolio {
        display: grid;
        grid-template-columns: repeat(1, 1fr);
        grid-gap: 10px;
    }
}
</style>