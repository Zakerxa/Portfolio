<template>
 <div class="navigation">
     <div class="d-md-block" style="min-height: 5px;background-color: #f00;"></div>
    <!-- Nav Bar Desktop -->
    <nav class="navbar d-block navbar-expand-md navbar-light primaryColor border-bottom">
        <div class="container-fluid">

            <h2 class="text-dark fw-bold m-0 p-2">{{title}} </h2>

            <div class="collapse navbar-collapse" id="navbarText">

                <div class="m-auto"></div>
                <ul class="navbar-nav mb-lg-0 m-auto">
                    <router-link v-for="(route,i) in router" :key="i" class="nav-link p-4 pt-2 pb-2" tag="li" active-class="active" aria-current="page" :to="route.path">
                        <b>{{route.name}}</b>
                    </router-link>
                </ul>
            </div>

            <div @click="navigatorClick()" :style="navTran" :class="navIcon" style="font-size: 25px;" class="navbar-toggler fw-bold border-0 p-1" data-bs-toggle="offcanvas" data-bs-target="#mobileDev"></div>

        </div>
    </nav>

    <!-- NavBar Mobile -->
    <div class="offcanvas offcanvas-start bg-light h-100" tabindex="1" id="mobileDev">
        <div class="d-md-block" style="min-height: 5px;background-color: #f00;"></div>
        <div class="offcanvas-header p-3 border-bottom">
           <h2 class="text-dark d-md-none fw-bold m-0">{{title}} </h2>
           <div :style="navTran" :class="navIcon" style="font-size: 25px;" class="border-0 p-1" data-bs-toggle="offcanvas" data-bs-target="#mobileDev"></div>
         </div>
        <div class="offcanvas-body">
            <div class="row pt-5 justify-content-center">
                <div class="col-12 text-center pt-2">
                    <li v-for="(route,i) in router" :key="i" class="list-unstyled border-bottom pb-4 pt-4">
                        <router-link class="nav-link fw-bold text-dark" aria-current="page" :to="route.path"><h4 data-bs-dismiss="offcanvas">{{route.name}} </h4> </router-link>
                    </li>
                </div>
                <div class="col-12 text-center position-fixed" style="bottom: 0;">
                    <div class="col-12 small">
                        <hr>
                        <p>Read Our <a class="text-decoration-none" href="privacy.html">Privacy Policy</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

 </div>
</template>

<script>

export default {
        data() {
            return {
                title  : "<Zakerxa/>",
                navIcon: 'navbar-toggler-icon',
                navTran: 'transform: rotateZ(0deg);',
                navCheck: false,
                bsOffcanvas : '',
                router : [
                    {
                       name : "Home",
                       path : "/"
                    },
                    {
                       name : "About",
                       path : "/about"
                    },
                     {
                       name : "Services",
                       path : "/service"
                    },
                    {
                        name: "Contact",
                        path: "/contact"
                    }
                ]
            }
        },
        methods: {
            navigatorClick() {
                this.navCheck = !this.navCheck;
                if (this.navCheck){
                    this.navIcon = "btn-close btn-close-dark ";
                    this.navTran = "transition:transform 0.5s;transform: rotateZ(90deg); "
                }
                else {
                    this.navIcon = "navbar-toggler-icon ";
                    this.navTran = "transition:transform 0.5s;transform: rotateZ(0deg);"
                }
            }
        },
        mounted(){
           const myOffcanvas = document.getElementById('mobileDev')
           myOffcanvas.addEventListener('hidden.bs.offcanvas', event => {
             this.navigatorClick();
           })
        }
}
</script>

<style lang="scss" scoped>

.navigation{
    position:fixed;
    top: 0;
    z-index: 9999;
    width: 100%;
}

@media screen and (min-width:768px) {
.nav-link{
 &:hover{
     transition:transform 0.2s;
     transform:rotate(10deg);
   }
   &:active{
     transition:border-bottom .2s;
     border-bottom: 3px solid #f00;
   }
}
.exact-active {
   font-weight: bold;
   cursor: pointer;
    border-bottom: 3px solid #f00;
}
}

</style>
