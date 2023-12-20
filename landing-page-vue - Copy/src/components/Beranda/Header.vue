<template>
    <div class="header-container">
        <div class="header-text">
            <div class="header-title">
                <h1>{{ data.title }}</h1>
            </div>
            <div class="header-description">
                <p>{{ data.description }}</p>
            </div>
        </div>
        <div class="header-image"> 
            <!-- @/assets/img/section_1.jpg -->
            <img :src="data.file" :alt="data.title">
        </div>
    </div>
</template>

<script>
export default {
    props: ['data']
}
</script>

<style>
.header-container {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 20px;
    background-color: #f7f7f7;
}

.header-text {
    color: #333333be;
    flex: 1;
    margin-right: 20px;
}

.title-text {
    font-size: 24px;
    font-weight: bold;
    color: #333;
}

.description-text {
    font-size: 16px;
    color: #666;
}

.header-image {
    flex: 1;
}

.header-img {
    width: 100%;
    max-width: 100%;
    height: 26px;
    border-radius: 10px;
}

@media screen and (max-width: 768px) {
    .header-container {
        flex-direction: column;
        text-align: center;
    }
    
    .header-text {
        margin-right: 0;
        margin-bottom: 20px;
    }

    .title-text {
        font-size: 20px;
    }

    .description-text {
        font-size: 14px;
    }
}
</style>

