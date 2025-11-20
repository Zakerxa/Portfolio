<template>
  <div class="">
    <div :id="'carouselId'+id" class="carousel slide" data-bs-touch="false">
      <div :class="`carouselClass${this.id}`" class="carousel-inner" >
        <div v-for="(img,i) in url" :key="img.id" :id="'carousel'+rand+i" class="carousel-item">
          <img :src="img" class="d-block w-100" style="height:180px;" alt="...">
        </div>
      </div>
      <button class="carousel-control-prev" type="button" :data-bs-target="'#carouselId'+id" data-bs-slide="prev">
        <span class="fw-bold" style="color:#ff0;font-size:30px;" aria-hidden="true">&#171;</span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" :data-bs-target="'#carouselId'+id" data-bs-slide="next">
        <span class="fw-bold" style="color:#ff0;font-size:30px;" aria-hidden="true">&#187;</span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </div>
</template>

<script>
export default {
  data(){
    return {
     url : this.images,
     rand : this.makeid(12)
    }
  },
  props: {
    images : Array,
    id : Number
  },
  methods:{
    makeid(length) {
       var result           = '';
       var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
       var charactersLength = characters.length;
       for ( var i = 0; i < length; i++ ) result += characters.charAt(Math.floor(Math.random() * charactersLength));
       return result;
   }
  },
   mounted(){
    document.getElementById('carousel'+this.rand+0).classList.add("active");
  }
}

</script>

<style>

</style>
