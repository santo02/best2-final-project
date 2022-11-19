<template>
  <div class="app">

    <NavBar/>
    <router-view/>
    <footers/>

  </div>
</template>
 

<script>
import NavBar from './components/NavBar.vue';
import Footers from './components/Footer.vue';

export default {
  components: {NavBar, Footers },
  name: 'app'
}
</script>
