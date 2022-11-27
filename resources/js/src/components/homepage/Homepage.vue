<template>
  <div class="home">
    <div class="container">
      <Carousel/>

      <div class="row mt-4">
        <div class="col" style="text-align:center">
          <h2>Perusahaan</h2>
        </div>
        <div class="col">
          <router-link to="/company" class="btn btn-primary float-right">Lihat Semua</router-link>
        </div>
      </div>

      <div class="container">
        <div class="row m-4">
          <div v-for='company in companies' :key="company.company_id" class="col-md-4 mt-4">
            <div class="card text-center" style="width: 18rem;">
              <img class="card-img-top" :src="company.company_image">
              <div class="card-body">
                <h5 class="card-title">{{company.company_name}}</h5>
                <a :href="company.company_slug + '/article'" class="btn btn-primary">Detail</a>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</template>

<script>

import Carousel from "./Carousel.vue";
import CardCompany from "./CardCompany.vue";
import axios from "axios";


export default {
  name: "Homepage",
  components: {
    Carousel,
    CardCompany
  },
  data() {
    return {
      companies: [],
    };
  },
  methods: {
    setCompanies(data) {
      this.companies = data;
    },
  },
  mounted() {
    axios
      .get("/api/companies")
      .then((response) => this.setCompanies(response.data))
      .catch((error) => console.log(error))
  },
};
</script>
