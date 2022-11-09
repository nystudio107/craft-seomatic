<!-- Vue SFC -->
<template>
  <div class="field">
    <div class="py-3">
      <treeselect
        ref="treeselect"
        v-model="value"
        :multiple="false"
        :flat="true"
        :default-expand-level="0"
        :options="options"
        :disabled="disabled"
      />
    </div>
    <div
      v-if="schemaName !== null"
      class="heading"
    >
      <div class="instructions">
        <p>
          Robots
        </p>
      </div>
    </div>
  </div>
</template>

<script>
import Treeselect from '@riophae/vue-treeselect'
import '@riophae/vue-treeselect/dist/vue-treeselect.css'

export default {
  // register the component
  components: {Treeselect},
  props: {
    entity: {type: String, default: null},
    disabled: {type: Boolean, default: false}
  },
  data() {
    return {
      // define the default value
      value: null,
      // define options
      options: [],
    }
  },
  mounted() {
    this.$refs.treeselect.$on('input', (value, instance) => {
      console.log(value);
    });
  },
}
</script>
