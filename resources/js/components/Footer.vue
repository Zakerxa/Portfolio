<template>
  <div :style="{'background':primaryBg}">

    <div class="container" >

        <div class="row justify-content-center pt-4">
            <div class="col-12 text-center">
              <h2 class="fw-bold pt-4 pb-3">{{footer}}</h2>
              <br>
           </div>
        </div>

        <div class="row justify-content-center" :style="{'color':primaryColor}">

          <div class="col-12 col-md-12 col-lg-4 text-md-start text-lg-center pb-4">
             <h3 class="pb-3 text-start text-lg-center underline fw-bold">Message</h3>
             <p class="fw-bold mb-0">Thanks for visiting my portfolio site.That's all of my Information,Skills ,Contact & services.Come back to me again.</p>
             <p class="fw-bold">Have a good day.</p>
          </div>

          <div class="col-12 col-md-6 col-lg-4 text-md-start text-lg-center order-1 order-lg-0 footerSocial pb-4">
                <h3 class="pb-3 text-start text-lg-center underline fw-bold">Social Link</h3>
                <div class="d-flex align-items-center">
                    <div v-for="social in socials" :key="social.link" class="d-inline text-center">
                       <a :href="social.link" target="_blank"><img :src="social.icon" alt=""></a>
                     </div>
                </div>
            </div>

           <div class="col-12 col-md-6 col-lg-4 text-md-start text-lg-center order-0 order-lg-1 footerSocial pb-4">
                <h3 class="pb-3 text-start text-lg-center underline fw-bold">Contact Me</h3>
                <div class="row justify-content-lg-end fw-bold">
                    <div class="col-3 text-start p-0">
                     <p> Location  </p>
                   </div>
                   <div class="col-7 text-start p-0 pl-3">
                     <a class="text-decoration-none text-dark" href="https://goo.gl/maps/ajDihmwUN9zNai4w7" target="_blank">: Myanmar, Yangon</a>
                   </div>
                   <div class="col-3 text-start p-0">
                     <p> Phone  </p>
                   </div>
                   <div class="col-7 text-start p-0 pl-3">
                      <a class="text-decoration-none text-dark" href="tel:+959777637858">: +959 777-637-858</a>
                   </div>
                   <div class="col-3 text-start p-0">
                     <p> Email  </p>
                   </div>
                   <div class="col-7 text-start p-0 pl-3">
                     <a class="text-decoration-none text-dark" href="mailto:zakerxa@gmail.com" target="_blank">: zakerxa@gmail.com</a>
                   </div>
                </div>
            </div>

        </div>

        <hr>
        <div class="text-center pb-3">
            <h3>Google Map</h3>
        </div>
    </div>

    <div class="mapouter">
        <div class="gmap_canvas">
            <iframe width="100%" height="400" id="gmap_canvas" src="https://maps.google.com/maps?q=16.788618,%2096.198985&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
        </div>
    </div>

    <div class="container">
        <div class="row">
             <div class="col-12 text-center pt-4 pb-4">
                <small class="text-muted">Copyright @2022 Zakerxa-Portfolio.All rights reserved.</small>
            </div>
        </div>
    </div>

  </div>
</template>

<script>
export default {
  data(){
    return{
        footer : '<Zakerxa/>',
        socials:[
            {
                icon : '/images/icon/github.png',
                link : 'https://github.com/Zakerxa'
            },
            {
                icon : '/images/icon/npm.png',
                link : 'https://www.npmjs.com/~mm-zakerxa'
            },
            {
                icon : '/images/icon/linkedin.png',
                link : 'https://linkedin.com/in/zakerxa'
            },
            {
                icon : '/images/icon/facebook.png',
                link : 'https://www.facebook.com/mm.zakerxa'
            },
            {
                icon : '/images/icon/messenger.png',
                link : 'https://www.messenger.com/t/100016329211576'
            }
        ]
    }
  },
  props:{
    primaryBg : String,
    secondaryBg:String,
    primaryColor:String
  }
}
</script>

<style lang="scss">
.mapouter{
    background: #fff;
    position:relative;
    text-align:right;
    height:400px;
    width:100%;
    text-align: center;
}
 .gmap_canvas {overflow:hidden;background:none!important;height:400px;width:100%;}

.footerSocial{
  div{
    padding: 10px 15px;
    img{
        width:35px;
    }
  }
}
</style>
