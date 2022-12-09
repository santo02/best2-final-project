<template>
    <section class="position-relative py-4 py-xl-5">
        <div class="container position-relative">
            <div class="row d-flex justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5 col-xxl-4" style="width: 1168px;">
                    <div class="card mb-5">
                        <div class="card-body p-sm-5">
                            <h2 class="text-center mb-4">Comments</h2>
                            <div v-if="(!this.$store.state.user && !this.$store.state.isLoggedIn)" class="text-center mb-3">
                                <h4 class="text-danger">Halo, login dulu sebelum berkomentar ya!</h4>
                                <img class="img-fluid" src="/assets/img/tenor.gif">
                            </div>
                            <div v-else>
                                <div v-if="message" class="alert alert-success" role="alert">
                                    {{ message }}
                                </div>
                                <div v-if="error" class="alert alert-danger ">
                                    {{ error }}
                                </div>

                                <form @submit.prevent="sendComment">
                                    <div class="mb-3">
                                        <textarea class="form-control" rows="6" v-model="comment.message" required></textarea>
                                    </div>
                                    <div>
                                        <button class="btn btn-primary d-block w-100" style="margin-bottom: 50px;">Send </button>
                                    </div>
                                </form>
                            </div>
                            <div v-for='comment in this.$store.state.comments' class="card">
                                <div class="card-body" style="height: 140px;margin-top: -20px;">
                                    <ul class="list-group">
                                        <li class="list-group-item" style="margin-bottom:6px;">
                                            <div class="d-flex media">
                                                <div></div>
                                                <div class="media-body">
                                                    <div class="d-flex media" style="overflow:visible;">
                                                        <div><img class="rounded-circle me-3" style="width: 35px; height:35px;" :src="comment.image"></div>
                                                        <div style="overflow:visible;" class="media-body">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <p><a>{{comment.username}}:</a> {{comment.comments}}<br>
                                                                    <small class="text-muted">{{comment.created_at}}</small></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
<script>
    export default {
        name: 'comment-article',
        data() {
            return {
                user: [],
                isLoggedIn: false,
                comment: {},
                error: null,
                message: '',
            }
        },
        methods: {
            sendComment() {
                let message = this.comment.message
                this.user = JSON.parse(localStorage.getItem('user'))
                this.isLoggedIn = localStorage.getItem('token') != null
                if(!this.$store.state.user && !this.$store.state.isLoggedIn) {
                    this.error = 'Please login first!';
                } else if(!this.comment.message) {
                    this.error = 'Please type a comment!';
                } else {
                    axios.post('/api/comments/post', {
                        comments: message,
                        userId: this.user.id,
                        postId: this.$store.state.articlePost.id
                    })
                    .then(response => {
                        this.refreshData(this.$store.state.articlePost.id)
                        this.message = 'Berhasil upload komentar!';
                        this.comment.message = ''
                    })
                    .catch(error => {
                        console.log(error)
                    });
                }
            },

            refreshData(id) {
                axios.get(`/api/comments/find/${id}`)
                .then(response => {
                    console.log(response.data)
                    this.$store.commit("addArticleComment", response.data)
                })
                .catch(error => {
                    console.log(error)
                });
            },
        },
    }
</script>