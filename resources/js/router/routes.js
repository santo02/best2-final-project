import Registration from '../src/pages/Registration'
import Login from '../src/pages/Login'
import Admin from '../src/pages/Admin'
import User from '../src/pages/User'
import ArticlePage from '../src/pages/Articlepage'
import DetailArticle from '../src/pages/DetailArticlePage'
import HomePage from '../src/pages/Homepage'
import Company from '../src/pages/Company'
import AddBlog from '../src/pages/AddBlog'


const routes = [
  {
    path: '/',
    component: HomePage,
    name: 'home',
  },
  {
    path: "/company",
    component: Company,
    name: 'company',
  },
  {
    path: "/add-blog",
    component: AddBlog,
    name: 'add-blog',
  },
  {
    path: '/:id/article',
    component: ArticlePage,
    name: 'article-page',
  },
  {
    path: '/:id/article/:slug',
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

