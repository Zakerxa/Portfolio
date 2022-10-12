<template>
 <div class="heroContainer" :style="{'background':primaryBg}">

    <div class="aboutbgCover" :style="{'background':secondaryBg}"></div>

    <div class="container">
      <div class="row align-items-center" :style="{'color':primaryColor}" style="min-height:80vh;overflow-x: hidden; overflow-y: hidden;">

        <!-- Header -->
        <div data-aos="zoom-in" data-aos-offset="200" class="col-12 text-center pb-3 mt-3 pt-5">
           <h2 class="fw-bold underline">Are you still in here ! Right</h2>
           <h4>That's a good time to know about me.</h4>
        </div>
        <!-- Question & Answer -->
        <div class="col-12 col-md-10 col-lg-8 text-start position-relative">
           <div class="pt-3" v-for="about in abouts" :key="about.id" data-aos="fade-left" data-aos-offset="180">
             <h4 class="fw-bold"><font-awesome-icon :icon="`fa-solid ${about.icon}`"/> {{about.qus}}</h4>
             <p class="fw-bold p-2" v-html="about.ans"></p>
             <div style="border:2px solid #fff;" class="w-100"></div>
           </div>
        </div>

        <h3 class="pt-4 pb-5" data-aos="fade-left" data-aos-offset="100">If you still want to know about me, <router-link to="/about" class="text-dark">Read More . . .</router-link> </h3>
      </div>
    </div>

 </div>
</template>

<script>
export default {
   data(){
    return{
      abouts:[
        {
          qus : 'Name and Age',
          icon: 'fa-id-card-clip',
          ans : 'My name is Zin Min Htet.I am 22 years old right now.'
        },
        {
          qus : 'Education',
          icon: 'fa-graduation-cap',
          ans : 'Ha ! That\'s not a good question for us. Actually, I am attending the <a href="https://www.eyu.edu.mm/about/profile" target="_blank" class="text-dark fw-bold">University of East Yangon</a>  & studying Physics major.'
        },
        {
            qus : 'Hobbies',
            icon: 'fa-person-running',
            ans : 'Of course, That\'s an important thing. I like creating something awesome by coding. Sometimes I like to watch movies and play games.'
        }
      ]
    }
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
    // .aboutbgCover{
    //   clip-path: polygon(86% 89%, 100% 74%, 100% 100%, 0% 100%);
    //   position: absolute;
    //   z-index: 0;
    //   top: 0;
    //   bottom: 0;
    //   min-height: 100vh;
    //   width: 100%;
    // }
}

</style>
