
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
Vue.use(require('vue-resource'));

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

// Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('quiz-component', require('./components/QuizComponent.vue'));
Vue.component('answer-component', require('./components/AnswerComponent.vue'));
// Vue.component('pagination-component', require('./components/PaginationComponent.vue'));
Vue.component('paginate', require('vuejs-paginate'))


const app = new Vue({
    el: '#app'
});
