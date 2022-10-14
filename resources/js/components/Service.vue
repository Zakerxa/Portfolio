<template>
 <div class="heroContainer" :style="{'background':secondaryBg}">
    <div class="servicesBgCover" :style="{'background':primaryBg}"></div>
    <div class="container">
      <div :style="{'color':primaryColor}" class="row justify-content-center align-items-center pb-5" style="min-height:80vh;overflow-x: hidden; overflow-y: hidden;">
        <!-- Header -->
        <div class="col-12 text-center mt-5 pb-3 position-relative">
           <h1 data-aos="zoom-in" class="fw-bold">My Services</h1>
        </div>

        <!-- Services Card -->
        <div v-for="service in services" :key="service.id" class="col-11 col-sm-10 col-md-6 col-lg-4 mt-4 mt-md-5">
            <div data-aos="fade-left" class="card" :style="{'background':servicesCard}" style="min-height:220px;box-shadow: 1px 2px 5px rgb(120, 165, 125);">
              <div class="card-body text-center">
                <font-awesome-icon style="font-size:30px;" :icon="`fa-solid ${service.icon}`" />
                <h5 class="fw-bold">{{service.name}}</h5>
                <p class="card-text text-start">{{service.short}}</p>
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
            icon : 'fa-desktop',
            short: 'Responsive design allows your website content to flow freely across all screen resolutions and sizes and renders it to look great on all devices',
            info : 'Responsive design allows your website content to flow freely across all screen resolutions and sizes and renders it to look great on all devices. It also makes it unnecessary to maintain different versions of your website for mobile and desktop and saves you time, resources and efforts.'
        },
        {
            name:'SEO (Search Engine Optimization)',
            icon : 'fa-search',
            short:'Search engine optimization (SEO) is the process of optimizing a website in order to receive a high ranking in a search engine.'
        },
        {
            name:'Web Mail',
            icon : 'fa-envelope',
            short:'Webmail is an email service that can be accessed using a standard web browser.It contrasts with email service accessible through specialized email client software',
            info:'Webmail (or web-based email) is an email service that can be accessed using a standard web browser. It contrasts with email service accessible through specialized email client software. These are usually free email accounts that are operated from a website.'
        },
        {
            name:'Web & Mobile Applications',
            icon : 'fa-mobile-screen',
            short:'Web applications are programs allowing better communication between businesses and their customers. Web apps can protect websites and software programs.',
            info : 'Web applications can be designed for a wide variety of uses and can be used by anyone from an organization to an individual for numerous reasons & a high level of security with so many web technologies on the market. Web apps can protect websites and software programs.'
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
        }
       ]
    }
   },
    props:{
     primaryColor : String,
     primaryBg : String,
     secondaryBg: String,
     servicesCard: String
   }
}
</script>

<style lang="scss" scoped>

.heroContainer{
    min-height: 100vh;
    position: relative;
    padding: 0;
    margin: 0;
    .servicesBgCover{
      clip-path: polygon(0 0, 100% 0, 80% 38%, 0% 100%);
      position: absolute;
      z-index: 0;
      top: 0;
      bottom: 0;
      height: 100vh;
      width: 100%;
    }

}

</style>
