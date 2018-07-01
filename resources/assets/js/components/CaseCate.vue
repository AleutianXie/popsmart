<template>
    <div class="ColumnOnenav">
        <li class="cur" v-for="item in items" v-if="cur == item.id">
            <a :href="'/case?cate=' + item.id">
                <img :src="item.icon" :alt="item.name" />
                <p>{{ item.name }}</p>
            </a>
        </li>
        <li class="" v-else>
            <a :href="'/case?cate=' + item.id">
                <img :src="item.icon" :alt="item.name" />
                <p>{{ item.name }}</p>
            </a>
        </li>
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
        props: ['cates', 'cur'],
        computed: {
            items() {
                return JSON.parse(this.cates);
            }
        }
    }
</script>