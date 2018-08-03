<template>
    <div class="ColumnOnenav">
        <li class="cur" v-for="item in items" v-if="cur == item.id">
            <a :href="'/service?module=' + item.id">
                <img :src="item.icon" :alt="item.name" style="width: 124px;height: 124px;"/>
                <p>{{ item.name }}</p>
            </a>
        </li>
        <li class="" v-else>
            <a :href="'/service?module=' + item.id">
                <img :src="item.icon" :alt="item.name" style="width: 124px;height: 124px;"/>
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
        props: ['modules', 'cur'],
        computed: {
            items() {
                return JSON.parse(this.modules);
            }
        }
    }
</script>