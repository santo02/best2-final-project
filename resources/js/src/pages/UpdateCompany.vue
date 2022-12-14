<template>
    <div>
        <NavBar/>
        <UpdateCompany/>
        <footers/>
    </div>
</template>

<script>
    import UpdateCompany from '../components/homepage/UpdateCompanys.vue'
    import NavBar from '../components/public/Navbar.vue'
    import Footers from '../components/homepage/Footer.vue'
    export default {
        metaInfo: {
        title: 'Edit Company',
        },
        components: { NavBar, Footers, UpdateCompany},
        name: 'update-company'
    }
</script>