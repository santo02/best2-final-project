<template>
    <div>
        <NavBar/>
        <Homepage/>
        <footers/>
    </div>
</template>

<script>
    import Homepage from '../components/homepage/Homepage.vue'
    import NavBar from '../components/public/Navbar.vue'
    import Footers from '../components/homepage/Footer.vue'
    export default {
        metaInfo: {
        title: 'KMN || HomePage',
        },
        components: { NavBar, Footers, Homepage },
        name: 'home'
    }
</script>