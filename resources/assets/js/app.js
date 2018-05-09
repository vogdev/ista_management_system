
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

// require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('students', require('./components/students/Students.vue'));
Vue.component('studentmodal', require('./components/students/StudentModal.vue'));
Vue.component('studentsearch', require('./components/students/StudentSearch.vue'));
Vue.component('classrom-students', require('./components/students/ClassromStudents.vue'));

Vue.component('teachers', require('./components/teachers/Teachers.vue'));
Vue.component('teachermodal', require('./components/teachers/TeacherModal.vue'));
Vue.component('teachersearch', require('./components/teachers/TeacherSearch.vue'));

const app = new Vue({
    el: '#app'
});
