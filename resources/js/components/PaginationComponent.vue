<template lang="html">
  <div class="exam">
    <fieldset
    v-for="(question,index) in showQuestions"
    :key="question.id"
    ref="question"
    v-bind:id="index"
    >
      <quiz-component v-bind:text="question.text" v-bind:answers="question.answers" >

      </quiz-component>
    </fieldset>
    <div class="vue-pages">
        <ul role="navigation" class="pagination">
          <li class="page-item"><a href="#" @click="this.current--" rel="prevous" aria-label="&amp;laquo; Previous" class="page-link">‹</a></li>
          <li v-for="(page,index) in questions" class="page-item">
            <a v-if="this.current ===  index+1" href="#"  @click="selectPage(index)" class="page-link">{{ index+1 }}</a>
            <a v-else class="page-link">{{ index+1 }}</a>
          </li>
          <li class="page-item"><a href="#" @click="this.current++" rel="next" aria-label="Next &amp;raquo;" class="page-link">›</a></li>
        </ul>
      </div>
  </div>
</template>

<script>
export default {
  data () {
    return {
      current: this.startPage
    }
  },
  props: {
    questions: {
      type: Array
    },
    startPage:{
      type: Number,
      default: 0,
    }
  },
  methods: {
    selectPage(page){
        this.current = page
    }
  },
  computed: {
    showQuestions: function() {
      return this.questions.filter(function(question, id){
        console.log("q.id " + id)
        console.log("current_in " + this)
        return id === this
      }, this.current)
    },
  },
}

</script>

<style lang="css">
</style>
