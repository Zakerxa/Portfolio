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

<style lang="scss">
$primary-color :  #d6f0ff;
* {
  scroll-behavior: smooth;
  padding: 0;
  margin: 0;
}

.main{
    min-height: 100vh;
}
</style>
