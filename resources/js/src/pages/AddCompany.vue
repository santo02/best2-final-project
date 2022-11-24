<template>
    <div>
        <NavBar/>
        <AddCompanies/>
        <footers/>
    </div>
</template>

<script>
    import AddCompanies from '../components/homepage/AddCompanies.vue'
    import NavBar from '../components/public/Navbar.vue'
    import Footers from '../components/homepage/Footer.vue'
    export default {
        metaInfo: {
        title: 'Add Company',
        },
        components: { NavBar, Footers, AddCompanies},
        name: 'add-company'
    }
</script>