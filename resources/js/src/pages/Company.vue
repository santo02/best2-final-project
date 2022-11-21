<template>
    <div>
        <NavBar/>
        <Company/>
        <footers/>
    </div>
</template>

<script>
    import Company from '../components/homepage/Company.vue'
    import NavBar from '../components/public/Navbar.vue'
    import Footers from '../components/homepage/Footer.vue'
    export default {
        metaInfo: {
        title: 'KMN || HomePage',
        },
        components: { NavBar, Footers, Company },
        name: 'home'
    }
</script>