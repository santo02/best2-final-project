<template>
  <div>
    <h1>Hompage</h1>
    <ul>
      <li>
        <router-link to="/registrasi">Register</router-link>
      </li>
      <li>
        <router-link to="/login">login</router-link>
      </li>
    </ul>
  </div>
</template>
<script>
export default {
  metaInfo: {
    title: 'KMN || HomePage',
  },
}
</script>
