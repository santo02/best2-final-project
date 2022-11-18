<template>
    <div>
      <navbar/>
      <articles/>
      <Related/>
      <Comment/>
      <footers/>
    </div>
</template>
  
<script>
    import Articles from '../components/homepage/DetailArticle.vue'
    import Related from '../components/homepage/RelatedArticle.vue'
    import Comment from '../components/homepage/Comment.vue'
    import Navbar from '../components/public/Navbar.vue'
    import Footers from '../components/public/Footer.vue'
    export default {
        metaInfo: {
        title: 'KMN || HomePage',
        },
        components: {  Navbar, Footers, Articles, Related, Comment },
        name: 'home'
    }
</script>  