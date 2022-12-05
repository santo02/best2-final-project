<template>
  <section class="py-5 mt-5">

    <div class="container py-2">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <router-link to="categories">
              <a>Kategori</a>
            </router-link>
          </li>
          <li class="breadcrumb-item">
            <router-link to="add-categories">
              <a>New Kategori</a>
            </router-link>
          </li>

        </ol>
      </nav>
      <div class="card">
        <h3 class="text-center mb-4">Tambah Kategori Baru</h3>
        <div class="card p-3" style="border-width: 3px;border-style: dashed;">
          <div class="card-body">
            <div v-if="message" class="alert alert-success" role="alert">
              {{ message }}
            </div>

            <div v-if="error" class="alert alert-danger ">
              {{ error }}
            </div>
            <form class="text-start" @submit.prevent="addCategories">
              <div class="mb-3">
                <label class="form-label">Nama Kategori</label>
                <input @input="sanitizeTitle(categories.Categories_name)" class="form-control" type="text"
                  v-model="categories.Categories_name" required>
              </div>
              <div class="mb-3">
                <label class="form-label">Slug</label>
                <input class="form-control" type="text" v-model="categories.slug" readonly>
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
  name: "AddCategories",
  data() {
    return {
      categories: {
        Categories_name: '',
        slug: '',
      },

    }
  },
  methods: {
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
      return this.categories.slug = slug
    },
    addCategories() {
      axios.post('api/categories/add', this.categories)
        .then(response => {
          this.categories.Categories_name = '',
            this.categories.slug = '',
            this.$router.push({
              name: 'add-categories',
              params: {
                message: response.data.message,
              }
            })
        })
        .catch(error => {
          this.errors = error.response.data.errors;
        });
    }
  }
}
</script>
