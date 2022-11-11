<template>
    <section class="py-5">
        <div class="container">
            <div class="row" style="--bs-success: #7ed321;--bs-success-rgb: 126,211,33;">
                <div v-for='posts in this.$store.state.marketpost' :key="posts.id" class="col-md-4" style="margin-bottom: 27px;">
                    <div class="card">
                        <div class="card-body border rounded">
                            <div class="row">
                                <div class="col-md-12 d-block"><img class="img-fluid" src="/assets/img/loan_card_background%20(1).webp" width="100%" height="auto"></div>
                            </div>
                                <div v-if="posts.score == 'A' || posts.score == 'A+'" class="card bg-success" style="position: absolute;margin-top: -145px;width: 254px;height: 60.6px;margin-left: 64px;">
                                    <div class="card-body">
                                        <h4 class="fw-bold text-center text-light card-title text-uppercase">{{posts.score}} | {{posts.value}}% p.a</h4>
                                    </div>
                                </div>
                                <div v-else-if="posts.score == 'B'" class="card bg-warning" style="position: absolute;margin-top: -145px;width: 254px;height: 60.6px;margin-left: 64px;">
                                    <div class="card-body">
                                        <h4 class="fw-bold text-center text-light card-title text-uppercase">{{posts.score}} | {{posts.value}}% p.a</h4>
                                    </div>
                                </div>
                                <div v-else class="card bg-danger" style="position: absolute;margin-top: -145px;width: 254px;height: 60.6px;margin-left: 64px;">
                                    <div class="card-body">
                                        <h4 class="fw-bold text-center text-light card-title text-uppercase">{{posts.score}} | {{posts.value}}% p.a</h4>
                                    </div>
                                </div>
                            <div class="card">
                                <div class="card-body">
                                    <h6 class="fw-semibold card-title">Sisa pendanaan</h6>
                                    <div class="progress" style="margin-bottom: 10px;">
                                        <div class="progress-bar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h6 class="fw-semibold text-muted mb-2" style="font-size: 14px;">Terkumpul Rp. {{ posts.pinjaman_terkumpul }} jt</h6>
                                        </div>
                                        <div class="col-md-6">
                                            <h6 class="text-end text-muted mb-2" style="font-size: 14px;">{{ posts.jangka_waktu }} hari lagi</h6>
                                        </div>
                                    </div>
                                    <hr style="width: 350px;">
                                    <div class="row" style="margin-bottom: 10px;width: 377.987px;">
                                        <div class="col-md-6">
                                            <h6 class="fw-bolder text-muted mb-2" style="font-size: 14px;">Nama Perusahaan</h6>
                                            <h6 class="fw-semibold text-muted mb-2 text-uppercase" style="font-size: 16px;">{{ posts.nama_perusahaan }}</h6>
                                        </div>
                                        <div class="col-md-6">
                                            <h6 class="fw-bolder text-muted mb-2" style="font-size: 14px;">Industri</h6>
                                            <h6 class="fw-semibold text-muted mb-2 text-capitalize" style="font-size: 16px;">{{ posts.industri }}</h6>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-bottom: 10px;width: 377.987px;">
                                        <div class="col-md-6">
                                            <h6 class="fw-bolder text-muted mb-2" style="font-size: 14px;">Jumlah Pinjaman</h6>
                                            <h6 class="fw-semibold text-muted mb-2" style="font-size: 16px;">Rp. {{ posts.jumlah_pinjaman }}</h6>
                                        </div>
                                        <div class="col-md-6">
                                            <h6 class="fw-bolder text-muted mb-2" style="font-size: 14px;">Metode Pengembalian</h6>
                                            <h6 class="fw-semibold text-muted mb-2 text-capitalize" style="font-size: 16px;">{{ posts.metode_pengembalian }}</h6>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-bottom: 10px;width: 377.987px;">
                                        <div class="col-md-6">
                                            <h6 class="fw-bolder text-muted mb-2" style="font-size: 14px;">Jatuh Tempo</h6>
                                            <h6 class="fw-semibold text-muted mb-2" style="font-size: 16px;">{{ posts.jatuh_tempo }}</h6>
                                        </div>
                                        <div class="col-md-6">
                                            <h6 class="fw-bolder text-muted mb-2" style="font-size: 14px;">Jangka Waktu</h6>
                                            <h6 class="fw-semibold text-muted mb-2" style="font-size: 16px;">{{ posts.jangka_waktu }} hari</h6>
                                        </div>
                                    </div>
                                    <hr style="width: 350px;">
                                    <div class="text-center" style="--bs-success: #7ed321;--bs-success-rgb: 126,211,33;">
                                        <button class="btn btn-success text-capitalize border rounded" type="button" style="width: 233.387px;--bs-success-rgb: 126,211,33;--bs-secondary-rgb: 126,211,33;background: #7ed321; margin-bottom: 10px;" @click="danaiPost(posts.id)">danai</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    export default {
        name: 'marketcampaign',
        data() {
            return {
                quote: {
                    name: null,
                    detail: null
                }
            }
        },
        created() {
            this.getRandomQuotes()
            // this.openLoading()
            this.axios
                .get('/api/marketplaces')
                .then(response => {
                    this.$store.commit("addMarketPost", response.data)
                })
                .catch(error => console.log(error))
        },
        methods: {
            openLoading() {
                const loading = this.$vs.loading({
                    type: this.$store.state.loadingType,
                    text: this.$store.state.loadingText,
                    color: this.$store.state.loadingColor
                })
                setTimeout(() => {
                    loading.close()
                }, this.$store.state.loadingTime)
            },

            danaiPost(id) {
                this.$router.push(`/marketplace/detail/${id}`)
                window.scrollTo(0, 0)
            },

            getRandomQuotes() {
                const options = {
                    method: 'GET',
                    url: 'https://quotes15.p.rapidapi.com/quotes/random/',
                    headers: {
                        'X-RapidAPI-Key': '0c10fef84cmsh08f6e77cd0db8e9p16f45fjsnba923a24407c',
                        'X-RapidAPI-Host': 'quotes15.p.rapidapi.com'
                    }
                }
                this.axios.request(options)
                    .then(response => {
                        this.quote.detail = `“${response.data.content}”`
                        this.quote.name = `- ${response.data.originator.name}`
                        this.openNotify()
                    })
                    .catch(error => console.log(error))
            },

            openNotify() {
                this.$store.commit("addQuoteText", this.quote.detail)
                this.$store.commit("addQuoteOrigin", this.quote.name)

                this.$vs.notification({
                    title: this.$store.state.quoteText,
                    color: this.$store.state.quoteColor,
                    // border: this.$store.state.quoteBorder,
                    position: this.$store.state.quotePosition,
                    progress: this.$store.state.quoteProgress,
                    duration: this.$store.state.quoteDuration,
                    text: this.$store.state.quoteOrigin
                })
            }
        },
    }

</script>