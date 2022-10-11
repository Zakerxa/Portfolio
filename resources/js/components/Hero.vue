<template>
  <div class="container pt-4 heroContainer">
    <div class="row justify-content-center align-items-center mt-md-4" style="min-height:80vh;overflow-x: hidden; overflow-y: hidden;">
        <div class="col-12 col-sm-12 col-md-6 col-lg-6 pt-5">

            <figure data-aos="fade-down" class="text-md-start pt-4">
                  <h1 class="fw-bold" style="font-size:35px">
                      Hello EveryOne !
                  </h1>
                  <figcaption class="pt-3 blockquote-footer fw-bold" style="font-size:16px;">
                      My name is Zin Min Htet
                  </figcaption>
            </figure>
            <div data-aos="fade-left" class="row justify-content-center align-items-center d-md-none">
                <div class="col-10 col-sm-6 text-center" @mouseover="imgMouseover()" @mouseleave="imgMouseleave()">
                    <img :style="imgRotate" draggable="false" src="/images/hero.png" class="heroImage" alt="">
                    <div :style="imgShadow" class="heroimgShadowMobile"></div>
                </div>
            </div>
            <div data-aos="fade-left" class="text-center col-12" >
                <h5 class="p-1 pt-sm-5 pt-md-4 pt-5 fw-bold text-start" style="letter-spacing:1px;">
                  I am a BackEnd Web Developer with over 3 years of experience with PHP.I have acquired the skill necessary to build great websites.
                </h5>
                <div @click="clickCvForm()" @mouseleave="btnMsg='CV Form'" @mouseover="btnMsg='Check it'" id="hero-btn">
                    <span>{{btnMsg}}</span>
                    <div></div>
                </div>
            </div>

        </div>
        <div class="col-10 d-none d-md-block col-md-5 col-lg-4 align-self-center offset-lg-1" data-aos="fade-left">
            <img @mouseover="imgMouseover()" @mouseleave="imgMouseleave()" :style="imgRotate" draggable="false" src="/images/hero.png" class="heroImage" alt="">
            <div :style="imgShadow" class="heroimgShadow"></div>
        </div>
    </div>
  </div>

</template>

<script>
export default {
   data(){
    return{
        btnMsg: 'CV Form',
        imgRotate : 'transform: rotateX(360deg) rotateY(180deg);',
        imgShadow : ''
    }
   },
   methods:{
    clickCvForm(){
        setTimeout(() => window.open('/ZinMinHtet.pdf', '_blank'), 400);
    },
    imgMouseover(){
      this.imgRotate = 'transition:transform 0.7s;transform: rotateX(0deg) rotateY(180deg);';
      this.imgShadow = 'transition:transform 0.8s;transform:rotateY(180deg)';
    },
    imgMouseleave(){
      this.imgRotate = 'transition:transform 0.5s;transform: rotateY(0deg) rotateX(0deg);';
      this.imgShadow = 'transition:transform 0.7s;transform:rotateY(0deg)';
    }
   },
   mounted(){
     AOS.init();
     setTimeout(() => {
         this.imgRotate = 'transition:transform 1s;transform: rotateX(0deg) rotateY(0deg);';
         this.imgShadow = 'transition:transform 1.2s;transform:rotateY(180deg)';
     }, 700);
   }
}
</script>

<style lang="scss" scoped>

$primary-bg: "rgb(232, 235, 243)";

[data-aos] {

  body[data-aos-easing="new-easing"] &,
  &[data-aos][data-aos-easing="new-easing"] {
    transition-timing-function: cubic-bezier(.250, .250, .750, .750);
  }
}

.heroContainer{
    background: $primary-bg;
    min-height: 100vh;
}

.heroImage{
    background: rgba(49, 135, 179, 0.575);
    border-radius: 12%;
    border-top-left-radius: 60%;
    border-bottom-right-radius: 30%;
    box-shadow: 1px 2px 5px rgb(126, 137, 236);
    width: 70%;
}
.heroimgShadowMobile{
    background: rgba(26, 116, 161, 0.575);
    border-radius: 50%;
    margin-top: 5px;
    box-shadow: 1px 2px 5px rgb(106, 118, 230);
    width: 90%;
    padding: 0;
    height: 12px;
}

.heroimgShadow{
    background: rgba(23, 116, 163, 0.575);
    border-radius: 50%;
    margin-top: 5px;
    box-shadow: 1px 2px 5px rgb(106, 118, 230);
    width: 80%;
    height: 16px;
}

#hero-btn {
  background: rgb(58, 198, 72);
  background: radial-gradient(circle, rgba(58, 198, 72, 1) 20%, rgba(58, 198, 72, 1) 86%);
  box-shadow: 2px 1px 10px rgb(77, 76, 76);
  padding: 8px 10px;
  position: relative;
  z-index:0;
  margin-top: 10px;
  font-weight: bold;
  border-radius: 4px;
  display: inline-block;
  border: none;
  width: 170px;

  span {
    background: transparent;
    z-index: 1;
    color: #fff;
    position: relative;
  }

  div {
    position: absolute;
    height: 100%;
    width: 0;
    top: 0;
    margin-left: -10px;
    border-radius: 4px;
    background: #fff;
    transition: 0.3s width;
    transition-timing-function: ease-out;
  }

  &:hover {
    cursor: pointer;
    span {
      color: #000;
    }

    div {
      width: 170px;

    }
  }
}

</style>
