<template>
    <section class="py-5 mt-5">
      <div class="container py-5">
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
                  <input @input="sanitizeTitle(company.company_name)" class="form-control" type="text" v-model="company.company_name"
                    required>
                </div>
                <div class="mb-3">
                  <label class="form-label">Slug</label>
                  <input class="form-control" type="text" v-model="company.company_slug" readonly>
                </div>
  
                <div class="mb-3 mt-5">
                  <button class="btn btn-primary d-block w-100" type="submit">Update</button>
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
        name: "UpdateCompany",
        data() {
            return {
                company: {},
                user: [],
                file: '',
                isLoggedIn: false,
            }
        },
        created() {
            window.scrollTo(0,0)
        },
        methods: {
            handleImageAdded(file, Editor, cursorLocation) {
                var formData = new FormData();
                formData.append('file', file)
                axios({
                    url: '/api/companies/add/image',
                    method: 'POST',
                    headers: {
                    'Content-Type': 'multipart/form-data',
                    'Acces-Control-Allow-Origin': '*',
                    },
                    data: formData
                })
                .then((result) => {
                    let url = result.data.data.url
                    Editor.insertEmbed(cursorLocation, 'image', url);
                })
                .catch((err) => {
                    console.log(err);
                })
            },
            sanitizeTitle(company_name) {
                var slug = ""
                var company_nameLower = company_name.toLowerCase()
                slug = company_nameLower.replace(/\s*$/g, '')
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
                return this.company.company_slug = slug
            },
            getCompanyData() {
                this.axios
                .get(`/api/companies/find/id/${this.$route.params.id}`)
                .then((res) => {
                    this.company = res.data;
                });
            },
            editCompany() {
                this.user = JSON.parse(localStorage.getItem('user'))
                this.isLoggedIn = localStorage.getItem('token') != null

                let formData = new FormData()
                formData.append('id', this.$route.params.id)
                formData.append('company_name', this.company.company_name)
                formData.append('company_image', this.company.company_image)
                formData.append('file', this.file)
                formData.append('company_slug', this.company.company_slug)
                console.log(this.company.id);
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
                ))
                    .catch(err => console.log(err))
            },
            handleFileUpload() {
                this.file = this.$refs.file.files[0];
                console.log(this.file);
            }
        }
    }
    
</script>
