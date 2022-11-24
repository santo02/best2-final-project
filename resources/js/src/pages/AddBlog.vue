<template>
    <div>
        <NavBar/>
        <Blog/>
        <footers/>
    </div>
</template>

<script>
    import Blog from '../components/homepage/Blog.vue'
    import NavBar from '../components/public/Navbar.vue'
    import Footers from '../components/homepage/Footer.vue'
    export default {
        metaInfo: {
        title: 'KMN || HomePage',
        },
        components: { NavBar, Footers, Blog },
        name: 'add-blog'
    }
</script>