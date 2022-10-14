<template>
    <div data-aos="fade-left" class="card position-relative shadow" :style="{color:primaryColor}">
       <carousel :images="projectData.images" :id="projectData.id"/>
       <div class="card-body cardBox p-0 m-0" :style="{background:primaryBg}">
         <div class="cardBodyCover" :style="{background:secondaryBg}"></div>
         <div class="position-relative">
             <h5 class="fw-bold text-start p-3 pb-2 pt-3">{{projectData.name}}</h5>
             <p class="card-text text-start p-2 pb-2 pt-2" style="min-height:120px;">{{projectData.details}}</p>
             <div class="text-start border-bottom pb-2">
                <button class="btn shadow btn-sm m-1" :style="{background:secondaryBg}" v-for="lang in projectData.language" :key="lang">{{lang}}</button>
             </div>
             <div class="row pb-3 pt-3 ">
                <div class="col">
                    <a :href="projectData.liveDemo" target="_blank">
                        <button class="btn btn-dark shadow-sm fw-bold"><font-awesome-icon icon="fa-solid fa-eye"></font-awesome-icon> Live Demon</button>
                    </a>
                </div>
                <div class="col">
                    <a :href="projectData.liveDemo" target="_blank">
                        <button class="btn btn-dark shadow-sm fw-bold"><font-awesome-icon icon="fa-brands fa-github"></font-awesome-icon> GitHub</button>
                    </a>
                </div>
             </div>
         </div>
       </div>
     </div>
</template>

<script>

import carousel from './Corousel.vue';
export default {
   components:{
    carousel
   },
   props:{
     primaryColor : String,
     primaryBg : String,
     secondaryBg: String,
     projectData: Array
   }
}
</script>

<style lang="scss" scoped>

.cardBox{
position: relative;
padding: 0;
margin: 0;
  .cardBodyCover{
    background: #333;
    clip-path: polygon(50% 69%, 76% 80%, 100% 68%, 100% 100%, 0 100%, 0 68%, 24% 79%);
    position: absolute;
    z-index: 0;
    width: 100%;
    height: 100%;
  }
}
</style>
