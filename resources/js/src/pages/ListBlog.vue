<template>
    <div>
        <NavBar/>
        <ListPost/>
        <footers/>
    </div>
</template>

<script>
    import ListPost from '../components/homepage/ListPost.vue'
    import NavBar from '../components/public/Navbar.vue'
    import Footers from '../components/homepage/Footer.vue'
    export default {
        metaInfo: {
        title: 'List Article',
        },
        components: { NavBar, Footers, ListPost},
        name: 'list-blog'
    }
</script>