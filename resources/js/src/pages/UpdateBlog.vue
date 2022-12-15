<template>
    <div>
        <NavBar/>
        <UpdatePost/>
        <footers/>
    </div>
</template>

<script>
 
    import UpdatePost from '../components/homepage/UpdatePost.vue'
    import NavBar from '../components/public/Navbar.vue'
    import Footers from '../components/homepage/Footer.vue'
    export default {
        metaInfo: {
        title: 'Edit Article',

        },
        components: { NavBar, Footers, UpdatePost},
        name: 'update-blog'
    }

</script>
