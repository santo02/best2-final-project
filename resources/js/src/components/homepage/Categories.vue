<template>
  <section class="py-2 mt-5">
    <div class="container py-5">
      <div class="card">
        <h3 class="mb-4">Semua Kategori </h3>

        <ul v-for="categori in categories" :key="categori.id">
          <li>
            <router-link :to="{ name: 'post-by-categories', params: {id: categori.id}}"> <a class="mt-3">{{ categori.Categories_name }}</a></router-link>
          </li>
        </ul>
      </div>
    </div>
  </section>
</template>

<script>

export default {
  name: "kategori",
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
