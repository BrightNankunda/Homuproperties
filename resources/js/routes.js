import store  from './store/index';
import Login from './components/Login.vue';
import Register from './components/Register.vue';
import Upload from './components/Upload.vue';
import Dashboard from './components/Dashboard.vue';
import Uploads from './components/Uploads.vue';
import Logout from './components/Logout.vue';
import NotFound from './components/NotFound.vue';
import Read from './components/Read.vue';
import Aupload from './components/Aupload.vue';
import Pay from './components/Pay.vue';
import officialpost from './components/officialpost.vue';
import Createofficialpost from './components/Createofficialpost.vue';
import Client from './components/Client.vue';
import Clients from './components/Clients.vue';
import NewProfile from './components/NewProfile.vue';
import Property from './components/Property.vue';
import Boss from './components/Boss.vue';
import Arcades from './components/Masters/Arcades.vue';
import Malls from './components/Masters/Malls.vue';
import Rentals from './components/Masters/Rentals.vue';
import Officespace from './components/Masters/Officespace.vue';
import Apartments from './components/Masters/Apartments.vue';
import Hostel from './components/Masters/Hostel.vue';
import Master from './components/Master.vue';
import Mid from './components/Mid.vue';
import Details from './components/Details.vue';
import Payments from './components/Payments.vue';
import Admin from './components/Admin.vue';
import BossHome from './components/BossHome.vue';
import AfterSignup from './components/AfterSignup.vue';
import Advert from './components/Advert.vue';
import Adverts from './components/Adverts.vue';
import AdvertUpdate from './components/AdvertUpdate.vue';
import UpdateClient from './components/SubComponents/UpdateClient.vue';
import ViewClient from './components/SubComponents/ViewClient.vue';
import UpdateProfile from './components/SubComponents/UpdateProfile.vue';
import { Store } from 'vuex';


export default {

    routes: [
        {
            path: '/',
            component: Dashboard,
            
        },
        {
            path: '/mid',
            component: Mid
        },
        
        {
            path: '/hostel',
            component: Hostel
        },
        {
            path: '/uploads',
            component: Uploads
        },
        {
            path: '/login',
            component: Login,
            meta: {
                requiresVisitor: true
            }
        },
        {
            path: '/register',
            component: Register,
            meta: {
                requiresVisitor: true
            }
        },
        {
            path: '/dashboard',
            component: Dashboard,
            meta: {
                requiresAuth: true
            }
        },
        {
            path: '/read',
            component: Read
        },
        { 
            path: '/boss', 
            component: Boss,
            meta: {
                requiresAuth: true,
            },
            children: [
                {
                    path: 'home',
                    component: BossHome
                },
                {
                    path: 'clients',
                    component: Clients,
                    
                },
                {
                    path:'payment',
                    component: Payments,
                },
                
                {
                    path: 'client',
                    component: Client,
                },
                {
                    path: 'property',
                    component: Property
                },
                {
                    path: 'updateClient/:id',
                    component: UpdateClient
                },
                {
                    path: 'clients/:id',
                    component: ViewClient
                }
            ]
        },
        {
            path: '/createAdvert',
            component: Advert,
            meta: {
                requiresAuth: true
            }
        },
        {
            path: '/adverts',
            component: Adverts,
            meta: {
                requiresAuth: true
            }
        },
        {
            path: '/adverts/:id',
            component: AdvertUpdate,
            meta: {
                requiresAuth: true
            }
        },
        {
            path: '/Admin',
            component: Admin,
            meta: {
                requiresAuth: true
            },
            // beforeEnter(to, from, next) {
            //     if(store.state.isAdmin && from.path === '/') {
            //         next()
            //     } else {
            //         next({path: '/finish'})
            //     }
            // },
            children: [
                // {
                //     path: 'allAdverts',
                // },
                // {
                //     path: 'createAdvert',
                //     component: Advert
                // },
                // {
                //     path: 'oneAdvert/:id'
                // }
            ]
        },
        {
            path: '/finish',
            component: AfterSignup,
            meta: {
                requiresAuth: true
            }
        },
        {
            path: '/apartments',
            component: Apartments,
            beforeEnter: (to, from, next) => {
                console.log(`${from.path} to ${to.path}?`);
                next();
            }
        },
        { 
            path: '/details/:id', 
            component: Details,
            
        },
        { 
            path: '/rentals', 
            component: Rentals,
            
        },
        { 
            path: '/officespace', 
            component: Officespace,
    
        },
        { 
            path: '/malls', 
            component: Malls,
            
        },
        { 
            path: '/arcades', 
            component: Arcades,
        
        },
        { 
            path: '/hostels', 
            component: Hostel,
            
        },
        {
            path: '/Aupload',
            component: Aupload
        },
        {
            path: '/pay',
            component: Pay,
            meta: {
                requiresAuth: true
            }
        },
        {
            path: '/upload',
            component: Upload,
            meta: {
                requiresAuth: true
            }
        },
        {
            path: '/add',
            component: Createofficialpost,
            meta: {
                requiresAuth: true
            }
        },
        {
            path: '/profile',
            component: NewProfile,
            meta: {
                requiresAuth: true
            },
            
        },
                {
                    path: '/profile/update',
                    component: UpdateProfile,
                }
            ,        
        {
            path: '/logout',
            component: Logout,
            meta: {
                requiresAuth: true
            }
        },
        {
            path: '/NotFound',
            component: NotFound
        } 
        
    ],
    scrollBehavior (to, from, savedPosition) {
        return { x: 0, y: 0 }
    }
}


