<template>
    <div>
        <NavBar/>
        <HomePage/>
        <footers/>
    </div>
</template>

<script>
    import HomePage from '../components/homepage/Homepage.vue'
    import NavBar from '../components/public/Navbar.vue'
    import Footers from '../components/homepage/Footer.vue'
    export default {
        metaInfo: {
        title: 'KMN || Homepage',
        },
        components: { NavBar, Footers, HomePage },
        name: 'home'
    }
</script>
