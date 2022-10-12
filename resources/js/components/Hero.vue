<template>
 <div class="heroContainer" :style="{'background':secondaryBg}">
    <div class="herobgcover" :style="{'background':primaryBg}"></div>
    <div class="container pt-4">
      <div class="row justify-content-center align-items-center mt-md-4" style="min-height:80vh;overflow-x: hidden; overflow-y: hidden;">
          <div :style="{'color':primaryColor}" class="col-12 col-sm-11 col-md-6 col-lg-6 pt-5">

              <figure data-aos="fade-down" data-aos-delay="300" class="text-md-start pt-4">
                    <h1 class="fw-bold" style="font-size:35px">
                        Hello EveryOne !
                    </h1>
                    <figcaption class="pt-3 blockquote-footer fw-bold" style="font-size:16px;">
                        My name is Zin Min Htet
                    </figcaption>
              </figure>

              <div data-aos="fade-left" data-aos-delay="500" class="row justify-content-center align-items-center d-md-none">
                  <div class="col-10 col-sm-8 text-center">
                      <img @mouseover="imgMouseover()" @mouseleave="imgMouseleave()" :style="imgRotate" draggable="false" src="/images/hero.png" class="heroImage" alt="">
                      <div :style="imgShadow" class="heroimgShadowMobile"></div>
                  </div>
              </div>

              <div data-aos="fade-left" data-aos-delay="800" class="text-center col-12" >
                  <h5 class="p-1 pt-sm-5 pt-md-4 pt-5 fw-bold text-start" style="letter-spacing:0.3px;">
                    I am a BackEnd Web Developer with over 3 years of experience with PHP.I have acquired the skill necessary to build great websites.
                  </h5>
                  <div @click="clickCvForm()" @mouseleave="btnMsg='CV Form'" @mouseover="btnMsg='Check it'" id="hero-btn">
                      <span>{{btnMsg}}</span>
                      <div></div>
                  </div>
              </div>

          </div>
          <div class="col-10 d-none d-md-block col-md-6 col-lg-5 align-self-center offset-lg-1" data-aos="fade-left">
              <img @mouseover="imgMouseover()" @mouseleave="imgMouseleave()" :style="imgRotate" draggable="false" src="/images/hero.png" class="heroImage" alt="">
              <div :style="imgShadow" class="heroimgShadow"></div>
          </div>
      </div>
    </div>
 </div>
</template>

<script>
export default {
   data(){
    return{
        btnMsg: 'CV Form',
        imgRotate : `transform: rotateX(360deg) rotateY(180deg);background:${this.primaryBg}`,
        imgShadow : ''
    }
   },
   props:{
     primaryColor : String,
     primaryBg : String,
     secondaryBg: String
   },
   methods:{
    clickCvForm(){
        setTimeout(() => window.open('/ZinMinHtet.pdf', '_blank'), 400);
    },
    imgMouseover(){
      this.imgRotate = `transition:transform 0.7s;transform: rotateX(0deg) rotateY(180deg);background:${this.primaryBg}`;
      this.imgShadow = `transition:transform 0.8s;transform:rotateY(180deg);background:${this.primaryBg}`;
    },
    imgMouseleave(){
      this.imgRotate = `transition:transform 0.5s;transform: rotateY(0deg) rotateX(0deg);background:${this.primaryBg}`;
      this.imgShadow = `transition:transform 0.7s;transform:rotateY(0deg);background:${this.primaryBg}`;
    }
   },
   mounted(){
     setTimeout(() => {
         this.imgRotate = `transition:transform 1s;transform: rotateX(0deg) rotateY(0deg);background:${this.primaryBg}`;
         this.imgShadow = `transition:transform 1.2s;transform:rotateY(180deg);background:${this.primaryBg}`;
     }, 700);
   }
}
</script>

<style lang="scss" scoped>

// [data-aos] {

//   body[data-aos-easing="new-easing"] &,
//   &[data-aos][data-aos-easing="new-easing"] {
//     transition-timing-function: cubic-bezier(.250, .250, .750, .750);
//   }
// }

.heroContainer{
    min-height: 100vh;
    position: relative;
    padding: 0;
    margin: 0;
    .herobgcover{
      clip-path: polygon(0 0, 100% 0, 80% 38%, 0% 100%);
      position: absolute;
      z-index: 0;
      top: 0;
      bottom: 0;
      height: 100vh;
      width: 100%;
    }
}

.heroImage{
    border-radius: 12%;
    border-top-left-radius: 65%;
    border-bottom-right-radius: 30%;
    border:none;
    box-shadow: 1px 2px 5px rgb(83, 165, 185);
    width: 70%;
}

@media screen and (min-width:450px) and (max-width : 575px) {
  .heroImage{
    border-radius: 12%;
    border-top-left-radius: 65%;
    border-bottom-right-radius: 30%;
    border:none;
    box-shadow: 1px 2px 5px rgb(83, 165, 185);
    width: 60%;
  }
}

.heroimgShadowMobile{
    background: rgba(43, 91, 116, 0.664);
    border-radius: 50%;
    margin-top: 5px;
    box-shadow: 1px 2px 5px rgb(106, 118, 230);
    width: 90%;
    padding: 0;
    height: 12px;
}

.heroimgShadow{
    background: rgba(43, 91, 116, 0.664);
    border-radius: 50%;
    margin-top: 5px;
    box-shadow: 1px 2px 5px rgb(106, 118, 230);
    width: 80%;
    height: 16px;
}

#hero-btn {
  background: rgb(63, 149, 153);
//   background: radial-gradient(circle, rgb(183, 241, 248) 20%, rgb(217, 248, 220) 86%);
  box-shadow: 2px 1px 10px rgb(78, 59, 59);
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
