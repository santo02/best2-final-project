import Registration from '../src/pages/Registration'
import Login from '../src/pages/Login'
import Admin from '../src/pages/Admin'
import User from '../src/pages/User'
import ArticlePage from '../src/pages/Articlepage'
import DetailArticle from '../src/pages/DetailArticlePage'

const routes = [{
    path: '/',
    component: ArticlePage,
    name: 'article-page',
  },
  {
    path: '/detail',
    component: DetailArticle,
    name: 'detail-article',
  },
  {
    path: '/registrasi',
    component: Registration,
    name: 'registrasi'
  },
  {
    path: '/login',
    component: Login,
    name: 'login'
  },
  {
    path: '/admin',
    component: Admin,
    name: 'admin',
    meta: {
      requiresAuth: true,
      isAdmin: true
    }
  },
  {
    path: '/user',
    component: User,
    name: 'user',
    meta: {
      requiresAuth: true,
      isUser: true
    }
  },


]

export default routes;
