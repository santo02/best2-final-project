<template>
    <header>
        <nav class="navbar navbar-expand-md navbar-light fixed-top bg-light navbar-shrink py-3">
            <div class="container">
                <a class="navbar-brand d-flex align-items-center" href="/">
                    <img :src="kampusMerdekaNetwork" width="130px" height="40px"  style="margin-right: 14px;">
                </a>
                <button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navcol-1">
                    <ul class="navbar-nav mx-auto" style="font-size: 14px;margin-top: 3px;">
                        <li class="nav-item">
                            <router-link
                                class="nav-link"
                                :to="{name: 'article-page'}" >
                                Home
                            </router-link>
                        </li>
                    </ul><a class="btn btn-primary border rounded-0" role="button" href="/login">Masuk</a>
                </div>
            </div>
        </nav>
    </header>
</template>

<script>
export default {
    name: 'navbar',
    data () {
        return {
            kampusMerdekaNetwork: '/assets/img/Logo.png'
        }
    },
    mounted() {
        console.log('Header component mounted.')
    }
}
</script>