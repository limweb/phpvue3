import { createRouter, createWebHistory } from 'vue-router'

import Foo from  '../pages/Foo.js';
import Bar from  '../pages/Bar.js';
import Home from '../pages/Home.js';
import Profile from '../pages/Profile.js';

export default createRouter({
    history: createWebHistory(),
    routes: [
        {path:'/'    ,name:'Home',component: Home},
        {path:'/home',name:'Home',component: Home},
        {path:'/foo',name:'Foo',component: Foo },
        {path:'/foo/:id',name:'Fooinfo',component: Foo },
        {path:'/bar',name:'Bar',component: Bar},
        {path:'/profile',name:'Profile',component: Profile },
    ]
});
