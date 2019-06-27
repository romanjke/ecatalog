
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

// window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Vue.component('example-component', require('./components/ExampleComponent.vue'));
//
// const app = new Vue({
//     el: '#app'
// });

$('.select2').each(function () {
    let el = $(this);
    let api_url = el.data('api-url');
    let text_field = el.data('text-field');
    let id_field = el.data('id-field');

    axios.get(api_url).then(function (response) {
        let data = _.map(response.data, function (o) {
            return {id: o[id_field], text: o[text_field]}
        });

        el.select2({
            theme: "bootstrap",
            data: data
        });
    });
});
