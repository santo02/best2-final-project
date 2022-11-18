<template>
    <div class="container" style="margin-top: 91px;">
        <div class="row">
            <div class="col" style="overflow: auto;display: block;position: static;width: 971px;">
                <div class="row">
                    <div class="col-md-10 offset-md-1" style="margin-left: 0px;">
                        <div class="card m-auto" style="max-width: 850px;width: 902.7px;">
                            <div class="card-body">
                                <form class="d-flex align-items-center">
                                    <i class="fas fa-search d-none d-sm-block h4 text-body m-0" style="width: 47px;"></i>
                                    <input class="form-control form-control-sm flex-shrink-1 form-control-borderless" type="search" placeholder="Search topics or keywords..." name="query">
                                    <button class="btn btn-outline-primary" type="submit" style="margin-bottom: -6px;padding-top: 0.8px;padding-bottom: 0.8px;padding-right: 12px;padding-left: 13px;">Search</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div style="padding-bottom: 10px;">
                    <div class="card" style="border-radius: 10px;border-width: 3px;border-color: var(--bs-card-cap-bg);">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-auto"><img class="img-fluid" src="assets/img/MBKM_02.jpg" width="500px" loading="lazy"></div>
                                <div class="col">
                                    <div class="row" style="margin-bottom: -15px;padding-top: 7px;max-height: 60px;">
                                        <div class="col text-start" style="width: 161.75px;"><img class="rounded-circle img-fluid" src="assets/img/OIP.jpeg" height="30px" width="30px">
                                            <p class="fw-normal" style="margin-top: -23px;margin-left: 40px;">Rafie Akmal Haryanto</p>
                                        </div>
                                    </div>
                                    <h5>Merdeka Belajar untuk seluruh mahasiswa Indonesia</h5>
                                    <p style="margin-top: 5px;">Nullam id dolor id nibh ultricies vehicula ut id elit. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus.</p>
                                    <div class="row">
                                        <div class="col"><img class="img-fluid" src="assets/img/d228d012b5f3852abb2b66d9da526801.jpg" width="20px" height="20px">
                                            <p style="margin-top: -21px;margin-left: 28px;">12 Januari 2022</p>
                                        </div>
                                        <div class="col text-end"><img class="img-fluid" src="assets/img/OIP%20(1).jpeg" width="20px" height="20px">
                                            <p style="margin-top: -21px;margin-left: 0px;margin-right: 31px;">20 Komentar</p>
                                        </div>
                                    </div><button class="btn btn-outline-primary btn-sm" @click="detailPost()" type="button" style="margin-top: -15px;border-radius: 8px;">Detail</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div style="padding-bottom: 10px;">
                    <div class="card" style="border-radius: 10px;border-width: 3px;border-color: var(--bs-card-cap-bg);">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-auto"><img class="img-fluid" src="assets/img/Logo.png" width="500px" loading="lazy"></div>
                                <div class="col">
                                    <div class="row" style="margin-bottom: -15px;padding-top: 7px;max-height: 60px;">
                                        <div class="col text-start" style="width: 161.75px;"><img class="rounded-circle img-fluid" src="assets/img/OIP.jpeg" height="30px" width="30px">
                                            <p class="fw-normal" style="margin-top: -23px;margin-left: 40px;">Rafie Akmal Haryanto</p>
                                        </div>
                                    </div>
                                    <h5>Merdeka Belajar untuk seluruh mahasiswa Indonesia</h5>
                                    <p style="margin-top: 5px;">Nullam id dolor id nibh ultricies vehicula ut id elit. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus.</p>
                                    <div class="row">
                                        <div class="col"><img class="img-fluid" src="assets/img/d228d012b5f3852abb2b66d9da526801.jpg" width="20px" height="20px">
                                            <p style="margin-top: -21px;margin-left: 28px;">12 Januari 2022</p>
                                        </div>
                                        <div class="col text-end"><img class="img-fluid" src="assets/img/OIP%20(1).jpeg" width="20px" height="20px">
                                            <p style="margin-top: -21px;margin-left: 0px;margin-right: 31px;">20 Komentar</p>
                                        </div>
                                    </div><button class="btn btn-outline-primary btn-sm" @click="detailPost()" type="button" style="margin-top: -15px;border-radius: 8px;">Detail</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div style="padding-bottom: 10px;">
                    <div class="card" style="border-radius: 10px;border-width: 3px;border-color: var(--bs-card-cap-bg);">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-auto"><img class="img-fluid" src="assets/img/Investree_Campaign_My-First-september_Promo-page-1500x500_c.webp" width="500px" loading="lazy"></div>
                                <div class="col">
                                    <div class="row" style="margin-bottom: -15px;padding-top: 7px;max-height: 60px;">
                                        <div class="col text-start" style="width: 161.75px;"><img class="rounded-circle img-fluid" src="assets/img/OIP.jpeg" height="30px" width="30px">
                                            <p class="fw-normal" style="margin-top: -23px;margin-left: 40px;">Rafie Akmal Haryanto</p>
                                        </div>
                                    </div>
                                    <h5>Merdeka Belajar untuk seluruh mahasiswa Indonesia</h5>
                                    <p style="margin-top: 5px;">Nullam id dolor id nibh ultricies vehicula ut id elit. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus.</p>
                                    <div class="row">
                                        <div class="col"><img class="img-fluid" src="assets/img/d228d012b5f3852abb2b66d9da526801.jpg" width="20px" height="20px">
                                            <p style="margin-top: -21px;margin-left: 28px;">12 Januari 2022</p>
                                        </div>
                                        <div class="col text-end"><img class="img-fluid" src="assets/img/OIP%20(1).jpeg" width="20px" height="20px">
                                            <p style="margin-top: -21px;margin-left: 0px;margin-right: 31px;">20 Komentar</p>
                                        </div>
                                    </div><button class="btn btn-outline-primary btn-sm" @click="detailPost()" type="button" style="margin-top: -15px;border-radius: 8px;">Detail</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div style="padding-bottom: 10px;">
                    <div class="card" style="border-radius: 10px;border-width: 3px;border-color: var(--bs-card-cap-bg);">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-auto"><img class="img-fluid" src="assets/img/investree_home_page_hello.ed24a5f2.webp" width="500px" loading="lazy"></div>
                                <div class="col">
                                    <div class="row" style="margin-bottom: -15px;padding-top: 7px;max-height: 60px;">
                                        <div class="col text-start" style="width: 161.75px;"><img class="rounded-circle img-fluid" src="assets/img/OIP.jpeg" height="30px" width="30px">
                                            <p class="fw-normal" style="margin-top: -23px;margin-left: 40px;">Rafie Akmal Haryanto</p>
                                        </div>
                                    </div>
                                    <h5>Merdeka Belajar untuk seluruh mahasiswa Indonesia</h5>
                                    <p style="margin-top: 5px;">Nullam id dolor id nibh ultricies vehicula ut id elit. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus.</p>
                                    <div class="row">
                                        <div class="col"><img class="img-fluid" src="assets/img/d228d012b5f3852abb2b66d9da526801.jpg" width="20px" height="20px">
                                            <p style="margin-top: -21px;margin-left: 28px;">12 Januari 2022</p>
                                        </div>
                                        <div class="col text-end"><img class="img-fluid" src="assets/img/OIP%20(1).jpeg" width="20px" height="20px">
                                            <p style="margin-top: -21px;margin-left: 0px;margin-right: 31px;">20 Komentar</p>
                                        </div>
                                    </div><button class="btn btn-outline-primary btn-sm" @click="detailPost()" type="button" style="margin-top: -15px;border-radius: 8px;">Detail</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-auto">
                <h2 data-bs-toggle="tooltip" data-bss-tooltip="" title="Silahkan Pilih Kategori">Kategori</h2>
                <hr style="background: #0676dd;border-radius: 18px;border-width: 3px;border-color: rgb(6,118,221);margin-top: -7px;">
                <a href="#">
                    <h6>Pendidikan</h6>
                </a>
                <a href="#">
                    <h6>Teknologi</h6>
                </a>
                <a href="#">
                    <h6>Masyarakat</h6>
                </a>
                <a href="#">
                    <h6>Leadership</h6>
                </a>
                <a href="#">
                    <h6>Lowongan</h6>
                </a>
            </div>
        </div>
    </div>
</template>

<style scoped>
    .form-control-borderless {
        border: none;
    }

    .form-control-borderless:hover, .form-control-borderless:active, .form-control-borderless:focus {
        border: none;
        outline: none;
        box-shadow: none;
    }
</style>

<script>
    export default {
        name: 'articles',
        mounted() {
            console.log('Article component mounted.')
        },
        methods: {
            detailPost() {
                this.$router.push('/detail')
                window.scrollTo(0,0)
            },
        }
    }
</script>