import { createRouter, createWebHistory } from 'vue-router';
import Dashboard from '../Pages/Dashboard.vue';
import BlogIndex from '../Pages/Admin/Pages/Blog/Index.vue';
import BlogCreate from '../Pages/Admin/Pages/Blog/Create.vue';
import BlogEdit from '../Pages/Admin/Pages/Blog/Edit.vue';
import CategoryCourseIndex from '../Pages/Admin/Pages/CategoryCourse/Index.vue';
import ClassIndex from '../Pages/Admin/Pages/Class/Index.vue';
import ClassCreate from '../Pages/Admin/Pages/Class/Create.vue';
import ClassEdit from '../Pages/Admin/Pages/Class/Edit.vue';
import CourseIndex from '../Pages/Admin/Pages/Course/Index.vue';
// import ExaminationIndex from '../Pages/Admin/Pages/Examination/Edit.vue';
// import ExerciseIndex from '../Pages/Admin/Pages/Exercise/Index.vue';
import PermissionIndex from '../Pages/Admin/Pages/Permission/Index.vue';
import RoleIndex from '../Pages/Admin/Pages/Role/Index.vue';
import UserIndex from '../Pages/Admin/Pages/User/Index.vue';
import Settings from '../Pages/Admin/Settings.vue';
import Tables from '../Pages/Admin/Tables.vue';
import Maps from '../Pages/Admin/Maps.vue';
// import Login from '../Pages/Admin/Pages/Auth/Login.vue';
// import Register from '../Pages/Admin/Pages/Auth/Register.vue';
// import Landing from '../Pages/Admin/Pages/Landing.vue';
// import Profile from '../Pages/Admin/Pages/Profile.vue';

const routes = [
  { path: '/admin/dashboard', component: Dashboard },
  { path: '/admin/blogs', component: BlogIndex },
  { path: '/admin/blogs/create', component: BlogCreate },
  { path: '/admin/blogs/:id/edit', component: BlogEdit },
  { path: '/admin/category-courses', component: CategoryCourseIndex },
  { path: '/admin/classes', component: ClassIndex },
  { path: '/admin/classes/create', component: ClassCreate },
  { path: '/admin/classes/:id/edit', component: ClassEdit },
  { path: '/admin/courses', component: CourseIndex },
//   { path: '/admin/examinations', component: ExaminationIndex },
//   { path: '/admin/exercises', component: ExerciseIndex },
  { path: '/admin/permissions', component: PermissionIndex },
  { path: '/admin/roles', component: RoleIndex },
  { path: '/admin/users', component: UserIndex },
//   { path: '/admin/settings', component: Settings },
//   { path: '/admin/tables', component: Tables },
//   { path: '/admin/maps', component: Maps },
//   { path: '/auth/login', component: Login },
//   { path: '/auth/register', component: Register },
//   { path: '/landing', component: Landing },
//   { path: '/profile', component: Profile }
];

const router = createRouter({
  history: createWebHistory(),
  routes
});

export default router;
