<template>
    <section class="py-5 mt-5">
      <div class="container py-5">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <router-link to="company-admin">
                <a>Company</a>
              </router-link>
            </li>
            <li class="breadcrumb-item">
              <router-link to="company-update">
                <a>Update Company</a>
              </router-link>
            </li>

          </ol>
        </nav>
        <div class="card">
          <h3 class="text-center mb-4">Update Company</h3>
          <div class="card p-3" style="border-width: 3px;border-style: dashed;">
            <div class="card-body">
              <form class="text-start" @submit.prevent="editCompany" enctype="multipart/form-data">
                <div class="mb-3">
                  <label class="form-label">Choose Image</label>
                  <input @change="handleFileUpload()" ref="file" class="form-control" type="file" required>
                </div>
                <div class="mb-3">
                  <label class="form-label">Nama Company</label>
                  <input @input="sanitizeTitle(companies.company_name)" class="form-control" type="text" v-model="companies.company_name"
                    required>
                </div>
                <div class="mb-3">
                  <label class="form-label">Slug</label>
                  <input class="form-control" type="text" v-model="companies.company_slug" readonly>
                </div>
                <div class="mb-3 mt-5">
                  <button class="btn btn-primary d-block w-100" type="submit">Submit</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </template>

  <script>
  export default {
    name: "AddCompanies",
    data() {
      return {
        companies: {},
        file: ''
      }
    },
    mounted() {
      this.getCompany(this.$route.params.id)
    },
    methods: {
      getCompany(id) {
        axios.get(`/api/companies/find/${id}`)
        .then(response => {
          console.log(response.data)
          this.companies = response.data
        })
        .catch(error => {
          console.log(error)
        });
      },
      sanitizeTitle(title) {
        var slug = ""
        var titleLower = title.toLowerCase()
        slug = titleLower.replace(/\s*$/g, '')
        slug = slug.replace(/\s+/g, '-')
        slug = slug.replace("‘", '')
        slug = slug.replace("’", '')
        slug = slug.replace("'", '')
        slug = slug.replace("\'", '')
        slug = slug.replace('"', '')
        slug = slug.replace('\"', '')
        slug = slug.replace('#', '')
        slug = slug.replace(',', '')
        slug = slug.replace('.', '')
        slug = slug.replace('[', '')
        slug = slug.replace(']', '')
        slug = slug.replace('{', '')
        slug = slug.replace('}', '')
        slug = slug.replace('|', '')
        slug = slug.replace('+', '')
        slug = slug.replace(':', '')
        return this.companies.company_slug = slug
      },
      editCompany() {
        this.user = JSON.parse(localStorage.getItem('user'))
        this.isLoggedIn = localStorage.getItem('token') != null

        let formData = new FormData()
        formData.append('id', this.$route.params.id)
        formData.append('company_name', this.companies.company_name)
        formData.append('file', this.file)
        formData.append('company_slug', this.companies.company_slug)
        this.axios({
          url: '/api/companies/edit',
          method: 'post',
          data: formData,
          headers: {
            'Content-Type': 'multipart/form-data',
            'Acces-Control-Allow-Origin': '*',
          }
          }).then(response => (
              this.$router.push({ name: 'home' })
          )).catch(err => console.log(err))
      },
      handleFileUpload() {
        this.file = this.$refs.file.files[0];
        console.log(this.file);
      }
    }


  }
  </script>
