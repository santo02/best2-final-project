<template>
  <section class="py-5 mt-5">
    <div class="container py-5">
        <div class="card">
                <h3 class="text-center mb-4">Tambah Company Baru</h3>
                <div class="card p-3" style="border-width: 3px;border-style: dashed;">
                    <div class="card-body">
                        <form class="text-start" @submit.prevent="addCompany" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label class="form-label">Choose Image</label>
                                <input @change="handleFileUpload()" ref="file" class="form-control" type="file">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Nama Company</label>
                                <input class="form-control" type="text" v-model="company_name">
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
                    company_name:'',
                    file:''
                }
            },
        


        methods: {
            addCompany() {
                let formData =  new FormData();

                formData.append('file', this.file);
                formData.append('company_name', this.company_name);

                console.log(this.file);

                this.axios({
                    url: '/api/companies',
                    method: 'post',
                    data: formData,
                    headers: {
                        'Content-Type' : 'multipart/form-data',
                        'Acces-Control-Allow-Origin' : '*',
                    }
                }).then(response => (
                        this.$router.push({ name: 'home' })
                    ))
                    .catch(err => console.log(err))
            },
            
            handleFileUpload(){
                this.file = this.$refs.file.files[0];
                console.log(this.file);
            }
        }

     
}
</script>


