<template>
  <div class="container justify-content-center">

    <h1 v-show="userData.length >= 1" class="mb-4">Requests</h1>

       <div v-for="(d,i) in userData" :key="i" class="position-relative pt-2">
         <i>{{i+1}}. </i>
        <div class="clientHeader">
            <span @click="showDeleteForm(d.id)" class="clientLogo d-flex align-items-center">
                <b>{{Array.from(d.name)[0]}}</b>
            </span>
            <span class="name">{{d.name}}</span>
            <span class="time text-muted">{{d.created_at}}</span>
        </div>
        <div class="clientMsg text-start">
          {{d.email}} sent a
           <span v-if="d.subject == 1">recommendation</span>
           <span v-if="d.subject == 2">discussion</span>
           <span v-if="d.subject == 3">hire</span>
           <span v-if="d.subject == 4">testing</span>
           form.
        </div>
       </div>

       <div class="row">
           <div class="col-12">
              <div class="modal fade" id="deleteModalForm" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                 <div class="modal-dialog modal-dialog-centered">
                   <div class="modal-content boxshadow border-0">
                     <div v-show="readyFormLoading" class="overlayLoading">
                        <div class="row">
                          <img src="/images/icon/loading.png" style="width:80px;" alt="">
                        </div>
                     </div>
                     <div class="modal-header">
                       <h1 class="modal-title fs-5" id="staticBackdropLabel">Authentication required</h1>
                       <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                     </div>
                     <div class="modal-body">
                        <p v-show="errPass[0]??false" class="alert alert-danger">{{errPass[0]??''}}</p>
                        <div class="col-12 mb-3 position-relative">
                           <input :type="checkPassword" v-model="password" @keyup="checkPass" class="form-control p-2" id="passwordInput" placeholder="Password" autocomplete="off" required>
                           <font-awesome-icon @click="eyecheck()" :icon="checkIcon" class="d-block text-end position-absolute pt-2 pb-2" style="margin-right: 10px;cursor:pointer;top:6px;right:0;"></font-awesome-icon>
                         </div>
                         <div class="col-12">
                            <p>Please insert your password if you are the owner of this form. This action cannot be undone.</p>
                         </div>
                     </div>
                     <div class="modal-footer">
                       <button type="button" class="btn btn-secondary fw-bold" style="padding: 7px 10px;margin-top:10px;width:120px;" data-bs-dismiss="modal">Go Back</button>
                       <button type="submit" @click="deleteForm" :disabled="disPassword" class="btn readyFormDel">Delete</button>
                     </div>
                   </div>
                 </div>
               </div>
            </div>

            <!-- Modal SuccessForm -->
            <div class="col-12">
               <div class="modal fade" id="modalDelSuccessForm" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content boxshadow border-0">
                    <div class="modal-header">
                      <h3 class="modal-title fs-5 fw-bold" style="letter-spacing:1px;" id="staticBackdropLabel"><font-awesome-icon icon="fa-solid fa-check-circle" class="text-success" /> Successfully Deleted. </h3>
                    </div>
                    <div class="modal-body">
                        <div class="col-12">
                           <p class="text-muted pt-2">You can contact me anytime via this form.</p>
                        </div>
                        <button type="button" data-bs-dismiss="modal" class="btn readyFormDel">Got it</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
       </div>

        <div class="col-12 text-center">
            <vue-pagination  @event="vuePaginate" :meta-data="paginations" :onSides="1" :style="style"></vue-pagination>
        </div>
  </div>
</template>

<script>
import { VuePagination } from '@zakerxa/vue-laravel-pagination';

