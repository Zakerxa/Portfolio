<template>
 <div class="heroContainer" id="projects" :style="{'background':secondaryBg}">

    <div class="container">
      <div class="row align-items-center justify-content-center pt-5 pb-5" :style="{'color':primaryColor}" style="min-height:80vh;overflow-x: hidden; overflow-y: hidden;">

        <!-- Header -->
        <div data-aos="zoom-in" data-aos-offset="200" class="col-12 text-center pb-4 pt-4">
           <h2 class="fw-bold underline">Some of my Projects</h2>
        </div>

       <Splide :options="options" aria-label="My Favorite Images">
           <SplideSlide v-for="project in projects" :key="project.id" class="col-11 mt-4 mt-md-5 text-center">
              <!-- Projects Card -->
              <project-card :projectData="project" :primaryBg="primaryBg" :primaryColor="primaryColor" :secondaryBg="secondaryBg"></project-card>
               <!-- Projects Card -->
           </SplideSlide>
        </Splide>

      </div>
    </div>


 </div>
</template>

<script>
import { Splide, SplideSlide } from '@splidejs/vue-splide';
import projectCard from './projectCard.vue';
// Default theme
import '@splidejs/vue-splide/css';

export default {
   data(){
    return{
      projects:[
        {
          id : 1,
          name : 'YaThaSone Blog',
          github: 'https://github.com/Zakerxa/Laravel-Blog',
          liveDemo: 'https://zakerxa.com',
          language: ['Laravel','Bootstrap'],
          images: ['/images/projects/blog/blogAdmin.png','/images/projects/blog/blogHome.png','/images/projects/blog/blogDetails.png'],
          details : 'YaThaSone is a daily news website with special features.You can post a lot of content & image easily from the admin panel.'
        },
        {
          id : 2,
          name : 'Code Share',
          github: 'https://github.com/Zakerxa/Private-CodeShare',
          liveDemo: 'https://code.zakerxa.com',
          language: ['PHP','VueJs','Javascript','Bootstrap'],
          images:['/images/projects/codeShare/codeHome.png','/images/projects/codeShare/codeUpload.png'],
          details : 'This is Private Code Share website anyway you can call web application.Try to upload your private code here.'
        },
        {
            id : 3,
            name : 'Cars Exporter',
            github: 'https://github.com/Zakerxa/Cars-Exporter',
            liveDemo: 'https://thidaautocenter.com/',
            language: ['HTML','VueJs','Javascript','Bootstrap'],
            images:['/images/projects/carExporter/carHome.png','/images/projects/carExporter/carDetails.png'],
            details : 'This is not only the car exporter website but also my client site. I do not support you to testing in that contact form. '
        },
        {
            id : 4,
            name : 'Tic Tac Toe',
            github: 'https://github.com/Zakerxa/Tic-Tac-Toe',
            liveDemo: 'https://zakerxa.github.io/Tic-Tac-Toe/',
            language: ['HTML','VueJs','Javascript','Bootstrap'],
            images:['/images/projects/ttt/tttPlay.png','/images/projects/ttt/tttWin.png'],
            details : 'This is Tic Tac Toe solo play game.You can play Easy, Normal & Impossible Mode. Try to win !'
        },
        {
            id : 5,
            name : 'Social Media',
            github: 'https://github.com/Zakerxa/Social-Media',
            liveDemo: 'https://media.zakerxa.com',
            language: ['PHP','VueJs','Javascript','Bootstrap'],
            images:['/images/projects/socialMedia/socialMediaHome.png','/images/projects/socialMedia/socialMediaFri.png','/images/projects/socialMedia/socialMediaProfile.png','/images/projects/socialMedia/socialMediaComment.png'],
            details : 'This is Social Media like Facebook.You can create account and post ,reaction ,like & comment.'
        },
        {
            id : 6,
            name : 'Dhamma Media',
            github: 'https://github.com/Zakerxa/Dhamma-Media-MP3',
            liveDemo: 'https://dhamma-zakerxa.vercel.app/',
            language: ['VueCli','Bootstrap'],
            images:['/images/projects/dhamma/dhamma1.png','/images/projects/dhamma/dhamma2.png','/images/projects/dhamma/dhamma3.png','/images/projects/dhamma/dhamma4.png'],
            details : 'Dhamma Media is a MP3 Web Application,But now this api is not working that\' is why you can\'t see & hear images & mp3.'
        },
        {
            id : 7,
            name : 'Login/Register',
            github: 'https://github.com/Zakerxa/PHP-LogIn-Register-Security',
            liveDemo: 'https://code.zakerxa.com',
            language: ['PHP','Bootstrap'],
            images:['/images/projects/login-register/login.png','/images/projects/login-register/register.png','/images/projects/login-register/success.png','/images/projects/login-register/authuser.png'],
            details : 'PHP Login / Register Security that can prevent you from attacking CSRF, XSS, SQL Injection & other.'
        }
      ],
      options:{
        rewind : true,
        perPage: 3,
        gap    : '2rem',
        height : '100%',
        breakpoints:
           {
              992: {
                  perPage: 3,
                  gap: '.7rem'
              },
              991: {
                  perPage: 2,
                  gap: '2rem',
                  width: 900
              },
              768: {
                  perPage: 1,
                  gap: '.7rem',
                  width: 380
              },
         },
      }
    }
   },
   components:{
    Splide,
    SplideSlide,
    projectCard
   },
   props:{
     primaryColor : String,
     primaryBg : String,
     secondaryBg: String
   }
}
</script>

<style lang="scss" scoped>

.heroContainer{
    min-height: 100vh;
    position: relative;
    padding: 0;
    margin: 0;
}

</style>
