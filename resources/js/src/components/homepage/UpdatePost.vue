<template>
    <section class="py-5 mt-5">
        <div class="container py-5">
            <div class="card">
                <div class="card p-3" style="border-width: 3px;border-style: dashed;">
                    <div class="card-body">
                        <form class="text-start" @submit.prevent="updatePost" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label class="form-label">Choose Image</label>
                                <input class="form-control" type="file">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Judul</label>
                                <input class="form-control" type="text" v-model="post.title">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Slug</label>
                                <input class="form-control" type="text" v-model="post.slug">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Company</label>
                                <select class="form-select" v-model="post.company_id">
                                    <optgroup label="Pilih Kategori">
                                        <option value="1">Company 1</option>
                                        <option value="2">Company 2</option>
                                        <option value="3">Company 3</option>
                                    </optgroup>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Kategori</label>
                                <select class="form-select" v-model="post.category">
                                    <optgroup label="Pilih Kategori">
                                        <option value="1">Kategori 1</option>
                                        <option value="2">Kategori 2</option>
                                        <option value="3">Kategori 3</option>
                                    </optgroup>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Isi</label>
                                <textarea class="form-control" v-model="post.post_detail"></textarea>
                            </div>
                            
                            <input type="hidden" class="form-control" value="1" v-model="post.user_id" />
                            <input type="hidden" class="form-control" value="test.jpg" v-model="post.post_image" />

                            <div class="mb-3 mt-4">
                                <button class="btn btn-primary d-block w-100" type="submit">submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>

    export default {
        name: "UpdatePost",
        data() {
            return {
                post: {}
            }
        },
        created() {
            this.axios
                .get(`/api/posts/${this.$route.params.id}`)
                .then((res) => {
                    this.post = res.data;
                    console.log(this.post);
                });
        },
        methods: {
            updatePost() {
                this.axios
                    .patch(`/api/posts/${this.$route.params.id}`, this.post)
                    .then((res) => {
                        this.$router.push({ name: 'list-blog' });
                    });
            }
        }
    }
    
</script>