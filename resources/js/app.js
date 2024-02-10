/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import './bootstrap';
import { createApp } from 'vue';

/**
 * Next, we will create a fresh Vue application instance. You may then begin
 * registering components with the application instance so they are ready
 * to use in your application's views. An example is included for you.
 */

const app = createApp();

app.component('input-container-component', require('./components/InputContainer.vue').default);
app.component('alert-component', require('./components/Alert.vue').default);
app.component('info-logo-component', require('./components/InfoLogo.vue').default);
app.component('dropdown-component', require('./components/Dropdown.vue').default);
app.component('modal-component', require('./components/Modal.vue').default);

app.component('login-component', require('./components/login/index.vue').default);
app.component('reset-password', require('./components/resetPassword/reset.vue').default);
app.component('user-create', require('./components/users/create.vue').default);
app.component('post-component', require('./components/post/index.vue').default);
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// Object.entries(import.meta.glob('./**/*.vue', { eager: true })).forEach(([path, definition]) => {
//     app.component(path.split('/').pop().replace(/\.\w+$/, ''), definition.default);
// });

/**
 * Finally, we will attach the application instance to a HTML element with
 * an "id" attribute of "app". This element is included with the "auth"
 * scaffolding. Otherwise, you will need to add an element yourself.
 */

app.mount('#app');
