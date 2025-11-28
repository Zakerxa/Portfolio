require('bootstrap')
import { createApp } from 'vue';
import App from "./App.vue";
// import Router
import router from './router';
// import Authorization api
import authorize from './authorize';
// import Store Vuex
import store from './store';
//  import Ckeditor
import CKEditor from '@ckeditor/ckeditor5-vue';
/* import the fontawesome core */
import { library } from '@fortawesome/fontawesome-svg-core';
/* import font awesome icon component */
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
import Navigation from './components/Navigation.vue';
/* import specific icons */
import { faCode, faBolt, faMailForward, faCircleLeft, faCross, faSignOut, faBell, faBars, faHistory, faCheckCircle, faEye, faEyeSlash, faPersonRunning, faGraduationCap, faIdCardClip, faSearch, faShieldHalved, faMapLocationDot, faEnvelope, faMobileScreen, faDesktop } from '@fortawesome/free-solid-svg-icons';
import { faGithub } from '@fortawesome/free-brands-svg-icons';
/* add icons to the library */
library.add(faCode, faBolt, faMailForward, faCircleLeft, faCross, faSignOut, faBell, faBars, faHistory, faCheckCircle, faEye, faEyeSlash, faGithub, faPersonRunning, faGraduationCap, faIdCardClip, faSearch, faShieldHalved, faMapLocationDot, faEnvelope, faMobileScreen, faDesktop)

// AOS Library
import AOS from 'aos';
import 'aos/dist/aos.css';
AOS.init();



const app = createApp(App).use(CKEditor).use(router).use(store);

// import { createI18n } from 'vue-i18n/dist/vue-i18n.esm-bundler.js';
// import messages from './lang';
// const i18n = createI18n({
//     locale: 'en', // set locale
//     fallbackLocale: 'en', // set fallback locale
//     messages
// });

// app.use(i18n);

app.config.productionTip = false;

app.config.errorHandler = (err) => {
    /* handle error */
    console.log(err);
}

// Create Global Vue Property
const global = app.config.globalProperties;
// Define Global Property
global.csrfToken = document.head.querySelector("[name~=csrf-token][content]").content;
// global.$csrf = $('meta[name="csrf-token"]').attr('content');
global.token = localStorage.getItem('bearer');
global.mail = '';
global.$http = authorize;


app.component('font-awesome-icon', FontAwesomeIcon);
app.component('Navigation', Navigation);
app.mount('#app');

// Array remove Function
Array.prototype.remove = function() {
    var what, a = arguments,
        L = a.length,
        ax;
    while (L && this.length) {
        what = a[--L];
        while ((ax = this.indexOf(what)) !== -1) {
            this.splice(ax, 1);
        }
    }
    return this;
}