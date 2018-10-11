<template lang="html">
    <div class="vue-pages">
        <ul role="navigation" class="pagination">
          <li class="page-item">
            <a href="#" @click="prevousPage()" rel="prevous" aria-label="&amp;laquo; Previous" class="page-link">Назад</a>
          </li>
          <li v-for="page in pages" class="page-item">
            <a href="#"  @click="selectPage(page)" class="page-link">{{ page }}</a>
          </li>
          <li class="page-item">
            <a href="#" @click="nextPage()" rel="next" aria-label="Next &amp;raquo;" class="page-link">Далее</a>
          </li>
        </ul>
    </div>
</template>

<script>
export default {
  data () {
    return {
      current: 0
    }
  },
  props: {
    pages:{
      type: Number,
      default: 0,
    },
  },
  methods: {
    selectPage(index){
        this.current = index
    },
    nextPage(){
        this.current < this.pages ? this.current++ : this.current = pages
    },
    prevousPage(){
        this.current > 1 ? this.current-- : this.current = 1
    }
  },

}

</script>
