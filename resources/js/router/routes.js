import Home from '../src/pages/Home.vue';
import MarketAdd from '../src/pages/marketplace/pages/router/Add.vue';
import Marketplace from '../src/pages/marketplace/pages/Marketplace.vue';
import MarketAll from '../src/pages/marketplace/pages/router/All.vue';
import Marketdetail from '../src/pages/marketplace/pages/router/Detail.vue';
import MarketEdit from '../src/pages/marketplace/pages/router/EditPage.vue';
import ConfirmEdit from '../src/pages/marketplace/pages/router/ConfirmEdit.vue';

const routes = [
    {
        path: '/',
        component: Home,
        name: 'home'
    },
    {
        path: '/marketplace/detail/:id',
        component: Marketdetail,
        name: 'marketdetail'
    },
    {
        path: '/marketplace',
        component: Marketplace,
        name: 'marketplace',
        children: [
            {
                path: 'all',
                component: MarketAll,
                name: 'marketall'
            },
            {
                path: 'add',
                component: MarketAdd,
                name: 'marketadd'
            },
            {
                path: 'edit',
                component: MarketEdit,
                name: 'marketedit'
            },
            {
                path: 'confirm-edit/:id',
                component: ConfirmEdit,
                name: 'confirmedit'
            }
        ]
    }
]

export default routes;
