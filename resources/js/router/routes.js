function page (path) {
  return () => import(/* webpackChunkName: '' */ `~/pages/${path}`).then(m => m.default || m)
}

export default [
  { path: '*', name: '404', component: page('errors/404.vue') },
  { path: '/', name: 'home', component: page('home.vue') },
  { path: '/about', name: 'about', component: page('about.vue') },
  { path: '/service', name: 'service', component: page('service.vue') },
  { path: '/administration', name: 'amministrazione', component: page('amministrazione.vue') },
  { path: '/real-estate', name: 'real-estate', component: page('real-estate.vue') },
  { path: '/real-estate/:id', name: 'real-estate-search', component: page('real-estate-search.vue') },
  { path: '/contact', name: 'contact', component: page('contact.vue') },
]
