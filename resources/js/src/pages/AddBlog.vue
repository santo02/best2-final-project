<template>
    <div>
        <NavBar/>
        <AddBlog/>
        <footers/>
    </div>
</template>

<script>
    import AddBlog from '../components/homepage/Blog.vue'
    import NavBar from '../components/public/Navbar.vue'
    import Footers from '../components/homepage/Footer.vue'
    export default {
        metaInfo: {
        title: 'KMN || HomePage',
        },
        components: { NavBar, Footers, AddBlog },
        name: 'home'
    }
</script>