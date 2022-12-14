<template>
    <div class="container" style="margin-top: 91px;">
        <div class="row">
            <div class="col" style="overflow: auto;display: block;position: static;width: 971px;">
                <div class="row">
                    <div class="col-md-10 offset-md-1" style="margin-left: 0px;">
                        <div class="card m-auto" style="max-width: 850px;width: 902.7px;">
                            <div class="card-body">
                                <form class="d-flex align-items-center">
                                    <i class="fas fa-search d-none d-sm-block h4 text-body m-0"
                                        style="width: 47px;"></i>
                                    <input class="form-control form-control-sm flex-shrink-1 form-control-borderless"
                                        type="search" placeholder="Search topics or keywords..." name="query">
                                    <button class="btn btn-outline-primary" type="submit"
                                        style="margin-bottom: -6px;padding-top: 0.8px;padding-bottom: 0.8px;padding-right: 12px;padding-left: 13px;">Search</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <h5>Semua postingan kategori <b>{{categori}}</b></h5>
                <div v-for='p in posts' :key="p.id" style="padding-bottom: 10px;">

                    <div class="card"
                        style="border-radius: 10px;border-width: 3px;border-color: var(--bs-card-cap-bg);">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-auto"><img class="img-fluid" :src="p.post_image" width="500px">
                                </div>
                                <div class="col">
                                    <div class="row" style="margin-bottom: -10px;padding-top: 7px;max-height: 60px;">
                                        <div class="col text-start" style="width: 161.75px;"><img class="rounded-circle"
                                                :src="p.image" height="33px" width="33px">
                                            <p class="fw-normal" style="margin-top: -27px;margin-left: 40px;">
                                                {{ p.username }}</p>
                                        </div>
                                    </div>
                                    <h5>{{ p.title }}</h5>
                                    <p style="margin-top: 5px;">{{ p.preview.substring(0, 240) }}...</p>
                                    <div class="row">
                                        <div class="col"><img class="img-fluid"
                                                src="/assets/img/d228d012b5f3852abb2b66d9da526801.jpg" width="20px"
                                                height="20px">
                                            <p style="margin-top: -25px;margin-left: 28px;">{{ p.created_at }}</p>
                                        </div>
                                        <div class="col text-end"><img class="img-fluid" src="/assets/img/category.png"
                                                width="20px" height="20px">
                                            <p style="margin-top: -25px;margin-left: 0px;margin-right: 31px;">
                                                {{ p.Categories_name }}</p>
                                        </div>
                                    </div><button class="btn btn-outline-primary btn-sm" @click="detailPost(p.slug)"
                                        type="button" style="margin-top: -15px;border-radius: 8px;">Detail</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
.form-control-borderless {
    border: none;
}

.form-control-borderless:hover,
.form-control-borderless:active,
.form-control-borderless:focus {
    border: none;
    outline: none;
    box-shadow: none;
}
</style>

<script>
export default {
    name: 'post-by-categori',
    data() {
        return {
            posts: [],
            category: [],
            categori:""
        }
    },
    mounted() {
        axios.get(`/api/posts-by-cate/${this.$route.params.id}`)
            .then(response => {
                this.posts = response.data
            })
            .catch(error => {
                console.log(response.data.errors)
            });

        axios.get(`/api/get-cate/${this.$route.params.id}`)
            .then(response => {
                this.categori = response.data
            })
            .catch(error => {
                console.log(response.data.errors)
            });
    },
    methods: {
        detailPost(slug) {
            let companySlug = this.$route.params.id
            this.$router.push(`/${companySlug}/article/${slug}`)
            window.scrollTo(0, 0)
        },
    }
}
</script>
