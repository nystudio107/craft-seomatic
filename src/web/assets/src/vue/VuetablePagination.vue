<template>
  <div
    v-show="tablePagination && tablePagination.last_page > 1"
    :class="css.wrapperClass"
  >
    <a
      :class="['btn-nav', css.linkClass, isOnFirstPage ? css.disabledClass : '']"
      @click="loadPage(1)"
    >
      <i
        v-if="css.icons.first != ''"
        :class="[css.icons.first]"
      />
      <span v-else>&laquo;</span>
    </a>
    <a
      :class="['btn-nav', css.linkClass, isOnFirstPage ? css.disabledClass : '']"
      @click="loadPage('prev')"
    >
      <i
        v-if="css.icons.next != ''"
        :class="[css.icons.prev]"
      />
      <span v-else>&nbsp;&lsaquo;</span>
    </a>
    <template v-if="notEnoughPages">
      <template v-for="n in totalPage">
        <a
          :key="n"
          :class="[css.pageClass, isCurrentPage(n) ? css.activeClass : '']"
          @click="loadPage(n)"
          v-html="n"
        />
      </template>
    </template>
    <template v-else>
      <template v-for="n in windowSize">
        <a
          :key="n"
          :class="[css.pageClass, isCurrentPage(windowStart+n-1) ? css.activeClass : '']"
          @click="loadPage(windowStart+n-1)"
          v-html="windowStart+n-1"
        />
      </template>
    </template>
    <a
      :class="['btn-nav', css.linkClass, isOnLastPage ? css.disabledClass : '']"
      @click="loadPage('next')"
    >
      <i
        v-if="css.icons.next != ''"
        :class="[css.icons.next]"
      />
      <span v-else>&rsaquo;&nbsp;</span>
    </a>
    <a
      :class="['btn-nav', css.linkClass, isOnLastPage ? css.disabledClass : '']"
      @click="loadPage(totalPage)"
    >
      <i
        v-if="css.icons.last != ''"
        :class="[css.icons.last]"
      />
      <span v-else>&raquo;</span>
    </a>
  </div>
</template>

<script>
import PaginationMixin from '@/vue/VuetablePaginationMixin.vue'

export default {
  mixins: [PaginationMixin],
}
</script>
