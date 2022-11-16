import Homepage from '../src/components/Homepage.vue';
import Investree from '../src/components/Investree.vue';
import Post from '../src/components/Post.vue';
import Create from '../src/components/Create.vue';


const routes = [
    {
        path: "/",
        name: "Homepage",
        component: Homepage,
      },
    {
        path: "/Post",
        name: "Post",
        component: Post,
      },
    {
        path: "/Investree",
        name: "Investree",
        component: Investree,
      },
    {
        path: "/Create",
        name: "Create",
        component: Create,
      },
]

export default routes;
