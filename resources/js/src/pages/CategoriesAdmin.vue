<template>
  <div>
    <NavBar />
    <KategoriAdmin/>
    <footers />
  </div>
</template>

<script>

import NavBar from '../components/public/Navbar.vue'
import Footers from '../components/homepage/Footer.vue'
import KategoriAdmin from '../components/admin/CategoriesAdmin.vue'

export default {
  metaInfo: {
    title: 'KMN || categories',
  },
  components: { NavBar, Footers, KategoriAdmin },
  name: 'categories-admin'
}
</script>
