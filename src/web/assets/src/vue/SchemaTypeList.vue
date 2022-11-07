<!-- Vue SFC -->
<template>
    <div class="field">
        <div class="py-3">
            <treeselect
                    v-model="value"
                    ref="treeselect"
                    :multiple="false"
                    :flat="false"
                    :default-expand-level="0"
                    :options="options"
                    :disabled="disabled"
            />
        </div>
        <div v-if="schemaName !== null" class="heading">
            <div class="instructions">
                <p>
                    <a :href="'http://schema.org/' + schemaName" rel="noopener" target="_blank">{{ schemaName }} info: </a>
                    {{ schemaDescription }}
                </p>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios'
    import VueAxios from 'vue-axios'
    import Treeselect from '@riophae/vue-treeselect'
    import '@riophae/vue-treeselect/dist/vue-treeselect.css'

    Vue.use(VueAxios, axios);

    export default {
        // register the component
        components: { Treeselect },
        props: {
          entity: {type: String, default: null},
          disabled: {type: Boolean, default: false}
        },
        watch: {
            schemaName: function(value) {
                let action = 'get-type';
                const api = Craft.getActionUrl('seomatic/json-ld/' + action + '?schemaType=' + this.schemaName);
                this.axios.get(api).then((response) => {
                    if (response.data) {
                        if (response.data) {
                            this.schemaDescription = response.data.schemaTypeDescription;
                        }
                    }
                });
            }
        },
        mounted() {
            let action = 'get-type-tree';
            const api = Craft.getActionUrl('seomatic/json-ld/' + action);
            this.value = this.entity;
            this.axios.get(api).then((response) => {
                if (response.data) {
                    this.options = response.data;
                }
            });
            this.$refs.treeselect.$on('input', (value, instance) => {
                if (value === undefined) {
                    this.schemaName = null;
                } else  {
                    let parts = value.split('.');
                    this.schemaName = parts[parts.length - 1];
                }
                $(document).trigger('schema-value-changed', value);
            });
        },
        data() {
            return {
                schemaName: null,
                schemaDescription: null,
                // define the default value
                value: null,
                // define options
                options: [],
            }
        },
    }
</script>
