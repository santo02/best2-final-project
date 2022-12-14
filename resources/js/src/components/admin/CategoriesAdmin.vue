<template>
  <section class="py-2 mt-5">
    <div class="container py-5">
      <div class="card">
        <h3 class="mb-4">Semua Kategori </h3>
        <div v-if="message" class="alert alert-success" role="alert">
          {{ message }}
        </div>

        <div v-if="error" class="alert alert-danger ">
          {{ error }}
        </div>
        <div class="position-absolute top-0 end-0">
          <router-link to="add-categories">
            <button class="btn btn-primary btn-md">New Kategori</button>
          </router-link>
        </div>
        <ul v-for="categori in categories" :key="categori.id">
          <li>
            <router-link :to="{ name: 'post-by-categories', params: {id: categori.id}}"> <a class="mt-3">{{ categori.Categories_name }}</a></router-link> <i
              class="fa fa-trash text-danger mx-4" data-bs-toggle="modal"
                          :data-bs-target="'#DeleteModal' + categori.id">
            </i>
            <div class="modal fade" :id="'DeleteModal'+ categori.id" tabindex="-1" aria-labelledby="exampleModalLabel"
              aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><b>Hapus Category</b> </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    Apakah anda ingin menghapus kategori <b>{{ categori.Categories_name }}</b>?
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Tidak</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal"
                    @click="deleteCate(categori.id)">Ya</button>
                  </div>
                </div>
              </div>
            </div>
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
      error: null,
      message: '',

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
          this.categories.splice(i, 1);
          this.message = response.data.message;
        });
    }
  }
}
</script>
