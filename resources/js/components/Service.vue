<template>
 <div class="heroContainer">
    <!-- <div class="bgServicescover"></div> -->
    <div class="container" style="z-index:0;">
      <div class="row justify-content-center align-items-center" style="min-height:80vh;overflow-x: hidden; overflow-y: hidden;">
           <div class="col-12 text-center mt-5 pt-md-5 pb-3">
              <h1 class="fw-bold pcolor">My Services</h1>
           </div>

            <div v-for="service in services" :key="service.id" class="col-11 col-sm-10 mt-5 col-md-6 col-lg-4">
                <div data-aos="fade-left" class="card shadow serviceCard" style="min-height:200px;">
                  <div class="card-body">
                    <h5 class="fw-bold">
                        <font-awesome-icon :icon="`fa-solid ${service.icon}`" />
                        {{service.name}}
                    </h5>
                    <p class="card-text">{{service.short}}</p>
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
       services : [
        {
            name : 'Responsive Design',
            icon : 'fa-mobile-screen',
            short: 'Responsive design allows your website content to flow freely across all screen resolutions and sizes and renders it to look great on all devices',
            info : 'Responsive design allows your website content to flow freely across all screen resolutions and sizes and renders it to look great on all devices. It also makes it unnecessary to maintain different versions of your website for mobile and desktop and saves you time, resources and efforts.'
        },
        {
            name:'Web & Mobile Applications',
            icon : 'fa-mobile-android',
            short:'Web applications are programs allowing better communication between businesses and their customers. Web apps can protect websites and software programs.',
            info : 'Web applications can be designed for a wide variety of uses and can be used by anyone from an organization to an individual for numerous reasons & a high level of security with so many web technologies on the market. Web apps can protect websites and software programs.'
        },
        {
            name:'Web Mail',
            icon : 'fa-envelope',
            short:'Webmail is an email service that can be accessed using a standard web browser.It contrasts with email service accessible through specialized email client software',
            info:'Webmail (or web-based email) is an email service that can be accessed using a standard web browser. It contrasts with email service accessible through specialized email client software. These are usually free email accounts that are operated from a website.'
        },
        {
            name:'Google Map',
            icon : 'fa-map-location-dot',
            short:'Customers or website visitors get directions to your business and save customers the steps of opening a new browser window, leaving your website and finding directions.'
        },
        {
            name:'HTTPS Feature',
            icon : 'fa-shield-halved',
            short:'(HTTPS) is a protocol that secures communication and data transfer between a user\'s web browser and a website. HTTPS is the secure version of HTTP.'
        },
        {
            name:'SEO (Search Engine Optimization)',
            icon : 'fa-search',
            short:'Search engine optimization (SEO) is the process of optimizing a website in order to receive a high ranking in a search engine.'
        }
       ]
    }
   },
   methods:{

   },
   mounted(){
     AOS.init();
   }
}
</script>

<style lang="scss" scoped>

$primary-bg: #fff;
$primary-color : #232;

.pcolor{
    color : $primary-color;
}
.heroContainer{
    background: #d6f0ff;
    min-height: 100vh;
    position: relative;
    padding: 0;
    margin: 0;
}

.serviceCard{
  background-image: linear-gradient(160deg, #f0f9ff 0%, #ecfffd 100%);
}

</style>
