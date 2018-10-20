<template>
  <div class="exam">
    <div v-if="timer">
      <countdown @countdownend="formSubmit" :time="timer * 60 * 1000">
        <template slot-scope="props">{{ props.minutes }}:{{ props.seconds }}</template>
      </countdown>
    </div>
    <form>
        <keep-alive>
          <div class="jumbotron">
            <h5>{{ question.text }}</h5>
            <answer-component
              v-model="answered"
              v-bind:answers="question.answers"
              v-bind:question="question.id"
            >
            </answer-component>
          </div>
        </keep-alive>
        <paginate
          v-model="page"
          :pageCount="pages"
          :page-range="pages"
          :prevText="'Предыдущий'"
          :nextText="'Следующий'"
          :containerClass="'pagination'"
          :page-class="'page-item'"
          :page-link-class="'page-link'"
          :prev-link-class="'page-link'"
          :hide-prev-next="true"
          :next-link-class="'page-link'">
        </paginate>
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
        action:{},
        timer:{
          default: 30,
        }
      },
      computed: {
        pages: function() {
          return this.questions.length
        },
        question: function() {
          return this.questions[this.page-1]
        },
      },
      methods: {
        formSubmit: function() {
          this.$http.post(this.action, {"answers":this.answered})
          .then((response) => {
            document.write(response.body)
          })
        },
      }
    }
</script>
