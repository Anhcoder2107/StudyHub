
import axios                 from 'axios';
import {createAuth}          from '@websanova/vue-auth';
import driverAuthBearer      from '@websanova/vue-auth/dist/drivers/auth/bearer.esm.js';
import driverHttpAxios       from '@websanova/vue-auth/dist/drivers/http/axios.1.x.esm.js';
import driverRouterVueRouter from '@websanova/vue-auth/dist/drivers/router/vue-router.2.x.esm.js';
import driverOAuth2Google    from '@websanova/vue-auth/dist/drivers/oauth2/google.esm.js';
import driverOAuth2Facebook  from '@websanova/vue-auth/dist/drivers/oauth2/facebook.esm.js';
import router from '../routers/index.js';

driverOAuth2Google.params.client_id = 'google-key';
driverOAuth2Facebook.params.client_id = 'facebook-key';


var auth = createAuth({
    plugins: {
        http: axios,
        router: router
    },
    drivers: {
        http: driverHttpAxios,
        auth: driverAuthBearer,
        router: driverRouterVueRouter,
        oauth2: {
            facebook: driverOAuth2Facebook,
            google: driverOAuth2Google,
        }
    },
    options: {
        rolesKey: 'type',
        notFoundRedirect: {name: 'user-account'},
        fetchData: { url: `profile`, method: 'GET', enabled: true, authType: 'bearer' },
        refreshData: { url: `profile`, method: 'GET', enabled: true, interval: 30, authType: 'bearer' },
        authType: "bearer",
    }
});


export default auth;