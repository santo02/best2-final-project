<template>
  <div>
    <NavBar />
    <CompanyAdmin/>
    <footers />
  </div>
</template>

<script>

import NavBar from '../components/public/Navbar.vue'
import Footers from '../components/homepage/Footer.vue'
import CompanyAdmin from '../components/admin/CompanyAdmin.vue';

export default {
  metaInfo: {
    title: 'KMN || All Company',
  },
  components: { NavBar, Footers, CompanyAdmin },
  name: 'company-admin'
}
</script>
