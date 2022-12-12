<template>
    <div class="container" style="margin-top: 91px;">
        <div class="row">
            <div class="col" style="overflow: auto;display: block;position: static;width: 971px;">
                <div class="row">
                    <div class="col-md-10 offset-md-1" style="margin-left: 0px;">
                        <div class="card m-auto" style="max-width: 850px;width: 902.7px;">
                            <div class="card-body">
                                <form class="d-flex align-items-center">
                                    <i class="fas fa-search d-none d-sm-block h4 text-body m-0" style="width: 47px;"></i>
                                    <input class="form-control form-control-sm flex-shrink-1 form-control-borderless" type="search" placeholder="Search topics or keywords..." name="query">
                                    <button class="btn btn-outline-primary" type="submit" style="margin-bottom: -6px;padding-top: 0.8px;padding-bottom: 0.8px;padding-right: 12px;padding-left: 13px;">Search</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div v-for='article in this.$store.state.articlePost' :key="article.id" style="padding-bottom: 10px;">
                    <div class="card" style="border-radius: 10px;border-width: 3px;border-color: var(--bs-card-cap-bg);">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-auto"><img :src="article.post_image" width="315px" height="250px"></div>
                                <div class="col">
                                    <div class="row" style="margin-bottom: -10px;padding-top: 7px;max-height: 60px;">
                                        <div class="col text-start" style="width: 161.75px;"><img class="rounded-circle" :src="article.image" height="33px" width="33px">
                                            <p class="fw-normal" style="margin-top: -27px;margin-left: 40px;">{{article.username}}</p>
                                        </div>
                                    </div>
                                    <h5>{{article.title}}</h5>
                                    <p style="margin-top: 5px;">{{article.preview.substring(0, 240)}}...</p>
                                    <div class="row">
                                        <div class="col"><img class="img-fluid" src="/assets/img/d228d012b5f3852abb2b66d9da526801.jpg" width="20px" height="20px">
                                            <p style="margin-top: -25px;margin-left: 28px;">{{article.created_at}}</p>
                                        </div>
                                        <div class="col text-end"><img class="img-fluid" src="/assets/img/category.png" width="20px" height="20px">
                                            <p style="margin-top: -25px;margin-left: 0px;margin-right: 31px;">{{article.Categories_name}}</p>
                                        </div>
                                    </div><button class="btn btn-outline-primary btn-sm" @click="detailPost(article.slug)" type="button" style="margin-top: -15px;border-radius: 8px;">Detail</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-auto">
                <h2 data-bs-toggle="tooltip" data-bss-tooltip="" title="Silahkan Pilih Kategori">Kategori</h2>
                <hr style="background: #0676dd;border-radius: 18px;border-width: 3px;border-color: rgb(6,118,221);margin-top: -7px;">
                <div v-for='kategori in category' :key="kategori.id">
                    <a :href="'article?query=' + kategori.Categories_name">
                        <h6>{{kategori.Categories_name}}</h6>
                    </a>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
    .form-control-borderless {
        border: none;
    }

    .form-control-borderless:hover, .form-control-borderless:active, .form-control-borderless:focus {
        border: none;
        outline: none;
        box-shadow: none;
    }
</style>

<script>
    export default {
        name: 'articles',
        data() {
            return {
                category: null
            }
        },
        mounted() {
            if(!this.$route.query.query) {
                axios.get(`/api/posts/companies/${this.$route.params.id}`)
                .then(response => {
                    console.log(response.data)
                    this.$store.commit("addArticlePost", response.data)
                    console.log(this.$store.state.articlePost)
                })
                .catch(error => {
                    console.log(response.data.errors)
                });
            } else {
                axios.get(`/api/posts/search/${this.$route.query.query}/${this.$route.params.id}`)
                .then(response => {
                    console.log(response.data)
                    this.$store.commit("addArticlePost", response.data)
                })
                .catch(error => {
                    console.log(response.data.errors)
                });
            }

            axios.get('/api/categories/show')
                .then(response => {
                    this.category = response.data
                })
                .catch(error => {
                    console.log(response.data.errors)
                });

        },
        methods: {
            detailPost(slug) {
                let companySlug = this.$route.params.id
                this.$router.push(`/${companySlug}/article/${slug}`)
                window.scrollTo(0,0)
            },
        }
    }
</script>