<template>
    <div>
        <a :href="rowData.contentSeoUrl" class="go" :title="linkTitle">{{ rowData.sourceName }}</a>
    </div>
</template>

<script>
    export default {
        props: {
            rowData: {
                type: Object,
                required: true
            },
            rowIndex: {
                type: Number
            }
        },
        computed: {
            linkTitle: function() {
                let title = '';

                title += this.rowData.sourceName;

                return title;
            }
        }
    }
</script>
