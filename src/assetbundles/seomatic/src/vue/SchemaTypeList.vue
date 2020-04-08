<!-- Vue SFC -->
<template>
    <div>
        <treeselect
                v-model="value"
                ref="treeselect"
                name="schemaType"
                :multiple="false"
                :flat="false"
                :default-expand-level="0"
                :options="options"
        />
    </div>
</template>

<script>
    import Vue from 'vue'
    import axios from 'axios'
    import VueAxios from 'vue-axios'
    import Treeselect from '@riophae/vue-treeselect'
    import '@riophae/vue-treeselect/dist/vue-treeselect.css'

    Vue.use(VueAxios, axios);

    let action = 'get-type-tree';
    const api = Craft.getActionUrl('seomatic/json-ld/' + action);
    export default {
        // register the component
        components: { Treeselect },
        props: {
            entity: {type: String, default: null},
        },
        mounted() {
            this.axios.get(api).then((response) => {
                if (response.data) {
                    this.options = response.data;
                    this.value = this.entity;
                }
            });
            console.log(this.$refs);
            this.$refs.treeselect.$on('input', (value, instance) => {
                let collection = document.getElementsByClassName('vue-treeselect__input');
                for (let item of collection) {
                    //console.log(item);
                    //item.value = value;
                    $(document).trigger('schema-value-changed', value);
                }
            });
        },
        data() {
            return {
                // define the default value
                value: null,
                // define options
                options: [],
            }
        },
    }
</script>
