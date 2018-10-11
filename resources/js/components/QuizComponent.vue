<template>
  <div class="exam">
    <paginate
    v-model="page"
    :pageCount="pages"
    :clickHandler="openPage"
    :prevText="'Prev'"
    :nextText="'Next'"
    :containerClass="'pagination'"
    :page-class="'page-item'"
    :page-link-class="'page-link'"
    :prev-link-class="'page-link'"
    :next-link-class="'page-link'">
  </paginate>
    <form>
        <keep-alive>
          <div class="jumbotron">
            <!-- <component :is="quizComponent.component" :name="quizComponent.name" v-bind:question="quizComponent.question"></component> -->
            <h5>{{ question.text }}</h5>
            <answer-component
              v-model="answered"
              v-bind:answers="question.answers"
              v-bind:question="question.id"
            >
            </answer-component>
          </div>
        </keep-alive>
        <!-- <pagination-component
        v-bind:pages="pages">
        </pagination-component> -->
        <input class="btn btn-primary" type="button" @click="formSubmit" value="Ответить">
    </form>


    </div>
</template>


<script>
    export default {
      data () {
        return {
          page: 1,
          answered: null
        }
      },
      props: {
        questions: {
          type: Array
        },
        startPage:{
          type: Number,
          default: 0,
        },
        action:{}
      },
      computed: {
        pages: function() {
          return this.questions.length
        },
        question: function() {
          return this.questions[this.page-1]
        },
        // quizComponent: function() {
        //     return {
        //         component: 'quiz-component',
        //         name: 'quiz-component-'+this.current,
        //         id: this.current,
        //         question: this.questions[this.current]
        //     }
        // },
      },
      methods: {
        openPage(page) {
          console.log(page);
        },
        // answered: function(e){
        //   console.log(e);
        // },
        formSubmit: function() {
          this.$http.post(this.action, {"answers":this.answered})
          .then((response) => {
            // console.log(response.body);
            // window.location = response.url;
            document.write(response.body)
          })
        },
      }
    }
</script>
