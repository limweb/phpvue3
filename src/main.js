import { createApp,defineComponent,computed   } from 'vue'
import App from './App.js';
const app = createApp(App);

import Home from './pages/Home.js';
import Test from './components/Test.js';
app.component('Test',Test);
app.component('Home',Home);

import router from './router/index.js';
//-- อ่าน link นี้เพื่อประยุกต์ router เพิ่ม ---
// https://github.com/vuejs/rfcs/blob/master/active-rfcs/0037-router-return-guards.md
app.use(router);

import store from './stores/index.js';
app.use(store);

app.mount('#app');

//---add instance to global for test----
window.router = router;
window.app = app;
window.store = store;

//--- Log test ----------
console.log('router--->',router);
console.log('store--->',store);
console.log('app--->',app);
console.log('router-->',router.currentRoute.value);
