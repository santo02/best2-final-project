<template>
  <div>
    <div>
      <img :src="AdminGambar" alt="" srcset="" height="500px" class="w-100">
      <h1 class="wellcome">Kamu login sebagai Admin</h1>
    </div>
    <div class="container text-center" style="margin-top:40px">
      <div class="row">
        <div class="col">
          <div class="card " style="width: 18rem;">
            <router-link :to="{ name: 'all-users' }">
              <div class="card-body">
                <h2 class="card-title">Total User: </h2>
                <p class="card-text">{{ CountUsers }} user</p>
              </div>
            </router-link>
          </div>
        </div>
        <div class="col">
          <div class="card " style="width: 18rem;">
            <router-link :to="{ name: 'blog-admin' }">
              <div class="card-body">
                <h2 class="card-title">Total Blog: </h2>
                <p class="card-text">{{ CounPosts }} Blog</p>
              </div>
            </router-link>
          </div>
        </div>
        <div class="col">
          <div class="card " style="width: 18rem;">
            <router-link :to="{ name: 'company-admin' }">
              <div class="card-body">
                <h2 class="card-title">Total Company: </h2>
                <p class="card-text">{{ CountCompanys }} company</p>
              </div>
            </router-link>

          </div>
        </div>
        <div class="col">
          <div class="card " style="width: 18rem;">
            <router-link :to="{ name: 'categories-admin' }">
              <div class="card-body">
                <h2 class="card-title">Total Category: </h2>
                <p class="card-text">{{ CountCate }} Category</p>
              </div>
            </router-link>
          </div>
        </div>
      </div>
    </div>
  </div>

</template>

<script>
export default {
  name: "Dashboard",
  data() {
    return {
      AdminGambar: 'assets/img/Slider1.jpg',
      CountCate: '',
      CountUsers: '',
      CounPosts: '',
      CountCompanys: '',

    }
  },
  mounted() {
    this.CountCategories();
    this.CountUser();
    this.CounPost();
    this.CountCompany();
  },
  methods: {
    CountCategories() {
      axios.get('/api/categories/count')
        .then(response => {
          this.CountCate = response.data
        })
        .catch(error => {
          console.log(error)
        });
    },
    CountUser() {
      axios.get('api/TotalUser')
        .then(response => {
          this.CountUsers = response.data
        })
        .catch(error => {
          console.log(error)
        });
    },
    CounPost() {
      axios.get('api/TotalPost')
        .then(response => {
          this.CounPosts = response.data
        })
        .catch(error => {
          console.log(error)
        });
    },
    CountCompany() {
      axios.get('api/TotalCompany')
        .then(response => {
          this.CountCompanys = response.data
        })
        .catch(error => {
          console.log(error)
        });
    }
  }
};
</script>
<style scoped>
.card {
  background-color: rgba(245, 245, 245, 0.856);
  margin: 20px;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}

.wellcome {
  color: white;
  margin-top: -80px;
  margin-left: 10px;
}
</style>
