<template>
    <div>
        <NavBar/>
        <EditProfile/>
        <footers/>
    </div>
</template>

<script>
    import EditProfile from '../components/profile/EditProfile.vue'
    import NavBar from '../components/public/Navbar.vue'
    import Footers from '../components/homepage/Footer.vue'
    export default {
        metaInfo: {
        title: 'KMN || HomePage',
        },
        components: { NavBar, Footers, EditProfile },
        name: 'home'
    }
</script>