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
import { faMobileAndroid } from '@fortawesome/free-solid-svg-icons';
import { faMapLocationDot } from '@fortawesome/free-solid-svg-icons';
import { faShieldHalved } from '@fortawesome/free-solid-svg-icons';
import { faSearch } from '@fortawesome/free-solid-svg-icons';

/* add icons to the library */
library.add(faSearch, faShieldHalved, faMapLocationDot, faEnvelope, faMobileScreen, faMobileAndroid)



const app = createApp(App).use(router);
app.component('font-awesome-icon', FontAwesomeIcon);
app.mount('#app');