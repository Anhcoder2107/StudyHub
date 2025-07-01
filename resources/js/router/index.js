
import { createRouter, createWebHistory } from "vue-router";
import Dashboard from "../Pages/Dashboard.vue";
import Settings from "../Pages/admin/Settings.vue";
import CreatePermission from "../Pages/admin/Pages/Permission/Create.vue";
import Tables from "../Pages/admin/Tables.vue";
import Maps from "../Pages/admin/Maps.vue";
import Landing from "../Pages/Landing.vue";
import Profile from "../Pages/Profile.vue";
import Index from "../Pages/Index.vue";
import Login from "../Pages/auth/Login.vue";
import Register from "../Pages/auth/Register.vue";

const routes = [
  {
    path: "/admin",
    redirect: "/admin/dashboard",
    children: [
      {
        path: "/admin/dashboard",
        component: Dashboard,
      },
      {
        path: "/admin/settings",
        component: Settings,
      },
      {
        path: "/admin/tables",
        component: Tables,
      },
      {
        path: "/admin/maps",
        component: Maps,
      },
      {
        path: "/admin/permissions",
        name: "permissions.index",
      },
      {
        path: "/admin/permissions/create",
        component: CreatePermission,

      }
    ],
  },
  {
    path: "/auth",
    redirect: "/auth/login",
    children: [
      {
        path: "/auth/login",
        component: Login,
      },
      {
        path: "/auth/register",
        component: Register,
      },
    ],
  },
  {
    path: "/landing",
    component: Landing,
  },
  {
    path: "/profile",
    component: Profile,
  },
  {
    path: "/",
    component: Index,
  },
  { path: "/:pathMatch(.*)*", redirect: "/" },
];

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes,
});

export default router;
