<template>
  <section class="vh-100">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-5 text-black">
          <div class="px-5 ms-xl-4">
            <span class=""><img src="/assets/img/logo.png" alt="logo" srcset="" width="120px"
                style="margin-top:40px;"></span>
          </div>

          <div class="d-flex align-items-center h-custom-2 px-4 ms-xl-4 mt-4 pt-4 pt-xl-0 mt-xl-n5">


            <form style="width: 25rem;" @submit.prevent="SubmitForm">
              <p class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;  font-weight: bold; font-size: 35px;">Create
                account </p>
              <div v-if="errors" class="alert alert-danger" role="alert">
                <div v-for="(v, k) in errors" :key="k">
                  <p v-for="error in v" :key="error" class="text-sm">
                    {{ error }}
                  </p>
                </div>
              </div>
              <div class="form-outline mb-4">
                <input type="text" v-model="user.name" class="form-control form-control-md" placeholder="Full Name"
                  style="background-color: #D9D9D9;" />
              </div>
              <div class="form-outline mb-4">
                <input type="text" v-model="user.username" class="form-control form-control-md" placeholder="Username"
                  style="background-color: #D9D9D9; margin-top: 20px;" />
              </div>
              <div class="form-outline mb-4">
                <input type="email" id="form2Example18" v-model="user.email" class="form-control form-control-md"
                  placeholder="Email" style="background-color: #D9D9D9;margin-top: 20px" />
              </div>

              <div class="form-outline mt-4 mb-4">
                <input type="password" id="form2Example28" v-model="user.password" class="form-control form-control-md"
                  placeholder="Password" style="background-color: #D9D9D9; margin-top: 20px;" />
              </div>
              <div class="form-outline mt-4 mb-4">
                <input type="password" id="form2Example28" v-model="user.password_confirmation"
                  class="form-control form-control-md" placeholder="Confirm Password"
                  style="background-color: #D9D9D9; margin-top: 20px;" />
              </div>

              <div class="pt-1 mb-4">
                <button class="btn rounded-4 btn-info btn-md btn-block" type="submit"
                  style="background-color: #1050E6; letter-spacing: 2px; margin-top: 20px;">Sign Up</button>
              </div>

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
      title: 'KMN || Registration',
    },
  data() {
    return {
      user: {
        name: '',
        username: '',
        email: '',
        password: '',
        password_confirmation: '',
      },
      errors: null,
    }
  },
  methods: {
    SubmitForm() {
      axios.post('api/registrasi', this.user)
        .then(response => {
          this.$router.push({
            name: 'login',
            params: {
              message: response.data.message
            }
          })
        })
        .catch(error => {
          this.errors = error.response.data.errors;
        });
    }
  }
}
</script>
