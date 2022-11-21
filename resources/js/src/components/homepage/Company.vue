<template>
    <div>
      <Navbar />
      <div class="container">
        <div class="row mt-4">
          <div class="col">
            <h2> Daftar Perusahaan</h2>
          </div>
        </div>
  
        <div class="row mt-3">
          <div class="col">
            <div class="input-group mb-3">
              
              <input
                v-model="search"
                type="text"
                class="form-control"
                placeholder="Cari Perusahaan"
                aria-label="Cari"
                aria-describedby="basic-addon1"
                @keyup="search"
              />

            </div>
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
  import CardCompany from "./CardCompany.vue";
  import axios from "axios";
  
  export default {
    name: "Company",
    components: {
      CardCompany,
    },
    data() {
      return {
        Companys: [],
        search: '',
      };
    },
    methods: {
      setCompanys(data) {
        this.sompanys = data;
      },
      search() {
        axios
        .get(""+this.search)
        .then((response) => this.setCompanys(response.data))
        .catch((error) => console.log(error));
      }
    },
    mounted() {
      axios
        .get("")
        .then((response) => this.setCompanys(response.data))
        .catch((error) => console.log(error));
    },
  };
  </script>
  <style>
  </style>