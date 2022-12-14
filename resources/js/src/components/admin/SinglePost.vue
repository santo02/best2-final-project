<template>
    <section class="py-5">
        <div class="bg-light" style="margin : 40px 70px 50px 70px;">
            <div class="container text-center" style="margin-top: 91px;">
                <div class="row">
                    <div class="col-md-12">
                        <h1>{{ posts.title }}</h1>
                        <p style="margin-top: 1px;">Last update: <b>{{ posts.updated_at }}</b></p>
                    </div>
                </div>
            </div>
            <div class="container text-center"><img class="img-thumbnail" :src="posts.post_image" width="800px"
                    height="600px">
            </div>
            <div class="container" style="margin-top: 23px; font-size: 17px;">
                <div v-html="posts.post_detail"></div>
            </div>

        </div>
        <div class="container">
            <div class="row" style="width: 348px;">
                <div class="col text-start"
                    style="width: 161.75px;border-width: 1px;border-style: dotted;border-radius: 0px;padding-top: 17px;padding-left: 22px;">
                    <img class="rounded-circle" :src="posts.image" height="50px" width="50px">
                    <p class="fw-semibold" style="margin-top: -47px;margin-left: 60px;font-size: 15px;">Creator</p>
                    <p class="fw-lighter" style="margin-top: -27px;margin-left: 60px;font-size: 20px;">
                        {{ posts.username }}</p>
                </div>
            </div>
        </div>
    </section>
</template>
<script>
export default {
    name: 'singlePost',
    data() {
        return {
            posts: {},
        }
    },
    mounted() {
        this.SinglePost();

    },
    methods: {
        SinglePost() {
            axios.get(`/api/posts/${this.$route.params.id}`)
                .then(response => {
                    this.posts = response.data
                })
                .catch(error => {
                    console.log(error)
                });
        }

    }
}
</script>
