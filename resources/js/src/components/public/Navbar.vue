<template>
  <header>
    <nav class="navbar navbar-expand-md navbar-light fixed-top bg-light navbar-shrink py-3">
      <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="/">
          <img :src="kampusMerdekaNetwork" width="130px" height="40px" style="margin-right: 14px;">
        </a>
        <button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1">
          <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Check login -->
        <template v-if="isLoggedIn">
          <div class="collapse navbar-collapse" id="navcol-1">
            <!-- If role admin -->
            <ul class="navbar-nav mx-auto" v-if="loginType === 'admin'" style="font-size: 14px;margin-top: 3px;">
              <li class="nav-item">
                <router-link class="nav-link" :to="{ name: 'admin' }">
                  Home
                </router-link>
              </li>
              <li class="nav-item">
                <router-link class="nav-link" :to="{ name: 'categories-admin' }">Kategori</router-link>
              </li>
              <li class="nav-item">
                <router-link class="nav-link" :to="{ name: 'blog-admin' }">
                  Blog
                </router-link>
              </li>
              <li class="nav-item">
                <router-link class="nav-link" :to="{ name: 'company-admin' }">
                  Company
                </router-link>
              </li>
            </ul>

            <!-- if role user -->
            <ul class="navbar-nav mx-auto" v-if="loginType === 'user'" style="font-size: 14px;margin-top: 3px;">
              <li class="nav-item">
                <router-link class="nav-link" :to="{ name: 'user' }">
                  Home
                </router-link>
              </li>
              <li class="nav-item">
                <router-link class="nav-link" to="/post">Post</router-link>
              </li>
              <li class="nav-item">
                <router-link class="nav-link" :to="{ name: 'categories' }">Kategori</router-link>
              </li>
              <li class="nav-item">
                <router-link class="nav-link" :to="{ name: 'add-blog' }">
                  Add Blog
                </router-link>
              </li>
            </ul>
            <li class="nav-link dropdown ">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button"
                data-bs-toggle="dropdown" aria-expanded="false">
                Settings
              </a>
              <ul class="dropdown-menu dropdown-menu-white" aria-labelledby="navbarDarkDropdownMenuLink">
                <li><a class="dropdown-item" href="/profile/username">My Profile</a></li>
                <li><a class="dropdown-item" href="/my-blog">My Blog</a></li>
                <li><a class="dropdown-item" @click="logout">Logout</a></li>
              </ul>
            </li>
          </div>
        </template>
        <template v-if="!isLoggedIn">
          <div class="collapse navbar-collapse" id="navcol-1">
            <ul class="navbar-nav mx-auto" style="font-size: 14px;margin-top: 3px;">
              <li class="nav-item">
                <router-link class="nav-link" :to="{ name: 'home' }">
                  Home
                </router-link>
              </li>
              <li class="nav-item">
                <router-link class="nav-link" to="/Post">Post</router-link>
              </li>
              <li class="nav-item">
                <router-link class="nav-link" :to="{ name: 'categories' }">Kategori</router-link>
              </li>
            </ul>
            <router-link to="/login">
              <a class="btn btn-primary border rounded-0" role="button">Masuk</a>
            </router-link>
          </div>
        </template>
      </div>
    </nav>
  </header>
</template>

<script>
export default {
  name: 'navbar',
  data() {
    return {
      kampusMerdekaNetwork: '/assets/img/Logo.png',
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
        // console.log(this.user.role)
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
