<template>
    <footer class="bg-primary-gradient">
        <div class="container py-4 py-lg-5">
            <div class="row justify-content-center">
                <div class="col-sm-4 col-md-3 text-center text-lg-start d-flex flex-column item">
                    <h3 class="fs-6 fw-bold">Layanan</h3>
                    <ul class="list-unstyled">
                        <li><a href="#">Blog</a></li>
                        <li></li>
                        <li></li>
                    </ul>
                </div>
                <div class="col-sm-4 col-md-3 text-center text-lg-start d-flex flex-column item">
                    <h3 class="fs-6 fw-bold">About Us</h3>
                    <ul class="list-unstyled">
                        <li><a href="#">Profil</a></li>
                        <li></li>
                        <li></li>
                        <li></li>
                    </ul>
                </div>
                <div class="col-sm-4 col-md-3 text-center text-lg-start d-flex flex-column item">
                    <h3 class="fs-6 fw-bold">Pusat Bantuan</h3>
                    <ul class="list-unstyled">
                        <li></li>
                        <li></li>
                        <li><a href="#">Hubungi Kami</a></li>
                    </ul>
                </div>
                <div class="col-sm-4 col-md-3 text-center text-lg-start d-flex flex-column item">
                    <h3 class="fs-6 fw-bold">Legal</h3>
                    <ul class="list-unstyled">
                        <li><a href="#">Ketentuan Penggunaan</a></li>
                        <li><a href="#">Kebijakan Privasi</a></li>
                        <li><a href="#">Kebijakan Cookie</a></li>
                        <li></li>
                    </ul>
                </div>
            </div>
            <hr>
            <div class="text-muted d-flex justify-content-between align-items-center pt-3">
                <p class="mb-0">© 2022 Kelompok 2. All Rights Reserved.<br></p>
                <ul class="list-inline mb-0">
                    <li class="list-inline-item"></li>
                    <li class="list-inline-item"></li>
                    <li class="list-inline-item"></li>
                </ul>
            </div>
        </div>
    </footer>
</template>

<script>
    export default {
        name: 'footers',
        mounted() {
            console.log('Footer component mounted.')
        }
    }
</script>