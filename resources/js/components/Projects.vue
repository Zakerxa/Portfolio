<template>
 <div class="heroContainer" id="projects" :style="{'background':primaryBg}">

    <div class="container">
      <div class="row align-items-center" :style="{'color':primaryColor}" style="min-height:80vh;overflow-x: hidden; overflow-y: hidden;">

        <!-- Header -->
        <div data-aos="zoom-in" data-aos-offset="200" class="col-12 text-center pb-3">
           <h2 class="fw-bold underline">Here are my Projects</h2>
           <h4>That's a good time to know about me.</h4>
        </div>

        <!-- Services Card -->
        <div v-for="project in projects" :key="project.id" class="col-12 col-sm-10 col-md-6 col-lg-4 mt-4 mt-md-5">
            <div data-aos="fade-left" class="card position-relative">
              <img :src="'/images/projects/'+project.images" width="" style="height:500px;" class="card-img" alt="...">
              <div class="cardBody">
                <h5 class="fw-bold p-3">{{project.name}}</h5>
                <p class="card-text text-start p-3">{{project.details}}</p>
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
      projects:[
        {
          name : 'YaThaSone',
          images: 'blog1.png',
          details : 'My name is Zin Min Htet.I am 22 years old right now.'
        },
        {
          name : 'Code Share',
          images:'code1.png',
          details : 'This is private Code Share.'
        },
        {
            name : 'Hobbies',
            details : 'Of course, That\'s an important thing. I like creating something awesome by coding. Sometimes I like to watch movies and play games.'
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

}

.cardBody{
    position: absolute;
    bottom:0;
    color: #fff;
    font-weight: bold;
    background: rgba(134, 219, 240, 0.822);
    z-index:2px;
    width:100%;
    height: 30vh;
}

</style>
