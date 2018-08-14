<template>
    <div class="c-update">
        <div class="boxmain clearfix" v-for="item in items">
            <div class="c-update-l">
                <h4 v-if="item.is_today">今日最新</h4>
                <h4 v-else>{{ item.created_at.substring(0, 10) }}</h4>
                <div class="line"></div>
                <dl>
                    <dt><a :href="'/news/' + item.id">{{ item.name }}</a></dt>
                    <div class="line"></div>
                    <dd>{{ item.summary }}</dd>
                </dl>
            </div>
            <div class="c-update-r">
                <img :src="item.cover" :alt="item.name" />
            </div>
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
        props: ['news'],
        computed: {
            items() {
                return JSON.parse(this.news).data;
            }
        }
    }
</script>