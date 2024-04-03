const Welcome = () => import('./components/Welcome.vue')
const ContactList = () => import('./components/contact/List.vue')
const ContactCreate = () => import('./components/contact/Add.vue')
const ContactEdit = () => import('./components/contact/Edit.vue')

export const routes = [
    {
        name: 'home',
        path: '/',
        component: Welcome
    },
    {
        name: 'contactList',
        path: '/contact',
        component: ContactList
    },
    {
        name: 'contactEdit',
        path: '/contact/:id/edit',
        component: ContactEdit
    },
    {
        name: 'contactAdd',
        path: '/contact/add',
        component: ContactCreate
    }
]