<template>
  <section class="py-2 mt-5">
    <div class="container py-5">
      <div class="card">
        <h3 class="mb-4">Semua company </h3>
        <div class="position-absolute top-0 end-0">
          <router-link to="add-company">
            <button class="btn btn-primary btn-md">New Company</button>
          </router-link>
        </div>
        <div class="container">
          <div class="row m-auto">
            <div v-for='company in companies' :key="company.company_id" class="col-md-3 mt-4">
              <div class="card text-center" style="width: 12rem;">
                <img class="card-img-top" :src="company.company_image" style="height: 12rem;">
                <div class="card-body">
                  <h5 class="card-title">{{ company.company_name }}</h5>
                  <div class="btn-group" role="group">
                    <router-link :to="{ name: 'company-update' }" class="btn btn-sm  btn-success">Edit</router-link>
                    <!-- Delete -->
                    <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                      :data-bs-target="'#DeleteModal' + company.company_id">Delete</button>
                    <!-- modal delete -->
                  </div>
                  <div class="modal fade" :id="'DeleteModal' + company.company_id" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel"><b>Hapus company</b> </h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          Apakah anda ingin menghapus company <b>{{ company.company_name }}</b> ?
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Tidak</button>
                          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Ya</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>/
  </section>
</template>

<script>

export default {
  name: "CompanyAdmin",
  data() {
    return {
      companies: [],
    }

  },
  mounted() {
    this.getCompanys()
  },
  methods: {
    getCompanys() {
      axios.get('/api/companies')
        .then(response => {
          this.companies = response.data
        })
        .catch(error => {
          console.log(error)
        });
    },
    // deleteCate(id) {
    //   axios.delete(`/api/categories/delete/${id}`)
    //     .then(response => {
    //       let i = this.categories.map(data => data.id).indexOf(id);
    //       this.categories.splice(i, 1)
    //     });
    // }
  }
}
</script>