export default {
    data () {
        return {
          paginations: {},
          perPage : [3],
          endpoint: 'api/users?page=',
          userData: [],
          currentPage : [],
          readyFormLoading :false,
          errPass: [],
          checkPassword  : 'password',
          checkIcon      : 'fa-solid fa-eye-slash',
          checkState     : true,
          password       : '',
          disPassword    : true,
          formId         : null
        }
    },
    components:{
      VuePagination
    },
    props: ['parent'],
    created(){
        this.startInit();
    },
    watch:{
        parent(newvalue,old){
          this.startInit();
        }
    },
    methods: {
        vuePaginate(e){
          this.currentPage = e;
          this.startInit(e[0]+e[1]);
        },
        startInit(e){
           this.getPaginateWithUsers(e??(this.perPage[1]??'&per_page=')+this.perPage[0]).then(res=>this.insertData(res));
        },
        insertData(res){
          this.userData = res.data;
          this.paginations = {
             current_page : res.current_page,
             last_page : res.last_page,
             prev_page_url : res.prev_page_url,
             next_page_url : res.next_page_url,
             per_page      : this.perPage
          }
        },
        getPaginateWithUsers(url){
          return fetch(this.endpoint+url, {
          method: 'GET',
          headers: {'Content-Type': 'Application/json'}
          })
          .then(res => res.json())
          .then(res => res)
          .catch(err => err);
        },
        eyecheck(){
           this.checkState = !this.checkState;
           if(this.checkState){
            this.checkPassword = 'password';
            this.checkIcon = 'fa-solid fa-eye-slash';
           }else{
            this.checkPassword = 'text';
            this.checkIcon = 'fa-solid fa-eye';
           }
        },
        checkPass(){
         if(this.password.length >= 5) this.disPassword = false;
         else this.disPassword = true;
        },
        showDeleteForm(e){
          $('#deleteModalForm').modal('show');
          this.formId = e;
        },
        deleteForm(e){
            e.preventDefault();
            this.readyFormLoading = true;
            let formData = new FormData();
            formData.append('password',this.password);
            formData.append('id',this.formId);
            fetch('/api/user/forms/delete', {
                method: 'post',
                headers:{
                   'Content-Type': 'application/json'
                },
                credentials: "same-origin",
                body:JSON.stringify({password:this.password,id:this.formId})
            })
            .then(res => res.json())
            .then(res => {
                console.log("OK => ",res)
                this.readyFormLoading = false;
               if(res.response == 'success'){
                  this.readyFormLoading = false;
                  this.startInit();
                  $('#deleteModalForm').modal('hide');
                  $('#modalDelSuccessForm').modal('show');
                }
                else if(res.response == 'incorrect') this.errPass.push("Incorrect Password");
                else if(res.response == 'error') this.errPass.push("Form Not found");
            })
            .catch(err =>  this.catchError(err))
        },
        catchError(res){
           this.readyFormLoading = false;
           this.errPass = res.password;
        }
    },
    mounted(){
        $('#deleteModalForm').on('hidden.bs.modal', () => {
            this.errPass = [];
            this.password = '';
        });
    }
}
</script>

<style lang="scss" scoped>
.clientHeader{
   position: relative;
   display: flex;
   align-items: center;
   width:100%;
   top:-45px;
   left: 15px;
   .clientLogo{
    display: block;
    position: relative;
    top:7px;
    cursor: pointer;
    text-align: center;
    width: 45px;
    height: 45px;
    border-radius: 50%;
    background: radial-gradient(circle, rgb(102, 164, 171) 20%, rgb(102, 171, 175) 86%);
        b{
           font-size: 30px;
           width: 100%;
           position: relative;
           top:1px;
           display: block;
           color:#fff;
        }
    }

   .name{
    position: relative;
    left: 6px;
    font-weight: bold;
   }
   .time{
    font-size: 13px;
    position:relative;
    left: -50px;
    top:20px;
   }

}
.clientMsg{
    position: relative;
    display: inline-block;
    top:-30px;
    left:10px;
    padding: 7px 5px 7px 10px;
    border-radius:5px;
    background: #d2e3e6;
    font-family: 'serif';
}

.readyFormDel{
  background: rgb(63, 149, 153);
  color:#fff;
  background: radial-gradient(circle, rgb(102, 164, 171) 20%, rgb(102, 171, 175) 86%);
  box-shadow: 2px 1px 10px rgb(125, 199, 236);
  padding: 8px 10px;
  position: relative;
  z-index:0;
  margin-top: 10px;
  font-weight: bold;
  border-radius: 4px;
  display: inline-block;
  border: none;
  width: 120px;
}

.overlayLoading{
    position: absolute;
    height: 100%;
    width: 100%;
    z-index:9999;
    border:none;
    border-radius: 5px;
    background: rgba(255, 255, 255, 0.749);
    div{
        justify-content: center;
        position: absolute;
        align-items: center;
        height: 100%;
        width:100%;
        margin: 0;
        padding: 0;
        img{
          -webkit-animation:spin 2s linear infinite;
          -moz-animation:spin 2s linear infinite;
          animation:spin 2s linear infinite;
        }
        @-moz-keyframes spin {
            100% { -moz-transform: rotate(360deg); }
        }
        @-webkit-keyframes spin {
            100% { -webkit-transform: rotate(360deg); }
        }
        @keyframes spin {
            100% {
                -webkit-transform: rotate(360deg);
                transform:rotate(360deg);
            }
        }
    }
}
</style>
