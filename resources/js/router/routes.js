import Registration from '../src/pages/Registration'
import Login from '../src/pages/Login'
import Admin from '../src/pages/Admin'
import User from '../src/pages/User'
import ArticlePage from '../src/pages/Articlepage'
import DetailArticle from '../src/pages/DetailArticlePage'
import HomePage from '../src/pages/Homepage'
import Company from '../src/pages/Company'
import AddCompany from '../src/pages/AddCompany'
import ListCompany from '../src/pages/ListCompany'
import UpdateCompany from '../src/pages/UpdateCompany'
import AddBlog from '../src/pages/AddBlog'
import ListBlog from '../src/pages/ListBlog'
import UpdateBlog from '../src/pages/UpdateBlog'
import Upload from '../src/pages/Upload'
import AddKategori from '../src/pages/AddKategori'
import Categories from '../src/pages/categories'
import CategoriesAdmin from '../src/pages/CategoriesAdmin'
import EditProfile from '../src/pages/EditProfile'
import Name from '../src/components/profile/router/Name'
import UserName from '../src/components/profile/router/UserName'
import Photo from '../src/components/profile/router/Profile'


const routes = [{
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
    meta: {
      requiresAuth: true,
    }
  },
  {
    path: "/my-blog",
    component: ListBlog,
    name: '/my-blog',
  },
  {
    path: "/add-company",
    component: AddCompany,
    name: 'add-company',
    requiresAuth: true,
  },
  {
    path: "/my-company",
    component: ListCompany,
    name: '/my-company',
  },
  {
    path: "/profile",
    component: EditProfile,
    name: 'profile-main',
    meta: {
      requiresAuth: true
    },
    children: [
      {
          path: 'name',
          component: Name,
          name: 'profile-name'
      },
      {
        path: 'username',
        component: UserName,
        name: 'profile-username'
      },
      {
        path: 'photo',
        component: Photo,
        name: 'profile-photo'
      },
    ]
  },
  {
    path: "/categories",
    component: Categories,
    name: 'categories'
  },
  {
    path: "/categories-admin",
    component: CategoriesAdmin,
    name: 'categories-admin',
    meta: {
      requiresAuth: true,
      isAdmin: true
    }
  },
  {
    path: "/add-categories",
    component: AddKategori,
    name: 'add-categories',
    meta: {
      requiresAuth: true,
      isAdmin: true
    }
  },
  {
    path: "/upload-image",
    component: Upload,
    name: 'upload',
    meta: {
      requiresAuth: true,
      isUser: true
    }
  },
  {
    path: "/edit/:id",
    component: UpdateBlog,
    name: 'update-blog',
    meta: {
      requiresAuth: true
    }
  },
  {
    path: "/edit-company/:id",
    component: UpdateCompany,
    name: 'update-company',
    meta: {
      requiresAuth: true
    }
  },
  {
    path: '/:id/article',
    component: ArticlePage,
    name: 'article-page'
  },
  {
    path: '/:id/article/:slug',
    component: DetailArticle,
    name: 'detail-article'
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
