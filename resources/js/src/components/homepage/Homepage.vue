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
  
        <div class="row mb-4">

          <div class="col-md-4 mt-4" v-for="post in companies" :key="post.company_id">
            <div class="card" style="width: 18rem;">
            <img class="card-img-top" v-bind:src="'/company/' + post.company_image">
            <div class="card-body">
            <h5 class="card-title">{{ post.company_name }}</h5>
              <a href="/article" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
          </div>

        </div>

      </div>
    </div>
</template>
  
  <script>

  import Carousel from "./Carousel.vue";

  export default {
    name: "Homepage",
    components: {
      Carousel
    }, data() {
            return {
                companies: []
            }
        },
        created() {
            this.axios
                .get('/api/companies/')
                .then(response => {
                    this.companies = response.data;
                    console.log(this.companies)
                });
        },
  };
  </script>