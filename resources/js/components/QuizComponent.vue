<template>
    <div class="jumbotron">
      <h5>{{ text }}</h5>
      <answer-component
        v-for="answer in answers"
        :key="answer.id"
        v-bind:id="answer.id"
        v-bind:text="answer.text"
      >
      </answer-component>

    </div>
</template>


<script>
    export default {
        props: ['text', 'answers']
    }
</script>
