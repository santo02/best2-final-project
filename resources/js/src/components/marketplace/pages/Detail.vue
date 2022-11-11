<template>
    <section class="py-5 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="card" style="margin-top: 45px;border-radius: 1px;border-top-left-radius: 10px;border-top-right-radius: 10px;border-bottom-right-radius: 10px;border-bottom-left-radius: 10px;border-width: 3px;border-style: dashed;">
                        <div class="card-body"><img class="img-fluid" src="/assets/img/loan_card_background%20(1).webp" width="874" height="574">
                            <div class="col" style="margin-left: 100px;margin-right: 100px;padding-top: 23px;position: relative;">
                                <div v-if="post.score == 'A' || post.score == 'A+'" class="card bg-success" style="border-width: 0px;position: absolute;width: 100%;top: -850%;">
                                    <div class="card-body text-nowrap text-white" style="position: relative;">
                                        <h4 class="fw-bold text-center card-title">{{post.score}} | {{post.score_percent}}%</h4>
                                    </div>
                                </div>
                                <div v-else-if="post.score == 'B'" class="card bg-warning" style="border-width: 0px;position: absolute;width: 100%;top: -850%;">
                                    <div class="card-body text-nowrap text-white" style="position: relative;">
                                        <h4 class="fw-bold text-center card-title">{{post.score}} | {{post.score_percent}}%</h4>
                                    </div>
                                </div>
                                <div v-else class="card bg-danger" style="border-width: 0px;position: absolute;width: 100%;top: -850%;">
                                    <div class="card-body text-nowrap text-white" style="position: relative;">
                                        <h4 class="fw-bold text-center card-title">{{post.score}} | {{post.score_percent}}%</h4>
                                    </div>
                                </div>
                                <p class="text-nowrap fw-bold text-center" style="position: absolute;margin-top: -120px;width: 100%;">Retail Buyer Financing</p>
                                <p class="text-nowrap fw-normal text-center" style="position: absolute;margin-top: -250px;width: 100%;">Imba Hasil</p>
                                <p class="text-nowrap fw-normal text-center" style="position: absolute;margin-top: -140px;width: 100%;">Produk</p>
                            </div>
                            <p style="margin-bottom: 10px;margin-top: -16px;">Sisa Pendanaan</p>
                            <div class="progress d-block">
                                <div class="progress-bar progress-bar-striped progress-bar-animated" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;">0%</div>
                            </div>
                            <div class="row" style="margin-top: 5px;">
                                <div class="col-auto">
                                    <p class="fw-normal"><strong><span style="color: rgb(78, 93, 120);">Rp. 0 jt lagi</span></strong><br></p>
                                </div>
                                <div class="col text-end">
                                    <p class="fw-normal">Sisa {{post.waktu}} hari lagi</p>
                                </div>
                            </div>
                            <hr style="margin-top: -1px;">
                            <div class="col" style="margin-top: -10px;">
                                <div class="row">
                                    <div class="col-auto">
                                        <p class="fw-normal">Nama Peminjam</p>
                                    </div>
                                    <div class="col text-end">
                                        <p class="fw-normal">Industri</p>
                                    </div>
                                </div>
                                <div class="row" style="margin-top: -20px;">
                                    <div class="col-auto">
                                        <p class="fw-semibold">{{post.perusahaan}}</p>
                                    </div>
                                    <div class="col text-end">
                                        <p class="fw-semibold">{{post.industri}}</p>
                                    </div>
                                </div>
                                <div class="row" style="margin-top: -10px;">
                                    <div class="col-auto">
                                        <p class="fw-normal">Jumlah Pinjaman</p>
                                    </div>
                                    <div class="col text-end">
                                        <p class="fw-normal">Metode Pengembalian</p>
                                    </div>
                                </div>
                                <div class="row" style="margin-top: -20px;">
                                    <div class="col-auto">
                                        <p class="fw-semibold">Rp. {{post.pinjaman}}</p>
                                    </div>
                                    <div class="col text-end">
                                        <p class="fw-semibold">{{post.mtd_pengembalian}}</p>
                                    </div>
                                </div>
                                <div class="row" style="margin-top: -10px;">
                                    <div class="col-auto">
                                        <p class="fw-normal">Jatuh tempo</p>
                                    </div>
                                    <div class="col text-end">
                                        <p class="fw-normal"><span style="color: rgb(74, 74, 74);">Jangka Waktu</span><br></p>
                                    </div>
                                </div>
                                <div class="row" style="margin-top: -20px;margin-bottom: -27px;">
                                    <div class="col-auto">
                                        <p class="fw-semibold"><strong>{{post.jatuh_tempo}}</strong></p>
                                    </div>
                                    <div class="col text-end">
                                        <p class="fw-semibold">{{post.waktu}} hari</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <section class="position-relative py-4 py-xl-5">
                        <div class="container">
                            <div class="row d-flex justify-content-center">
                                <div class="col-md-6 col-xl-4" style="width: 543px;margin-top: 0px;">
                                    <div class="card mb-5">
                                        <div class="card-body d-flex flex-column align-items-center">
                                            <div>
                                                <h1 style="font-size: 19px;font-weight: bold;margin-bottom: 35px;">Kalkulator Imbal Hasil</h1>
                                            </div>
                                            <div style="margin-top: -36px;border-color: var(--bs-card-cap-bg);margin-bottom: 11px;border-radius: 8px;">
                                                <hr style="width: 138px;margin-top: 0px;color: var(--bs-blue);border-radius: 32px;border-width: 5px;">
                                            </div>
                                            <form @submit.prevent="calculator" class="text-center" style="width: 415px;">
                                                <div class="text-start" style="margin-bottom: 5px;padding-bottom: 15px;">
                                                    <label class="form-label" style="font-size: 16px;margin-bottom: 0px;">Jumlah pendanaan anda</label>
                                                    <input class="form-control" v-model="post.pendanaan" min="1000000" type="number" style="border-top-left-radius: 0px;border-top-right-radius: 0px;border-bottom-right-radius: 0px;border-bottom-left-radius: 0px;" required>
                                                </div>
                                                <div class="mb-3">
                                                    <button class="btn btn-success d-block w-100" style="border-top-left-radius: 0px;border-top-right-radius: 0px;border-bottom-right-radius: 0px;border-bottom-left-radius: 0px;">HITUNG</button>
                                                </div>
                                                <hr style="border-radius: 5px;border-width: 1px;">
                                                <div>
                                                    <div class="row" style="margin-top: -10px;">
                                                        <div class="col-auto col-md-6 text-start" style="height: 60px;">
                                                            <p class="fw-bold">Tingkat Resiko</p>
                                                        </div>
                                                        <div class="col text-end" style="height: 60px;">
                                                            <p class="fw-bold">{{post.score}} | {{post.score_percent}}% p.a</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr style="border-radius: 5px;border-width: 1px;margin-top: -5px;">
                                                <div>
                                                    <div class="row" style="margin-top: -10px;">
                                                        <div class="col-auto col-md-6">
                                                            <p class="fw-bold text-start">Jangka waktu</p>
                                                        </div>
                                                        <div class="col">
                                                            <p class="fw-bold text-end">{{post.waktu}} hari</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div style="width: 453px;margin-left: -16px;">
                                                    <div class="card">
                                                        <div class="card-body" style="margin-right: 7px;"><img class="img-fluid" src="/assets/img/loan_mini_background.webp">
                                                            <div class="text-nowrap" style="font-size: 14px;position: absolute;margin-top: -70px;margin-left: 60px;">
                                                                <p class="fw-normal text-start">Proyeksi Imba Hasil</p>
                                                            </div>
                                                            <div class="text-nowrap" style="position: absolute;margin-top: -45px;margin-left: 60px;">
                                                                <p class="fw-bold text-start" style="font-size: 19px;">Rp. {{this.$store.getters.formattedCost}}</p>
                                                            </div>
                                                            <p class="text-start" style="font-size: 12px;margin-top: 45px;"><em><span style="color: rgb(33, 37, 41);">*) Simulasi bersifat proyeksi. Besar total pengembalian pendanaan mengacu kepada dokumen persetujuan pendanaan.</span></em><br></p>
                                                        </div>
                                                    </div>
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
        name: 'marketcampaigndetail',
        data() {
            return {
                post: {
                    id: null,
                    keberhasilan: null,
                    perusahaan: null,
                    score: null,
                    score_percent: null,
                    industri: null,
                    pinjaman: null,
                    mtd_pengembalian: null,
                    waktu: null,
                    jatuh_tempo: null
                }
            }
        },
        created() {
            this.resetCalc()
            this.axios
                .get(`/api/marketplaces/find/${this.$route.params.id}`)
                .then(response => {
                    // this.market = response.data;
                    // this.post.post_id = this.$route.params.id;
                    // console.log(response.data.data[0])
                    this.post.id = response.data.data.id
                    this.post.keberhasilan = response.data.data.tingkat_keberhasilan
                    this.post.perusahaan = response.data.data.nama_perusahaan
                    this.post.industri = response.data.data.industri
                    this.post.pinjaman = response.data.data.jumlah_pinjaman
                    this.post.mtd_pengembalian = response.data.data.metode_pengembalian
                    this.post.waktu = response.data.data.jangka_waktu
                    this.post.jatuh_tempo = response.data.data.jatuh_tempo
                    this.post.score = response.data.data.score
                    this.post.score_percent = response.data.data.value
            })
        },
        methods: {
            resetCalc() {
                this.$store.commit("addCountedNumber", '0')
            },
            calculator() {
                this.axios
                    .post('/api/marketplaces/calc', this.post)
                    .then(response => (
                        this.$store.commit("addCountedNumber", response.data.result)
                    ))
                    .catch(error => console.log(error))
            }
        }
    }
</script>