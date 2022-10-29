<template>
  <div>


    <div v-if="adminLoading" class="loading">
        <!-- Show Loading if Data not ready yet -->
       <div class="row d-flex align-items-center p-0 m-0" style="height:100vh;width:100vw;">
           <div class="col-12 text-center p-0">
               <h3 class="fw-bold">{{loadingIcon}}</h3>
           </div>
       </div>
    </div>

    <div v-else>
      <div class="sidebar-mini layout-fixed">
        <div class="wrapper">

            <adminlteNavSlider @searching="searching" :noti="noti"/>

            <!-- Contect -->
            <div class="content-wrapper">
                <div class="content-header">
                   <adminlteContent @reading="reading" :search="search"/>
                </div>
            </div>

        </div>
       </div>
    </div>


  </div>
</template>

<script>
import adminlteNavSlider from './adminlteNavSlider.vue';
import adminlteContent from './Home.vue'
export default {
    data () {
        return {
            loadingIcon : '<Hello Zakerxa/>',
            adminLoading : true,
            search       : '',
            noti         : 0
        }
    },
    components:{
        adminlteNavSlider,
        adminlteContent
    },
    methods: {
        logout () {
            this.$http('api/logout').then(res => {
                if(res.data.response == 'logout'){
                    localStorage.removeItem('bearer');
                    this.$router.push(this.$route.query.redirect || '/login');
                }
            });
        },
        searching(e){
          this.search = e;
        },
        reading(){
            this.$http.get('/api/clients').then( (response) => this.noti = response.data.noti);
        }
    },
    created () {
        this.$http.get('/api/user').then( (response) => this.admin = response.data);
        this.$http.get('/api/clients').then( (response) => this.noti = response.data.noti);
    },
    mounted () {
        this.$nextTick(()=>  setTimeout(() => this.adminLoading = false, 300));
        console.log("Zakerxa.vue",localStorage.getItem('bearer'));
    }
}
</script>

<style></style>
