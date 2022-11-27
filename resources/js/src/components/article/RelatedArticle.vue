<template>
    <div class="container">
        <h3 class="my-4">Related Articles<br></h3>
        <div class="row">
            <div v-for='article in this.$store.state.relatedArticle' :key="article.post_id" class="col-sm-6 col-md-3 mb-4">
                <a :href="article.slug">
                    <img class="img-fluid" :src="article.post_image"/>
                    <p>{{article.title.substring(0, 50)}}...</p>
                </a>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'related-article',
        mounted() {
            console.log('Related Article is mounted')
        }
    }
</script>
