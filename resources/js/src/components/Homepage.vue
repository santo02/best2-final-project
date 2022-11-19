<template>
    <div class="home">
      <div class="container">
        <Carousel/>
  
        <div class="row mt-4">
          <div class="col" style="text-align:center">
            <h2>Perusahaan</h2>
          </div>
          <div class="col">
            <router-link to="/Company" class="btn btn-primary float-right">Lihat Semua</router-link>
          </div>
        </div>
  
        <div class="row mb-4">
          <div class="col-md-4 mt-4">
            <CardCompany/>
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
        companys: [],
      };
    },
    methods: {
      setCompanys(data) {
        this.companys = data;
      },
    },
    mounted() {
      axios
        .get("")
        .then((response) => this.setCompanys(response.data))
        .catch((error) => console.log(error))
    },
  };
  </script>