<template>
    <section class="py-5">
        <div class="container text-center" style="margin-top: 91px;">
            <div class="row">
                <div class="col-md-12">
                    <h1>{{this.$store.state.articlePost.title}}</h1>
                    <p style="margin-top: 1px;">{{this.$store.state.articlePost.created_time}}</p>
                </div>
            </div>
        </div>
        <div class="container text-center"><img class="img-fluid" :src="this.$store.state.articlePost.post_image" width="1200px" height="1000px"></div>
        <div class="container">
            <p class="fw-normal text-start">{{this.$store.state.articlePost.post_detail}}</p>
        </div>
        <div class="container">
            <div class="row" style="width: 348px;">
                <div class="col text-start" style="width: 161.75px;border-width: 1px;border-style: dotted;border-radius: 0px;padding-top: 17px;padding-left: 22px;"><img class="rounded-circle img-fluid" src="/assets/img/OIP.jpeg" height="40px" width="40px">
                    <p class="fw-semibold" style="margin-top: -41px;margin-left: 52px;font-size: 15px;">Creator</p>
                    <p class="fw-lighter" style="margin-top: -27px;margin-left: 52px;font-size: 24px;">{{this.$store.state.articlePost.username}}</p>
                </div>
            </div>
        </div>
    </section>
</template>
<script>
    export default {
        name: 'detail-article',
        mounted() {
            this.getPostUsingSlug(this.$route.params.slug)
        },
        methods: {
            getPostUsingSlug(slug) {
                axios.get(`/api/posts/find/${slug}`)
                .then(response => {
                    this.$store.commit("addArticlePost", response.data)
                    this.getRelatedArticlePost()
                })
                .catch(error => {
                    console.log(error)
                });
            },

            getRelatedArticlePost() {
                let postId = this.$store.state.articlePost.post_id
                let postCategory = this.$store.state.articlePost.category
                axios.get(`/api/posts/related/${postId}/${postCategory}`)
                .then(response => {
                    this.$store.commit("addRelatedArticle", response.data)
                    console.log(response.data)
                    this.getComments(postId)

                })
                .catch(error => {
                    console.log(error)
                });
            },

            getComments(id) {
                axios.get(`/api/comments/find/${id}`)
                .then(response => {
                    console.log(response.data)
                    this.$store.commit("addArticleComment", response.data)
                })
                .catch(error => {
                    console.log(error)
                });
            },
        }
    }
</script>
