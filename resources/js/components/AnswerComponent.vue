<template>
  <div class="col-auto my-1">
        <div class="alert alert-dark">
          <div class="custom-control custom-checkbox mr-sm-2">
            <input type="checkbox" class="custom-control-input" name="answers[]" v-bind:value="id" v-bind:id="'checkbox_' + id">
            <label type="text" class="custom-control-label" v-bind:for="'checkbox_' + id">{{ text }}</label>
          </div>

        </div>
  </div>
</template>


<script>
    export default {
        props: ["id", "text"]
    }
</script>
