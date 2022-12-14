<template>
    <div>
      <section class="py-5 mt-5">
        <div class="container py-5">
          <div class="card">
            <h3 class="text-center mb-4">Company</h3>
            <div class="card p-3" style="border-width: 1px;border-style: solid;">
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th style="width: 25%">Nama Company</th>
                        <th style="width: 15%">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="company in companys" :key="company.id">
                        <td>{{ company.company_name }}</td>
                        <td>
                          <div class="btn-group" role="group">
                            <router-link :to="{ name: 'update-company', params: { id: company.id } }"
                              class="btn btn-sm  btn-success">Edit</router-link>
                            <button class="btn btn-sm btn-danger" @click="deletecompanys(company.id)">Delete</button>
                          </div>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </template>
  
  <script>
  export default {
    name: "ListCompany",
    data() {
      return {
        user: [],
        isLoggedIn: false,
        companys: []
      }
    },
    created() {
        this.user = JSON.parse(localStorage.getItem('user'))
        this.isLoggedIn = localStorage.getItem('token') != null
        if (!this.user && !this.loggedIn) {
        console.log('Please login first!')
        } else {
        this.axios
            .get(`/api/companies/my/${this.user.id}`)
            .then(response => {
            this.companys = response.data;
            console.log(response.data)
            });
        }
    },
    methods: {
        deletecompanys(id) {
        this.axios
          .delete(`/api/companies/delete/${id}`)
          .then(response => {
            let i = this.companys.map(data => data.id).indexOf(id);
            this.companys.splice(i, 1)
          });
      }
    }
  }
  </script>
  