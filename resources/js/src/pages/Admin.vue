<template>
  <div>
    <NavBar />
    <Dashboard/>
    <Footers />
  </div>
</template>
<script>
import Footers from '../components/homepage/Footer.vue'
import NavBar from '../components/public/Navbar.vue'
import Dashboard from '../components/admin/Dashboard.vue'
export default {

  metaInfo: {
    title: 'Kampus Merdeka Network || Admin Page',
  },
  components: { NavBar, Footers, Dashboard},
  name: 'home',
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
        // console.log(this.user)
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
