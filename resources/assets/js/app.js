
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

if (document.getElementById('app')) {
  Vue.component('comments', require('./components/Comments.vue'));
  Vue.component('like', require('./components/Like.vue'));
  Vue.component('subscribe', require('./components/Subscribe.vue'));
  const app = new Vue({
    el: '#app',
    productionTip: false
  });
}