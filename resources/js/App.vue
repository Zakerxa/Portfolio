<template>
  <div class="main">
     <Navigation/>
     <router-view></router-view>
  </div>
</template>

<script>
import Navigation from './components/Navigation.vue';
export default {
   components:{
    Navigation
   }
}
</script>

<style>
* {
  scroll-behavior: smooth;
}

.main{
    min-height: 100vh;
}
</style>
