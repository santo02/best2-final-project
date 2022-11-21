<template>
  <div>
    <NavBar/>
    <articles/>
    <footers/>
  </div>
</template>

<script>
  import Articles from '../components/article/Article.vue'
  import NavBar from '../components/public/Navbar.vue'
  import Footers from '../components/homepage/Footer.vue'
  export default {
    metaInfo: {
      title: 'KMN || HomePage',
    },
    components: { NavBar, Footers, Articles },
    name: 'article'
  }
</script>
