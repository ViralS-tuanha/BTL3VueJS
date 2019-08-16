import Product from './components/products/ListProduct'
import Store from './components/stores/ListStore'
import User from './components/users/ListUser'
import Home from './components/Home'
import DetailStore from './components/stores/DetailStore'

export const  routes = [
    {
        path: '/',
        name: 'home',
        component: Home
    },{
        path: '/product',
        name: 'product',
        component: Product,
        meta: {
            auth: false
        }
    },{
        path: '/store',
        name: 'store',
        component: Store,
        meta: {
            auth: false
        }
    },{
        path: '/user',
        name: 'user',
        component: User,
        meta: {
            auth: true
        }
    },
    {
        path: '/store/{id}',
        name: 'detalStore',
        component: DetailStore,
        meta: {
            auth: true
        }
    }
];