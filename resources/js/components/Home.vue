<template>
  <div>

      <Hero     :primary-bg="primaryBg" :secondary-bg="secondaryBg" :primary-color="primaryColor"/>

      <Skills   :primary-bg="primaryBg" :secondary-bg="secondaryBg" :primary-color="primaryColor" progress-color="#a3dceb"/>

      <About    :primary-bg="primaryBg" :secondary-bg="secondaryBg" :primary-color="primaryColor"/>

      <Projects :primary-bg="primaryBg" :secondary-bg="secondaryBg" :primary-color="primaryColor" servicesCard="rgb(229, 255, 254)"/>

      <Services :primary-bg="primaryBg" :secondary-bg="secondaryBg" :primary-color="primaryColor" :servicesCard="primaryBg"/>

      <ContactMe :secondary-bg="secondaryBg" :primary-color="primaryColor"/>

      <Footer   :primary-bg="primaryBg" :secondary-bg="secondaryBg" :primary-color="primaryColor"/>

  </div>
</template>

<script>
import Upload from './Upload.vue';
import Hero from './Hero.vue';
import Skills from './Skills.vue';
import About from './About.vue';
import Services from './Service.vue';
import Projects from './Projects.vue';
import ContactMe from './ContactMe.vue';
import Footer from './Footer.vue';

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
    Footer,
    Upload
   },
   methods:{

   },
   mounted(){

   }
}
</script>

<style lang="scss" scoped>

*{
   font-family: sans-serif;
   background: #a3dceb;
}

</style>
