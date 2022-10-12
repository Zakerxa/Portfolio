<template>
  <div class="main">
     <Transition appear name="fade">
       <Navigation v-if="scrollDown"/>
     </Transition>
     <router-view></router-view>
  </div>
</template>

<script>
import Navigation from './components/Navigation.vue';
export default {
    data(){
        return{
            scrollPosition : '',
            scrollDown : true
        }
    },
   components:{
    Navigation
   },
    created () {
      window.addEventListener('scroll', this.handleScroll);
    },
    destroyed () {
      window.removeEventListener('scroll', this.handleScroll);
    },
    methods: {
      handleScroll () {
        var currentScrollPosition = window.scrollY;
        if (currentScrollPosition > this.scrollPosition) {
            if(currentScrollPosition >= 320) this.scrollDown = false;
        }else this.scrollDown = true;
        this.scrollPosition = currentScrollPosition;
       }
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

.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.5s ease;
}

.fade-enter-from,
.fade-leave-to {
  opacity: 0;
}
</style>
