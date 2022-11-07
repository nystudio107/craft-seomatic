<template>
    <div class="filter-bar">
        <div class="ui form">
            <div class="inline field">
                <label class="text-gray-600">Search for:</label>
                <input type="text" v-model="filterText" class="text nicetext" @keyup="doFilter" placeholder="">
                <button class="btn delete icon" @click="resetFilter">Reset</button>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data () {
            return {
                filterText: '',
            }
        },
        methods: {
            doFilter () {
                this.$events.fire('filter-set', this.filterText);
            },
            resetFilter () {
                this.filterText = '';
                this.$events.fire('filter-reset');
            }
        }
    }
</script>
