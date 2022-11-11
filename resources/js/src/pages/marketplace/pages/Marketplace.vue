<template>
    <div>
      <marketheader/>
      <router-view></router-view>
    </div>
</template>
  
<script>
  import Marketheader from '../../../components/marketplace/pages/Header.vue'

  export default {
    components: { Marketheader },
    name: 'marketplace'
  }
</script>
  