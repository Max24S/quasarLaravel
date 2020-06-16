
const routes = [
  {
    path: '/',
    component: () => import('layouts/MainLayout.vue'),
    children: [
      { path: '', component: () => import('pages/Index.vue'), name: 'main' },
      { path: '', component: () => import('pages/Index.vue'), name: 'main' },
    ]
  },
  {
    path: '/add',
    component: () => import('layouts/addLayout.vue'),
    children: [
      { path: '/', component: () => import('pages/Create.vue') }
    ],
    name: 'addform'
  }
]

// Always leave this as last one
if (process.env.MODE !== 'ssr') {
  routes.push({
    path: '*',
    component: () => import('pages/Error404.vue')
  })
}

export default routes
