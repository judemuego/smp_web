import { frontend } from './component.js';

export default{
    mode: 'history',
    scrollBehavior() {
        return { x: 0, y: 0 };
    },
    routes: [
        { path: '/',                                    name: 'home',                            component: frontend.home,                            meta: { title: 'Home' }},
        { path: '/services',                            name: 'services',                        component: frontend.services,                        meta: { title: 'Services' }},
        { path: '/projects',                            name: 'projects',                        component: frontend.projects,                        meta: { title: 'Projects' }},
        { path: '/single-project-2',                    name: 'single-project-2',                component: frontend.singleproject2,                  meta: { title: 'Single Project 2' }},
        { path: '/single-project-3',                    name: 'single-project-3',                component: frontend.singleproject3,                  meta: { title: 'Single Project 3' }},
        { path: '/single-project',                      name: 'single-project',                  component: frontend.singleproject,                   meta: { title: 'Single Project' }},
        { path: '/about',                               name: 'about',                           component: frontend.about,                           meta: { title: 'About' }},
        { path: '/contact',                             name: 'contact',                         component: frontend.contact,                         meta: { title: 'Contact' }},

        { path: '/smp/about-company',                   name: 'about-company',                   component: frontend.about,                           meta: { title: 'About Company' }},
        { path: '/smp/certificates',                    name: 'certificates',                    component: frontend.certificates,                    meta: { title: 'Certificates' }},
        { path: '/smp/core-values',                     name: 'core-values',                     component: frontend.corevalues,                      meta: { title: 'Core Values' }},
        { path: '/smp/leadership',                      name: 'leadership',                      component: frontend.leadership,                      meta: { title: 'Leadership' }},
        { path: '/smp/our-history',                     name: 'our-history',                     component: frontend.ourhistory,                      meta: { title: 'Our History' }},
        { path: '/smp/our-logo',                        name: 'our-logo',                        component: frontend.ourlogo,                         meta: { title: 'Our Logo' }},



    ]
}