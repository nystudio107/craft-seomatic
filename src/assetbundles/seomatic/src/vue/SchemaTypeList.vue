<!-- Vue SFC -->
<template>
    <div>
        <treeselect
                v-model="value"
                :multiple="false"
                :flat="true"
                :default-expand-level="1"
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

    let action = 'get-single-type-menu';
    let path = '';
    const api = Craft.getActionUrl('seomatic/json-ld/' + action + '?path=' + path);
    export default {
        // register the component
        components: { Treeselect },
        mounted() {
            this.axios.get(api).then((response) => {
                console.log(response.data);
                this.options = Object.entries(response.data).map(([key, value]) => ({
                    'id': key,
                    'label': value
                }));
                console.log(this.options);

            });
        },
        data() {
            return {
                // define the default value
                value: null,
                // define options
                options: [ {
                    id: 'a',
                    label: 'a',
                    children: [ {
                        id: 'aa',
                        label: 'aa',
                    }, {
                        id: 'ab',
                        label: 'ab',
                    } ],
                }, {
                    id: 'b',
                    label: 'b',
                }, {
                    id: 'c',
                    label: 'c',
                } ],
            }
        },
    }
</script>
