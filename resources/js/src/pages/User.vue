<template>
  <div>
    <nav class="navbar navbar-expand-lg  bg-primary">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Logo</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav">
            <template v-if="isLoggedIn">
              <div v-for="role in user.roles" :key="role.id">
                <li class="nav-item">
                  <router-link :to="{ name: role.name }" class="nav-link">{{ role.name }}</router-link>
                </li>
              </div>
              <div class="d-flex">
                <li class="nav-item"><span class="nav-link">{{ user.name }}</span></li>
              <li class="nav-item"><span class="nav-link" @click="logout">Logout</span></li>
              </div>
            </template>
            <template v-if="!isLoggedIn">
              <li class="nav-item">
                <router-link :to="{ name: 'login' }" class="nav-link">Login</router-link>
              </li>

              <li class="nav-item">
                <router-link :to="{ name: 'register' }" class="nav-link">Register</router-link>
              </li>
            </template>
          </ul>
        </div>
      </div>
    </nav>
    <h1>User Page</h1>
    <p>Role: {{ loginType }}</p>
    <div>
    </div>
  </div>
</template>
<script>
export default {
  metaInfo: {
    title: 'Kampus Merdeka Network || User Page',
  },
  data() {
    return {
      user: [],
      loginType: '',
      isLoggedIn: false
    }
  },
  mounted() {
    this.setUser()
  },
  methods: {
    setUser() {
      this.user = JSON.parse(localStorage.getItem('user'))
      this.isLoggedIn = localStorage.getItem('token') != null

    },
    logout() {
      localStorage.removeItem('token')
      localStorage.removeItem('user')
      this.setUser()

      this.$router.push('/login')
    }
  },
  created() {
    axios.defaults.headers.common['Content-Type'] = 'application/json'
    let token = axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('token')

    axios.get('api/user')
      .then(response => {
        this.user = response.data
        console.log(this.user)
        this.loginType = response.data.role
        // console.log(this.loginType)
      })
      .catch(error => {
        if (error.response.status === 401) {
          localStorage.clear();
          this.$router.push('/login')
        }
        console.error(error);
      })
  }
}
</script>
