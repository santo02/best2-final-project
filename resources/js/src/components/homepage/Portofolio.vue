<template>
    <section>
        <div class="text-center" style="margin-bottom: 8px;">
            <h2 style="margin-bottom: -18px;"><strong>Portofolio Investree</strong></h2>
        </div>
        <div class="container py-5">
            <div class="mx-auto" style="max-width: 900px;">
                <div class="row row-cols-1 row-cols-md-2 d-flex justify-content-center">
                    <div class="col mb-4">
                        <div class="card bg-primary-light">
                            <div class="card-body text-center px-4 py-5 px-md-5"><img src="assets/img/download%20(6).png" style="margin-bottom: 11px;">
                                <h5 class="fw-bold text-primary card-title mb-3">Rp&nbsp;18,20 T<br></h5>
                                <p class="fw-bold card-text mb-2">Jumlah Fasilitas Pinjaman<br>( Sejak berdiri )</p>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-4">
                        <div class="card bg-secondary-light">
                            <div class="card-body text-center px-4 py-5 px-md-5"><img src="assets/img/download%20(7).png" style="margin-bottom: 11px;">
                                <h5 class="fw-bold text-secondary card-title mb-3">Rp&nbsp;11,85 T<br></h5>
                                <p class="fw-bold card-text mb-2">Nilai Pinjaman Tersalurkan<br>( Sejak berdiri )</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mx-auto" style="max-width: 900px;">
                <div class="row row-cols-1 row-cols-md-2 d-flex justify-content-center">
                    <div class="col mb-4">
                        <div class="card bg-secondary-light">
                            <div class="card-body text-center px-4 py-5 px-md-5"><img src="assets/img/download%20(8).png" style="margin-bottom: 11px;">
                                <h5 class="fw-bold text-secondary card-title mb-3">Rp&nbsp;10,53 T<br></h5>
                                <p class="fw-bold card-text mb-2">Nilai Pinjaman Lunas<br>( Sejak berdiri )</p>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-4">
                        <div class="card bg-primary-light">
                            <div class="card-body text-center px-4 py-5 px-md-5"><img src="assets/img/download%20(9).png" style="margin-bottom: 11px;">
                                <h5 class="fw-bold text-primary card-title mb-3">16,3%<br></h5>
                                <p class="fw-bold card-text mb-2">Rata - Rata Tingkat<br>Imbal Hasil<br></p>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-4">
                        <div class="card bg-info-light">
                            <div class="card-body text-center px-4 py-5 px-md-5"><img src="assets/img/download%20(2).webp" style="margin-bottom: 11px;">
                                <h5 class="fw-bold text-secondary card-title mb-3">Rp&nbsp;1,22 T<br></h5>
                                <p class="fw-bold card-text mb-2">Nilai Pinjaman Outstanding<br></p>
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
        name: 'portofolio',
        mounted() {
            console.log('Portofolio Investree component mounted.')
        }
    }
</script>