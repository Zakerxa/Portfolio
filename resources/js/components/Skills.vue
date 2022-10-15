<template>
 <div class="heroContainer" :style="{'background':secondaryBg}">
    <!-- <div class="aboutbgCover" :style="{'background':primaryBg}"></div> -->
    <div class="container">
      <div class="row align-items-center" :style="{'color':primaryColor}" style="min-height:80vh;overflow-x: hidden; overflow-y: hidden;">
           <div data-aos="zoom-in" data-aos-offset="200" class="col-12 text-center mt-5">
              <h2 class="fw-bold underline">How about your skill ?</h2>
           </div>

           <div class="col-12 col-lg-11 position-relative pt-5">
                <h3 data-aos="zoom-out" data-aos-offset="200">Language and Framework</h3>
                <div class="row">
                  <div data-aos="fade-right" data-aos-offset="150" v-for="skill in skills" :key="skill.id" class="mt-4 col-12 col-sm-11 col-md-6">
                    <b>{{skill.language}}</b>
                    <div class="progress mt-2" style="box-shadow: 1px 2px 5px rgb(125, 199, 236);">
                      <div class="progress-bar fw-bold" role="progressbar" :style="{'width':skill.level+'%','background':progressColor}" :aria-label="skill.language" :aria-valuenow="skill.level" aria-valuemin="0" aria-valuemax="100">{{skill.level}} %</div>
                    </div>
                  </div>
                </div>
           </div>

      </div>
    </div>
 </div>
</template>

<script>
export default {
   data(){
    return{
      skills:[
        {
            language : 'HTML, CSS, Bootstrap',
            level    : 90
        },
        {
            language : 'PHP',
            level    : 85
        },
        {
            language : 'VueJs',
            level    : 80
        },
        {
            language : 'Javascript',
            level    : 70
        },
        {
            language : 'Laravel',
            level    : 65
        },
        {
            language : 'Ajax, API',
            level    : 60
        }
      ]
    }
   },
   props:{
     primaryColor : String,
     progressColor : String,
     primaryBg : String,
     secondaryBg:String,
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
