<template>
    <section class="py-5 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6"><img class="img-fluid" src="/assets/img/login_wallpaper.jpg"></div>
                <div class="col-md-6">
                    <section class="position-relative py-4 py-xl-5">
                        <div class="container">
                            <div class="row d-flex justify-content-center">
                                <div class="col-md-6 col-xl-4" style="width: 543px;margin-top: -49px;">
                                    <div class="card mb-5">
                                        <div class="card-body d-flex flex-column align-items-center">
                                            <div>
                                                <h1 style="font-size: 19px;font-weight: bold;margin-bottom: 35px;">Tambah data</h1>
                                            </div>
                                            <div style="margin-top: -36px;border-color: var(--bs-card-cap-bg);margin-bottom: 11px;border-radius: 8px;">
                                                <hr style="width: 138px;margin-top: 0px;color: var(--bs-blue);border-radius: 32px;border-width: 5px;">
                                            </div>
                                            <form @submit.prevent="addPost" class="text-center" style="width: 365px;">
                                                <div class="text-start" style="margin-bottom: 5px;"><label class="form-label" style="font-size: 16px;margin-bottom: 0px;">Tingkat Keberhasilan</label>
                                                    <select class="form-select" style="margin-bottom: 0px;" v-model="post.keberhasilan" required>
                                                        <optgroup label="Silahkan pilih..">
                                                            <option v-for='risks in risk' :value="risks.risk_id">{{ risks.value }}%</option>
                                                        </optgroup>
                                                    </select>
                                                </div>
                                                <div class="text-start" style="margin-bottom: 5px;">
                                                    <label class="form-label" style="font-size: 16px;margin-bottom: 0px;">Nama Perusahaan</label>
                                                    <input class="form-control" type="text" v-model="post.perusahaan" required>
                                                </div>
                                                <div class="text-start" style="margin-bottom: 5px;">
                                                    <label class="form-label" style="font-size: 16px;margin-bottom: 0px;">Jenis Industri</label>
                                                    <input class="form-control" type="text" v-model="post.industri" required>
                                                </div>
                                                <div class="text-start" style="margin-bottom: 5px;">
                                                    <label class="form-label" style="font-size: 16px;margin-bottom: 0px;">Jumlah Pinjaman</label>
                                                    <input class="form-control" type="number" min="1000000" v-model="post.pinjaman" required>
                                                </div>
                                                <div class="text-start" style="margin-bottom: 5px;">
                                                    <label class="form-label" style="font-size: 16px;margin-bottom: 0px;">Metode Pengembalian</label>
                                                    <select class="form-select" v-model="post.mtd_pengembalian" style="margin-bottom: 0px;" required>
                                                        <optgroup label="Silahkan pilih metode pengembalian..">
                                                            <option value="Cicilan perbulan">Cicilan perbulan</option>
                                                            <option value="Cicilan pertahun">Cicilan pertahun</option>
                                                        </optgroup>
                                                    </select>
                                                </div>
                                                <div class="text-start" style="margin-bottom: 5px;">
                                                    <label class="form-label" style="font-size: 16px;margin-bottom: 0px;">Jangka Waktu</label>
                                                    <input class="form-control" type="number" min="1" max="360" v-model="post.waktu" required>
                                                </div>
                                                <div class="text-start" style="margin-bottom: 20px;">
                                                    <label class="form-label" style="font-size: 16px;margin-bottom: 0px;">Jatuh Tempo</label>
                                                    <input v-on:keyup.enter="submitUsingEnter" class="form-control" type="date" v-model="post.jatuh_tempo" style="margin-top: 0px;margin-bottom: 10px;" required>
                                                </div>
                                                <div class="mb-3">
                                                    <button class="btn btn-primary d-block w-100" type="submit">Simpan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    export default {
        name: 'additems',
        data() {
            return {
                risk: [],
                post: {}
            }
        },
        created() {
            this.axios
                .get('/api/marketplaces/risk')
                .then(response => {
                    this.risk = response.data;
                })
        },
        methods: {
            addPost() {
                this.axios
                    .post('/api/marketplaces/add', this.post)
                    .then(response => (
                        this.$router.push("/marketplace/all").catch(()=>{})
                    ))
                    .catch(error => console.log(error))
            },
            submitUsingEnter: function() {
                addPost()
            }
        }
    }
</script>