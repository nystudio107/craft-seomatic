<!-- Vue SFC -->
<template>
  <div class="field">
    <div class="py-3">
      <treeselect
        ref="robotsselect"
        v-model="value"
        :multiple=true
        :flat="true"
        :default-expand-level=0
        :options="options"
        :disabled="disabled"
      />
    </div>
    <div
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
      options: [
        {id: 'all', label: 'all'},
        {id: 'noindex', label: 'noindex'},
        {id: 'nofollow', label: 'nofollow'},
        {id: 'none', label: 'none'},
        {id: 'noarchive', label: 'noarchive'},
        {id: 'nositelinkssearchbox', label: 'nositelinkssearchbox'},
        {id: 'nosnippet', label: 'nosnippet'},
        {id: 'indexifembedded', label: 'indexifembedded'},
      ],
    }
  },
  mounted() {
    this.$refs.robotsselect.$on('input', (value, instance) => {
      console.log(value);
    });
  },
}
</script>
