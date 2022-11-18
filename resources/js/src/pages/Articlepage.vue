<template>
  <div>
    <navbar/>
    <articles/>
    <footers/>
  </div>
</template>

<script>
import Articles from '../components/homepage/Article.vue'
import Navbar from '../components/public/Navbar.vue'
import Footers from '../components/public/Footer.vue'
export default {
  metaInfo: {
    title: 'KMN || HomePage',
  },
  components: {  Navbar, Footers, Articles },
  name: 'home'
}
</script>
