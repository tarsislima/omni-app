<template>
  <div class="container">
    <div class="text-center" style="margin: 20px 0px 20px 0px;">

      <img src="https://d8xabijtzlaac.cloudfront.net/Custom/Content/Themes/Shared/Images/marca-bemol.svg" width="100">
      <h3 class="text-secondary">Omni App</h3>
    </div>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="collapse navbar-collapse">
        <div class="navbar-nav">
          <router-link to="/" class="nav-item nav-link">Inicio</router-link>
        </div>
      </div>
    </nav>
    <br/>
    <router-view></router-view>
  </div>
</template>

<script>
export default {}
</script>