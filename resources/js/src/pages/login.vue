<template>
  <section class="vh-100">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-5 text-black">
          <div class="px-5 ms-xl-4">
            <i class="fas fa-crow fa-2x me-3 mt-5 mt-xl-4" style="color: #709085;"></i>
            <span class=""><img src="/assets/img/logo.png" alt="logo" srcset="" width="120px"
                style="margin-top:40px;"></span>
          </div>

          <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">

            <form style="width: 30rem;" @submit.prevent="loginForm">
              <p class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;  font-weight: bold; font-size: 40px;">Sign In
              </p>
              <div v-if="message" class="alert alert-success" role="alert">
                {{ message }}
              </div>

              <div v-if="error" class="alert alert-danger ">
                {{ error }}
              </div>
              <div class="form-outline mb-4">
                <input type="email" class="form-control form-control-md" placeholder="Email/Username" v-model="email"
                  style="background-color: #D9D9D9;" />
              </div>

              <div class="form-outline mt-4 mb-4">
                <input type="password" id="form2Example28" v-model="password" class="form-control form-control-md"
                  placeholder="Password" style="background-color: #D9D9D9; margin-top: 50px;" />
              </div>

              <div class="pt-1 mb-4">
                <button class="btn rounded-4 btn-info btn-md btn-block" type="submit"
                  style="background-color: #1050E6; letter-spacing: 3px; margin-top: 50px;">Login</button>
              </div>

              <p class="small mb-5 pb-lg-2"><a class="text-muted" href="#!">Forgot password?</a></p>
              <p>Don't have an account? <a href="#!" class="link-info">
                  <router-link to="/registrasi">Register here</router-link>
                </a></p>
            </form>
          </div>

        </div>
        <div class="col-sm-7 px-0 d-none d-sm-block">
          <img src="assets/img/image 1.png" alt="Login image" class="w-100 vh-100"
            style="object-fit:fill; object-position: left;">
        </div>
      </div>
    </div>
  </section>
</template>
<script>
export default {
  metaInfo: {
      title: 'KMN || Login',
    },
  data() {
    return {
      email: '',
      password: '',
      error: null,
      message: '',
    }
  },
  created() {
    if (this.$route.params.message !== undefined) {
      this.message = this.$route.params.message + ' Please login!'
    }
  },
  methods: {
    loginForm() {
      axios.post('api/login', {
        email: this.email,
        password: this.password
      })
        .then(response => {
          localStorage.setItem('user', JSON.stringify(response.data.user))
          localStorage.setItem('token', response.data.token)

          let loginType = response.data.user.role
          console.log('ini adalah ' + loginType);
          if (loginType === 'user') {
            this.$router.push('/user')
          } else if (loginType === 'admin') {
            this.$router.push('/admin')
          } else {
            this.$router.push('/login')
          }

          this.$emit('loggedIn')

        })
        .catch(error => {
          this.error = error.response.data.error;
        });
    }
  }
}
</script>
