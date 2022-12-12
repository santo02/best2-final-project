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
                <input @change="handleFileUpload()" ref="file" class="form-control" type="file" required>
              </div>
              <div class="mb-3">
                <label class="form-label">Judul</label>
                <input @input="sanitizeTitle(blog.title)" class="form-control" type="text" v-model="blog.title"
                  required>
              </div>
              <div class="mb-3">
                <label class="form-label">Slug</label>
                <input class="form-control" type="text" v-model="blog.slug" readonly>
              </div>
              <div class="mb-3">
                <label class="form-label">Company</label>
                <select class="form-select" v-model="blog.id" required>
                  <optgroup label="Pilih Perusahaan">
                    <option v-for='company in companies' :key="company.id" :value="company.id">
                      {{ company.company_name }}
                    </option>
                  </optgroup>
                </select>
              </div>
              <div class="mb-3">
                <label class="form-label">Kategori</label>
                <select class="form-select" v-model="blog.category" required>
                  <optgroup label="Pilih Kategori">
                    <option v-for="categori in categories" :key="categori.id" :value="categori.id">
                      {{ categori.Categories_name }}
                    </option>
                  </optgroup>
                </select>
              </div>
              <div class="mb-3">
                <label class="form-label">Preview</label>
                <textarea class="form-control" v-model="blog.preview" required></textarea>
              </div>
              <div class="mb-3">
                <label class="form-label">Isi</label>
                <vue-editor id="editor"
                  use-custom-image-handler
                  @image-added="handleImageAdded" v-model="blog.post_detail">
                </vue-editor>
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
import { VueEditor, Quill } from "vue2-editor";
export default {
  name: "Blog",
  components: { VueEditor },
  data() {
    return {
      blog: {},
      companies: [],
      categories: [],
      user: [],
      file: '',
      isLoggedIn: false,
    }
  },
  mounted() {
    window.scrollTo(0,0)
    this.getCompanyData()
    this.getCategory()
  },
  methods: {
    handleImageAdded(file, Editor, cursorLocation) {
      var formData = new FormData();
      formData.append('file', file)
      axios({
        url: '/api/posts/add/image',
        method: 'POST',
        headers: {
          'Content-Type': 'multipart/form-data',
          'Acces-Control-Allow-Origin': '*',
        },
        data: formData
      })
      .then((result) => {
        let url = result.data.data.url
        Editor.insertEmbed(cursorLocation, 'image', url);
      })
      .catch((err) => {
        console.log(err);
      })
    },
    getCompanyData() {
      axios.get('/api/companies')
        .then(response => {
          this.companies = response.data
        })
        .catch(error => {
          console.log(error)
        });
    },
    getCategory() {
      axios.get('/api/categories/show')
        .then(response => {
          this.categories = response.data
        })
        .catch(error => {
          console.log(error)
        });
    },
    sanitizeTitle(title) {
      var slug = ""
      var titleLower = title.toLowerCase()
      slug = titleLower.replace(/\s*$/g, '')
      slug = slug.replace(/\s+/g, '-')
      slug = slug.replace("‘", '')
      slug = slug.replace("’", '')
      slug = slug.replace("'", '')
      slug = slug.replace("\'", '')
      slug = slug.replace('"', '')
      slug = slug.replace('\"', '')
      slug = slug.replace('#', '')
      slug = slug.replace(',', '')
      slug = slug.replace('.', '')
      slug = slug.replace('[', '')
      slug = slug.replace(']', '')
      slug = slug.replace('{', '')
      slug = slug.replace('}', '')
      slug = slug.replace('|', '')
      slug = slug.replace('+', '')
      slug = slug.replace(':', '')
      return this.blog.slug = slug
    },
    addPost() {
      this.user = JSON.parse(localStorage.getItem('user'))
      this.isLoggedIn = localStorage.getItem('token') != null

      let formData = new FormData()
      formData.append('company_id', this.blog.id)
      formData.append('title', this.blog.title)
      formData.append('category', this.blog.category)
      formData.append('file', this.file)
      formData.append('post_detail', this.blog.post_detail)
      formData.append('preview', this.blog.preview)
      formData.append('user_id', this.user.id)
      formData.append('slug', this.blog.slug)
      this.axios({
        url: '/api/posts/add',
        method: 'post',
        data: formData,
        headers: {
          'Content-Type': 'multipart/form-data',
          'Acces-Control-Allow-Origin': '*',
        }
      }).then(response => (
        this.$router.push({ name: 'home' })
      ))
        .catch(err => console.log(err))
    },
    handleFileUpload() {
      this.file = this.$refs.file.files[0];
      console.log(this.file);
    }
  }
}
</script>
