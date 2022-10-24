<template>
  <div>

      <Hero     :primary-bg="primaryBg" :secondary-bg="secondaryBg" :primary-color="primaryColor"/>

      <Skills   :primary-bg="primaryBg" :secondary-bg="secondaryBg" :primary-color="primaryColor" progress-color="#a3dceb"/>

      <About    :primary-bg="primaryBg" :secondary-bg="secondaryBg" :primary-color="primaryColor"/>

      <Projects :primary-bg="primaryBg" :secondary-bg="secondaryBg" :primary-color="primaryColor" servicesCard="rgb(229, 255, 254)"/>

      <Services :primary-bg="primaryBg" :secondary-bg="secondaryBg" :primary-color="primaryColor" :servicesCard="primaryBg"/>

      <ContactMe :secondary-bg="secondaryBg" :primary-color="primaryColor"/>

  </div>
</template>

<script>
import Hero from './components/Hero.vue';
import Skills from './components/Skills.vue';
import About from './components/About.vue';
import Services from './components/Service.vue';
import Projects from './components/Projects.vue';
import ContactMe from './components/ContactMe.vue';
import Footer from './components/Footer.vue';

export default {
   data(){
    return{
      primaryBg    : '#d6f7ff',
      secondaryBg  : '#fff',
      primaryColor : '#232',

    }
   },
   components:{
    Hero,
    Skills,
    About,
    Services,
    Projects,
    ContactMe,
    Footer
   }
}
</script>

<style lang="scss" scoped>

*{
   font-family: sans-serif;
   background: #a3dceb;
}

</style>
