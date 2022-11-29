<template>
  <div>
    <NavBar />
    <Kategori />
    <footers />
  </div>
</template>

<script>

import NavBar from '../components/public/Navbar.vue'
import Footers from '../components/homepage/Footer.vue'
import Kategori from '../components/homepage/Categories.vue'

export default {
  metaInfo: {
    title: 'KMN || categories',
  },
  components: { NavBar, Footers, Kategori },
  name: 'categories'
}
</script>
