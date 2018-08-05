<template>
    <div class="content">
        <div class="list" v-for="item in items">
            <h4>{{ item.name }}</h4>
            <h5>{{ item.depart.name }}</h5>
            <h6>工作职责：</h6>
            <div class="ds" v-html="item.duty"></div>
            <h6>任职要求：</h6>
            <div class="ds" v-html="item.requirements"></div>
        </div>
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
        props: ['jobs'],
        computed: {
            items() {
                return JSON.parse(this.jobs).data;
            }
        }
    }
</script>