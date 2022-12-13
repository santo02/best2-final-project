<template>
    <div>
        <NavBar/>
        <Users/>
        <footers/>
    </div>
</template>

<script>
    import Users from '../components/admin/AllUser.vue'
    import NavBar from '../components/public/Navbar.vue'
    import Footers from '../components/homepage/Footer.vue'
    export default {
        metaInfo: {
        title: 'KMN || All Users',
        },
        components: { NavBar, Footers, Users},
        name: 'all-users'
    }
</script>
