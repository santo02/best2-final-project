<template>
    <div>
        <NavBar/>
        <articles/>
        <Related/>
        <Comment/>
        <footers/>
    </div>
</template>
  
<script>
    import Articles from '../components/article/DetailArticle.vue'
    import Related from '../components/article/RelatedArticle.vue'
    import Comment from '../components/article/Comment.vue'
    import NavBar from '../components/public/Navbar.vue'
    import Footers from '../components/homepage/Footer.vue'
    export default {
        metaInfo: {
        title: 'KMN || HomePage',
        },
        components: { NavBar, Footers, Articles, Related, Comment },
        name: 'article-detail'
    }
</script>  