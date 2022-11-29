<template>
  <div>
      <NavBar/>
      <AddCategories/>
      <footers/>
  </div>
</template>

<script>
  import NavBar from '../components/public/Navbar.vue'
  import Footers from '../components/homepage/Footer.vue'
  import AddCategories  from '../components/homepage/AddCategories.vue'
  export default {
      metaInfo: {
      title: 'categories',
      },
      components: { NavBar, Footers, AddCategories},
      name: 'add-categories'
  }
</script>
