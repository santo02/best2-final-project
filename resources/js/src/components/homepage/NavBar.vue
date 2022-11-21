<template>
  <nav class="navbar navbar-expand-sm bg-light">
    <div class="container">
      <a href="/" class="navbar-brand">
        <img src="assets/img/Logo.png" width="100px"/></a>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <router-link class="nav-link" to="/Post">Post</router-link>
          </li>
          <li class="nav-item">
            <router-link class="nav-link" to="/Kategori">Kategori</router-link>
          </li>
          <li class="nav-item">
            <router-link class="nav-link" to="/Sign In">Sign In</router-link>
          </li>
          <li class="nav-item">
            <router-link class="nav-link" to="/Sign Up">Sign Up</router-link>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</template>
 
<script>
export default {
  name: "NavBar",
};
</script>