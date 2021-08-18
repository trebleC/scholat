import { createRouter, createWebHashHistory } from "vue-router";

const routes = [
  {
    path: "/",
    name: "Home",
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: () => import("../views/layout"),
    children: [
      {
        path: '',
        component: () => import("../views/mainContent/Notice"),
      },
      {
        path: 'notice',
        component: () => import("../views/mainContent/Notice"),
      },
      {
        path: 'sorceRule',
        component: () => import("../views/mainContent/SorceRule"),
      },
      {
        path: 'sources',
        component: () => import("../views/mainContent/Sources"),
      },
      {
        path: 'Task',
        component: () => import("../views/mainContent/Task"),
      },
      {
        path: 'exam',
        component: () => import("../views/mainContent/Exam"),
      },
      {
        path: 'discussion',
        component: () => import("../views/mainContent/Discussion"),
      }
    ]
  },
];

const router = createRouter({
  history: createWebHashHistory(),
  routes,
});

export default router;
