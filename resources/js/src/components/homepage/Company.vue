<template>
  <div>
    <Navbar />
    <div class="container">
      <div class="row mt-4">
        <div class="col">
          <h3>Daftar Perusahaan</h3>
        </div>
      </div>

      <div class="row">
        <div class="col-md-10 offset-md-1" style="margin-left: 0px;">
            <div class="card m-auto" style="max-width: 850px;width: 902.7px;">
                <div class="card-body">
                    <form class="d-flex align-items-center">
                        <i class="fas fa-search d-none d-sm-block h4 text-body m-0" style="width: 47px;"></i>
                        <input class="form-control form-control-sm flex-shrink-1 form-control-borderless" type="search" placeholder="Search topics or keywords..." name="query">
                        <button class="btn btn-outline-primary" type="submit" style="margin-bottom: -6px;padding-top: 0.8px;padding-bottom: 0.8px;padding-right: 12px;padding-left: 13px;">Search</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

      <div class="row mb-4">
        <div v-for='company in Companys' :key="company.id" class="col-md-4" style="padding-bottom: 25px;">
            <div class="card" style="border-width: 1px;">
              <img class="card-img w-100 d-block" :src="company.company_image" style="opacity: 1;" width="100px" height="150px">
              <div class="card-img-overlay" data-v-2>
                <div>
                  <h4 class="fw-semibold text-black">{{company.company_name}}</h4>
                </div>
                <button class="btn btn-primary btn-sm" type="button" @click="hitButton(company.company_slug)" data-v-button-1>Detail</button>
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>
</template>

<script>
import CardCompany from "./CardCompany.vue";
import axios from "axios";

export default {
  name: "Company",
  data() {
    return {
      Companys: [],
      search: '',
    };
  },
  methods: {
    setCompanys(data) {
      this.Companys = data;
    },
  },
  mounted() {
    if(!this.$route.query.query) {
      axios.get('/api/companies/')
      .then(response => {
        this.setCompanys(response.data)
      })
      .catch(error => {
        console.log(response.data.errors)
      });
    } else {
      axios.get(`/api/companies/search/${this.$route.query.query}`)
      .then(response => {
        this.setCompanys(response.data)
      })
      .catch(error => {
        console.log(response.data.errors)
      });
    }
  },
};
</script>
<style>
</style>
