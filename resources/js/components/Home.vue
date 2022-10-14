<template>
  <div>

      <Hero     primary-bg="#d6f7ff" secondary-bg="#fff" primary-color="#232"/>

      <Skills   primary-bg="#d6f7ff" secondary-bg="#fff" primary-color="#232" progress-color="#a3dceb"/>

      <About    primary-bg="#d6f7ff" secondary-bg="#fff" primary-color="#232"/>

      <Services primary-bg="#d6f7ff" secondary-bg="#fff" primary-color="#232" servicesCard="rgb(229, 255, 254)"/>

      <Projects primary-bg="#d6f7ff" secondary-bg="#fff" primary-color="#232" servicesCard="rgb(229, 255, 254)"/>

      <Footer   primary-bg="#d6f7ff" secondary-bg="#333" primary-color="#232"/>
  </div>
</template>

<script>
import Upload from './Upload.vue';
import Hero from './Hero.vue';
import Skills from './Skills.vue';
import About from './About.vue';
import Services from './Service.vue';
import Projects from './Projects.vue';
import Footer from './Footer.vue';

export default {
   data(){
    return{

    }
   },
   components:{
    Hero,
    Skills,
    About,
    Services,
    Projects,
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
