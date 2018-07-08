<template>
    <div class="case_list clearfix" id="tab" style="display: block;">
        <ul>
            <li v-for="item in items">
                <a :href="'/case/' + item.id">
                    <div class="case_listImg"><img :src="item.cover" :alt="item.name"></div>
                    <div class="case_listPclink">
                        <div class="case_listPclink_jt"></div>
                        <div class="case_listPclink_title">
                            <div class="gg_title">
                                <h1>{{ item.name }}</h1>
                                <div class="line"></div>
                                <p>{{ item.summary }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="case_listPhtitle">{{ item.name }}</div>
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
        props: ['cases'],
        computed: {
            items() {
                return JSON.parse(this.cases).data;
            }
        }
    }
</script>