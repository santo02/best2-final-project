<template>
    <section class="py-5 mt-5">
        <div class="container py-5">
            <div class="card">
                <h3 class="text-center mb-4">Tambah Post Baru</h3>
                <div class="card p-3" style="border-width: 3px;border-style: dashed;">
                    <div class="card-body">
                        <form class="text-start" @submit.prevent="addPost" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label class="form-label">Choose Image</label>
                                <input @change="handleFileUpload()" ref="file" class="form-control" type="file">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Judul</label>
                                <input class="form-control" type="text" v-model="title">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Slug</label>
                                <input class="form-control" type="text" v-model="slug">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Company</label>
                                <select class="form-select" v-model="company_id">
                                    <optgroup label="Pilih Kategori">
                                        <option value="1">Company 1</option>
                                        <option value="2">Company 2</option>
                                        <option value="3">Company 3</option>
                                    </optgroup>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Kategori</label>
                                <select class="form-select" v-model="category">
                                    <optgroup label="Pilih Kategori">
                                        <option value="1">Kategori 1</option>
                                        <option value="2">Kategori 2</option>
                                        <option value="3">Kategori 3</option>
                                    </optgroup>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Isi</label>
                                <textarea class="form-control" v-model="post_detail"></textarea>
                            </div>
                            

                            <div class="mb-3 mt-5">
                                <button class="btn btn-primary d-block w-100" type="submit">Submit</button>
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
    name: "Blog",
    
    data() {
                return {
                    'company_id':'',
                    'title':'',
                    'category':'',
                    'file':'',
                    'post_detail':'',
                    'user_id':'',
                    'slug':'',
                }
            },
        methods: {
            addPost() {
                let formData =  new FormData();

                formData.append('company_id', this.company_id);
                formData.append('title', this.title);
                formData.append('category', this.category);
                formData.append('file', this.file);
                formData.append('post_detail', this.post_detail);
                formData.append('user_id', 1);
                formData.append('slug', this.slug);

                console.log(formData);
                this.axios({
                    url: '/api/posts',
                    method: 'post',
                    data: formData,
                    headers: {
                        'Content-Type' : 'multipart/form-data',
                        'Acces-Control-Allow-Origin' : '*',
                    }
                }).then(response => (
                        this.$router.push({ name: 'article-page' })
                    ))
                    .catch(err => console.log(err))
            },
            
            handleFileUpload(){
                this.file = this.$refs.file.files[0];
                console.log(this.file);
            }
                
        }
}
</script>