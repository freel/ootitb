<template>
  <div class="col-auto my-1">
    <div
      v-for="answer in this.answers"
      :key="answer.id">
        <div class="alert alert-dark">
          <div class="custom-control custom-checkbox mr-sm-2">
            <input type="checkbox" class="custom-control-input" v-model="checked" @change="change" v-bind:value="collect(answer.id)" v-bind:id="'checkbox_' + answer.id">
            <label type="text" class="custom-control-label" v-bind:for="'checkbox_' + answer.id">{{ answer.text }}</label>
          </div>
        </div>
    </div>
  </div>
</template>


<script>
    export default {
        props: ["answers", "question"],
        data (){
          return{
            checked: [],
          }
        },
        methods: {
          change: function(){
            this.$emit('input', this.checked);
          },
          collect(id){
            return{ [this.question]: id}
          }
        },
        computed:{
        }
    }
</script>
