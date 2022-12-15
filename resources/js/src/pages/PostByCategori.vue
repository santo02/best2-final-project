<template>
    <div>
        <NavBar />
        <PostByCategoriVue />
        <footers />
    </div>
</template>

<script>
import PostByCategoriVue from '../components/homepage/PostByCategori.vue';
import NavBar from '../components/public/Navbar.vue'
import Footers from '../components/homepage/Footer.vue'
export default {
    metaInfo: {
        title: 'KMN || View Post by categories',
    },
    components: { NavBar, Footers, PostByCategoriVue },
    name: 'post-by-categori'
}
</script>
