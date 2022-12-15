<template>
    <div>
        <NavBar />
        <singlepost />
        <footers />
    </div>
</template>

<script>
import Singlepost from '../components/admin/SinglePost.vue'
import NavBar from '../components/public/Navbar.vue'
import Footers from '../components/homepage/Footer.vue'
export default {
    metaInfo: {
        title: 'KMN || View Post',
    },
    components: { NavBar, Footers, Singlepost },
    name: 'single-post'
}
</script>
