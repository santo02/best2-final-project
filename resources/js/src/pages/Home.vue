<template>
  <div>
    <carousel/>
    <articles/>
    <keunggulan/>
    <portofolio/>
    <reviews/>
    <contact/>
  </div>
</template>

<script>
import Carousel from '../components/publics/Carousel.vue'
import Articles from '../components/homepage/Article.vue'
import Keunggulan from '../components/homepage/Keunggulan.vue'
import Portofolio from '../components/homepage/Portofolio.vue'
import Reviews from '../components/homepage/Reviews.vue'
import Contact from '../components/homepage/Contact.vue'
export default {
  components: { Carousel, Articles, Keunggulan, Portofolio, Reviews, Contact },
  name: 'home'
}
</script>
