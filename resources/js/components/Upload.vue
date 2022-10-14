<template>
   <vue-multi-image-upload @data-image="images" :max="4" :data-reset="component"/>

   <!-- <button @click="getData()" class="btn btn-success">Get Data</button> -->
</template>

<script>
import { VueMultiImageUpload } from '@zakerxa/vue-multiple-image-upload';

export default {
    data(){
        return {
          component : {},
          options : {},
          inputImages : [],
          imageSize : 2000000, // 2MB
          formatType : ['image/jpeg', 'image/png']
        }
    },
    components:{
      VueMultiImageUpload
    },
    methods:{
      images(images){
        // Accept images data from the inputbox directly
        this.inputImages = images;
      },
      multiImages(){
        return this.inputImages.map(e => e);
      },
      getData(){
        // Call this method to post => this.multiImages()
        console.log(this.multiImages());
        // Clear Component Data & Property if success
        this.component.clear = true;
        this.inputImages = [];
      }
    },
    mounted(){
      // Options
      this.options.max = "Max";
      this.options.ready = "Ready";
      this.options.select = "Choosed";
    }
}
</script>

<style>

</style>
