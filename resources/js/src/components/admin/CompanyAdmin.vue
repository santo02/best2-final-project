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
          <div class="row m-4">
            <div v-for='company in companies' :key="company.company_id" class="col-md-4 mt-4">
              <div class="card text-center" style="width: 12rem;">
                <img class="card-img-top" :src="company.company_image" style="height: 12rem;">
                <div class="card-body">
                  <h5 class="card-title">{{ company.company_name }}</h5>
                  <div class="btn-group" role="group">
                    <router-link :to="{ name: '' }"
                      class="btn btn-sm  btn-success">Edit</router-link>
                    <button class="btn btn-sm btn-danger">Delete</button>
                  </div>
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

