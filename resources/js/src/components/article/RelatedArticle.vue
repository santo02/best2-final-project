<template>
    <div class="container">
        <h3 class="my-4">Related Articles<br></h3>
        <div class="row">
            <div class="col-sm-6 col-md-3 mb-4"><a href="#"><img class="img-fluid" src="assets/img/Logo.png">
                    <p>Judul 1</p>
                </a></div>
            <div class="col-sm-6 col-md-3 mb-4"><a href="#"><img class="img-fluid" src="assets/img/MBKM_02.jpg">
                    <p>Judul 2</p>
                </a></div>
            <div class="col-sm-6 col-md-3 mb-4"><a href="#"><img class="img-fluid" src="assets/img/Investree_Campaign_My-First-september_Promo-page-1500x500_c.webp">
                    <p>Judul 3</p>
                </a></div>
            <div class="col-sm-6 col-md-3 mb-4"><a href="#"><img class="img-fluid" src="assets/img/ojk.webp">
                    <p>Judul 4</p>
                </a></div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'related-article',
        mounted() {
            console.log('Related Article component mounted.')
        }
    }
</script>