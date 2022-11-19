import Homepage from '../src/components/Homepage.vue';
import Company from '../src/components/Company.vue';
import Blog from '../src/components/Blog.vue';

const routes = [{
        path: "/",
        name: "Homepage",
        component: Homepage,
      },
    {
        path: "/Blog",
        name: "Blog",
        component: Blog,
      },
    {
        path: "/Company",
        name: "Company",
        component: Company,
      },
]

export default routes;
