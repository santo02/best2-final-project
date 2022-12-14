<template>
    <div>
        <NavBar/>
        <ListCompany/>
        <footers/>
    </div>
</template>

<script>
    import ListCompany from '../components/homepage/ListCompanys.vue'
    import NavBar from '../components/public/Navbar.vue'
    import Footers from '../components/homepage/Footer.vue'
    export default {
        metaInfo: {
        title: 'List Company',
        },
        components: { NavBar, Footers, ListCompany},
        name: 'list-company'
    }
</script>