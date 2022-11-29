<template>
  <section class="py-2 mt-5">
    <div class="container py-5">
      <div class="card">
        <h3 class="mb-4">Semua Kategori </h3>
        <div class="position-absolute top-0 end-0">
          <router-link to="add-categories">
            <button class="btn btn-primary btn-md">New Kategori</button>
          </router-link>
        </div>
        <ul v-for="categori in categories" :key="categori.id">
          <li>
            <router-link to="home"> <a class="mt-3">{{ categori.Categories_name }} (total blog)</a></router-link> <i
              class="fa fa-trash text-danger mx-4" @click="deleteCate(categori.id)"></i>
          </li>
        </ul>
      </div>
    </div>
  </section>
</template>

<script>

export default {
  name: "KategoriAdmin",
  data() {
    return {
      categories: [],
    }

  },
  mounted() {
    this.getCategory()
  },
  methods: {
    getCategory() {
      axios.get('/api/categories/show')
        .then(response => {
          this.categories = response.data
        })
        .catch(error => {
          console.log(error)
        });
    },
    deleteCate(id) {
      axios.delete(`/api/categories/delete/${id}`)
        .then(response => {
          let i = this.categories.map(data => data.id).indexOf(id);
          this.categories.splice(i, 1)
        });
    }
  }
}
</script>
