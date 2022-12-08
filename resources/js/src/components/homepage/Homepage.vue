<template>
  <div class="home">
    <div class="container">
      <Carousel/>

      <div class="row mt-4">
        <div class="col" style="text-align:center">
          <h3>Daftar Perusahaan</h3>
        </div>
        <div class="col">
          <router-link to="/company" class="btn btn-primary float-right">Lihat Semua</router-link>
        </div>
      </div>

      <div class="container">
        <div class="row m-4">
          <div v-for='company in companies' :key="company.id" class="col-md-4 text-center" style="padding-bottom: 25px;">
            <h4 class="fw-semibold">{{company.company_name}}</h4>
            <div class="card" style="border-width: 1px;">
              <img class="card-img w-100 d-block" :src="company.company_image" style="opacity: 1;" width="100px" height="150px">
            </div>
            <button class="btn btn-primary btn-sm text-center" type="button" style="margin-top: 10px; border-radius: 10px; width: 150px; height: 40px;" @click="hitButton(company.company_slug)" data-v-button-1>See Article</button>
          </div>
        </div>
      </div>

    </div>
  </div>
</template>

<style scoped>
  .card-img-overlay[data-v-1] {
    background: var(--bs-gray-700);
    opacity: 0.18;
  }

  .card-img-overlay[data-v-2] {
    background: var(--bs-card-cap-bg);
  }
</style>

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

    hitButton(slug) {
      this.$router.push(`/${slug}/article`)
      window.scrollTo(0,0)
    }
  },
  mounted() {
    axios
      .get("/api/companies")
      .then((response) => this.setCompanies(response.data))
      .catch((error) => console.log(error))
  },
};
</script>
