<template>
  <div>
    <NavBar />
    <BlogAdmin/>
    <footers />
  </div>
</template>

<script>

import NavBar from '../components/public/Navbar.vue'
import Footers from '../components/homepage/Footer.vue'
import BlogAdmin from '../components/admin/BlogAdmin.vue'

export default {
  metaInfo: {
    title: 'KMN || All Blog',
  },
  components: { NavBar, Footers, BlogAdmin },
  name: 'Blog-admin'
}
</script>
