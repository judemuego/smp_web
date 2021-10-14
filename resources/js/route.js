import { frontend } from './component.js';

export default{
    mode: 'history',
    scrollBehavior() {
        return { x: 0, y: 0 };
    },
    routes: [
        { path: '/',                                    name: 'home',                            component: frontend.home,                            meta: { title: 'Home Page' }},
    ]
}