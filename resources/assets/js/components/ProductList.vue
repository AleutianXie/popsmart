<template>
<div class="product_list clearfix">
    <ul>
        <li v-for="item in items">
            <a :href="'/product/' + item.id">
                <div class="product_img"><img :src="item.cover"></div>
                <div class="product_titleText">{{ item.name }}</div>
                <div class="product_cont">{{ item.summary }}</div>
                <div class="product_more">了解更多 ></div>
            </a>
        </li>
    </ul>
</div>
</template>

<script>
    export default {
        mounted() {
            // console.log('Component mounted.');
        },
        data() {
            return {
            }
        },
        props: ['products'],
        computed: {
            items() {
                return JSON.parse(this.products).data;
            }
        }
    }
</script>