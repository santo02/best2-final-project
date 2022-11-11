<template>
    <section class="py-5 mt-5">
        <div class="container py-5">
            <div class="row">
                <div class="col-md-8 col-xl-6 text-center mx-auto" style="width: 1001px;">
                    <h4 class="fw-bold" style="margin-bottom: 20px;">Pelajari dan danai berbagai pinjaman sesuai preferensi Anda</h4>
                    <button class="btn btn-primary text-capitalize border rounded" type="button" style="background: #7ed321;" @click="addMarketplace">tambah data</button>
                    <button class="btn btn-primary text-capitalize border rounded" type="button" @click="editMarketplace">edit data</button>
                </div>
            </div>
        </div>
    </section>
</template>
<script>
    export default {
        name: 'marketheader',
        methods: {
            addPost() {
                this.axios
                    .post('/api/marketplaces/add', this.post)
                    .then(response => (
                        this.$router.push("/marketplace").catch(()=>{})
                    ))
                    .catch(error => console.log(error))
            },
            addMarketplace() {
                this.$router.push("/marketplace/add")
                window.scrollTo(0, 0)
            },
            editMarketplace() {
                this.$router.push("/marketplace/edit")
                window.scrollTo(0, 0)
            }
        }
    }
</script>