require('bootstrap')

import { createApp } from 'vue';
import App from "./App.vue";
import router from './router';

/* import the fontawesome core */
import { library } from '@fortawesome/fontawesome-svg-core'

/* import font awesome icon component */
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

/* import specific icons */
import { faEnvelope } from '@fortawesome/free-solid-svg-icons';
import { faMobileScreen } from '@fortawesome/free-solid-svg-icons';
import { faDesktop } from '@fortawesome/free-solid-svg-icons';
import { faMapLocationDot } from '@fortawesome/free-solid-svg-icons';
import { faShieldHalved } from '@fortawesome/free-solid-svg-icons';
import { faSearch } from '@fortawesome/free-solid-svg-icons';
import { faIdCardClip } from '@fortawesome/free-solid-svg-icons';
import { faGraduationCap } from '@fortawesome/free-solid-svg-icons';
import { faPersonRunning } from '@fortawesome/free-solid-svg-icons';
import { faGithub } from '@fortawesome/free-brands-svg-icons';
import { faEye } from '@fortawesome/free-solid-svg-icons';
import { faEyeSlash } from '@fortawesome/free-solid-svg-icons';
import { faCheckCircle } from '@fortawesome/free-solid-svg-icons';
import { faHistory } from '@fortawesome/free-solid-svg-icons';

/* add icons to the library */
library.add(faHistory, faCheckCircle, faEye, faEyeSlash, faGithub, faPersonRunning, faGraduationCap, faIdCardClip, faSearch, faShieldHalved, faMapLocationDot, faEnvelope, faMobileScreen, faDesktop)

// AOS Library
import AOS from 'aos';
import 'aos/dist/aos.css';
AOS.init();

const app = createApp(App).use(router);
app.component('font-awesome-icon', FontAwesomeIcon);
app.mount('#app');