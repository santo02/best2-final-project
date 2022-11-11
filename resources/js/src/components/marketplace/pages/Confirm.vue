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
                                                <h1 style="font-size: 19px;font-weight: bold;margin-bottom: 35px;">Edit data</h1>
                                            </div>
                                            <div style="margin-top: -36px;border-color: var(--bs-card-cap-bg);margin-bottom: 11px;border-radius: 8px;">
                                                <hr style="width: 138px;margin-top: 0px;color: var(--bs-blue);border-radius: 32px;border-width: 5px;">
                                            </div>
                                            <form @submit.prevent="addPost" class="text-center" style="width: 365px;">
                                                <div class="text-start" style="margin-bottom: 5px;">
                                                    <!-- <label class="form-label" style="font-size: 16px;margin-bottom: 0px;">Loan ID</label> -->
                                                    <input class="form-control" v-model="post.post_id" type="text" hidden>
                                                </div>
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
                                                    <input class="form-control" type="number" min="0" v-model="post.pinjaman" required>
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
                                                    <input class="form-control" type="number" min="0" max="1000" v-model="post.waktu" required>
                                                </div>
                                                <div class="text-start" style="margin-bottom: 20px;">
                                                    <label class="form-label" style="font-size: 16px;margin-bottom: 0px;">Jatuh Tempo</label>
                                                    <input class="form-control" type="date" v-model="post.jatuh_tempo" style="margin-top: 0px;margin-bottom: 10px;" required>
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
        name: 'edititems',
        data() {
            return {
                risk: [],
                post: {
                    post_id: null,
                    keberhasilan: null,
                    perusahaan: null,
                    industri: null,
                    pinjaman: null,
                    mtd_pengembalian: null,
                    waktu: null
                }
            }
        },
        created() {
            this.axios
                .get('/api/marketplaces/risk')
                .then(response => {
                    this.risk = response.data;
                })
            this.axios
                .get(`/api/marketplaces/find/${this.$route.params.id}`)
                .then(response => {
                    // this.market = response.data;
                    // this.post.post_id = this.$route.params.id;
                    // console.log(response.data.data)
                    this.post.post_id = response.data.data.id
                    this.post.keberhasilan = response.data.data.tingkat_keberhasilan
                    this.post.perusahaan = response.data.data.nama_perusahaan
                    this.post.industri = response.data.data.industri
                    this.post.pinjaman = response.data.data.jumlah_pinjaman
                    this.post.mtd_pengembalian = response.data.data.metode_pengembalian
                    this.post.waktu = response.data.data.jangka_waktu
            })
            this.openLoading()
        },
        methods: {
            openLoading() {
                const loading = this.$vs.loading({
                    type: this.$store.state.loadingType,
                    text: this.$store.state.loadingText,
                    color: this.$store.state.loadingColor,
                    // background: this.$store.state.loadingBgcolor,
                })
                setTimeout(() => {
                    loading.close()
                }, this.$store.state.loadingTime)
            },
            addPost() {
                this.axios
                    .post('/api/marketplaces/update', this.post)
                    .then(response => (
                        this.$router.push("/marketplace/all").catch(()=>{})
                    ))
                    .catch(error => console.log(error))
            }
        }
    }
</script>