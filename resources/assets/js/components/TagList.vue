<template>
    <div class="link">
        <a :href="'/about/join?tag=' + item.id" :title="item.name" class="cur" v-for="item in items" v-if="cur == item.id">{{ item.name }}</a>
        <a :href="'/about/join?tag=' + item.id" :title="item.name" v-else>{{ item.name }}</a>
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
        props: ['tags', 'cur'],
        computed: {
            items() {
                return JSON.parse(this.tags);
            }
        }
    }
</script>