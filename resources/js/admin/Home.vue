<template>
    <div class="container-fluid">
        <div class="row">
            <h3 class="p-3 pl-0">Dashboard</h3>
            <div class="col">
              <button class="btn btn-outline-dark" @click="selectAllForms()">{{selectAll ? 'Deselect' : 'Select'}} All</button>
            </div>
            <div class="col text-end" v-show="delIcon.length">
              <button class="btn btn-outline-danger" @click="delForms">Delete</button>
            </div>
        </div>

        <div  v-if="reading" class="row justify-content-center">
            <div class="col-12 text-start">

            </div>
            <div class="col-12 p-2">
                <h4 class="fw-bold ">
                    <font-awesome-icon icon="fas fa-circle-left" style="font-size:26px;cursor:pointer;" @click="reading=false;vuePaginate(current??null)" >Go Back</font-awesome-icon>
                    <span class="ml-3" v-if="reader.subject == 1">Recommendation</span>
                    <span class="ml-3" v-if="reader.subject == 2">Discussion</span>
                    <span class="ml-3" v-if="reader.subject == 3">Hire</span>
                    <span class="ml-3" v-if="reader.subject == 4">Testing</span>
                    <small style="font-size:13px" class="float-end text-muted pt-2">{{reader.created_at}}</small>
                </h4>
            </div>
            <div class="row p-2" style="background:#fff">
                <div class="col-12">
                    <p class="fw-bold pt-2">{{reader.name}}</p>
                </div>
                <div class="col-12 p-1 pl-2">
                    <p class="fw-bold mb-0">Mail : {{reader.authMail}}</p>
                </div>
                <div class="col-12 p-1 pl-3 pb-2 border-bottom">
                    <p class="fw-bold mb-0">Tel : {{reader.phone}}</p>
                </div>
                <div class="col-12 pt-2 pb-2">
                    <p class="mb-1 fw-bold">Message</p>
                    {{reader.message}}
                </div>
            </div>

            <div class="col-12 text-center pt-4">
               <p @click="reading=false;vuePaginate(current??null)" class="btn btn-outline-primary">Go Back</p>
            </div>

        </div>

        <div v-else class="row">

            <div class="col-12 border-bottom mailcontainer" v-for="(form, i) in forms" :key="i">
                <div class="form-check">
                    <input class="form-check-input mt-3" type="checkbox"
                    @change="check($event)"
                    :value="form.id"
                    :id="form.id">
                    <div @click="read(form.id)" class="border-bottom p-2 pt-3">
                        <div class="fw-bold ">
                            <span v-if="form.subject == 1">Recommendation</span>
                            <span v-if="form.subject == 2">Discussion</span>
                            <span v-if="form.subject == 3">Hire</span>
                            <span v-if="form.subject == 4">Testing</span>
                            <small class="badge badge-danger ml-2"> {{(form.read==0)? 'New' : ''}}</small>
                            <small class="float-end text-muted">{{form.created_at}}</small>
                        </div>
                        <div class="card-body p-1">
                            <div class="row">
                                <div class="col-12 col-md-5">
                                   Name : <span class="fw-bold">{{form.name}}</span>
                                </div>
                                <div class="col-12 col-md-7 order-1">
                                    E-Mail :
                                    <span class="fw-bold">{{ form.authMail }}</span>
                                </div>
                                <div class="d-none d-md-block col-7 text-center ordre-0">
                                   Tel : <span>{{form.phone}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

           <div class="col-12 pt-3 text-center">
              <vue-pagination @event="vuePaginate" :meta-data="paginations" :onSides="1"></vue-pagination>
           </div>
        </div>

    </div>
</template>

<script>
import { VuePagination } from '@zakerxa/vue-laravel-pagination';
export default {
    data () {
        return {
            endpoint    : 'api/clients?page=',
            perPage     : [4],/* default path => '&per_page=' (Or) change [2,'&UrPath='] */
            paginations : {},
            forms: [],
            reader : [],
            reading : false,
            current : null,

            selectAll: false,
            removeIds: [],
            delIcon  : []
        }
    },
    components:{
      VuePagination
    },
    props:['search'],
    created(){
        this.startInit();
    },
    methods: {
        vuePaginate(e){
          this.current = e;
          e ? this.startInit(e[0]+e[1]) : this.startInit();
        },
        startInit(e){
          // If somethng is change refresh checkbox
          let endpoint = e??(this.perPage[1]??'&per_page=')+this.perPage[0];
          this.getPaginateWithUsers(endpoint + (this.search ? '&search='+this.search :'')).then(res=>this.insertData(res));

        },
        insertData(res){
          this.checkBoxDef();
          if(res.data.length >= 1) this.forms = res.data;
          else  {
            this.current = [this.current[0] - 1,this.current[1]]
            this.vuePaginate(this.current??null);
          }
          this.paginations = {
             current_page : res.current_page,
             last_page : res.last_page,
             prev_page_url : res.prev_page_url,
             next_page_url : res.next_page_url,
             per_page      : this.perPage
          }
        },
        check (e) {
          this.$nextTick(() => {
            let id = e.target.value;
            if(e.target.checked)this.removeIds.push(parseInt(id));
            else this.removeIds.remove(parseInt(id));
            this.delIcon = this.removeIds;
            console.log(this.removeIds);
          });
        },
        checkBoxDef(e,ctn){
            this.removeIds = [];
            if(this.forms.length >= 1){
               this.forms.map(res=>{
                  document.getElementById(res.id).checked = e??false;
                  if(ctn) ctn.push(res.id);
               });
            }
        },
        selectAllForms(){
          this.selectAll = !this.selectAll;
          if(this.selectAll){
            let ctn = [];

            this.checkBoxDef(true,ctn)

            const sameId = this.removeIds.filter(e => {
               for (var i = 0; i < ctn.length; i++)  if (e.id == ctn[i].id) return true;
               return null;
            });

            if (sameId.length > 0)  for (let i = 0; i < sameId.length; i++) this.removeIds.remove(sameId[i]);

            this.removeIds = ctn;

          }else{
            this.checkBoxDef();
          }
          this.delIcon = this.removeIds;
          console.log(this.removeIds);
        },
        delForms(){
          if(this.removeIds.length >= 1 && confirm('Are you sure to delete?')){
            this.$http.post('api/delete/'+this.removeIds)
            .then(res=>{
              if(res.data.response == 'success'){
                  console.log(res.data,this.current);
                  this.vuePaginate(this.current??null);
              }
            })
            .catch(err=>console.log("Error",err));
          }else alert('Reselect form again.');
        },
        getPaginateWithUsers(url){
            return this.$http
            .get(this.endpoint+url)
            .then(res =>  res.data.data)
            .catch(err => console.log(err))
        },
        read(e){
            this.forms.find(res=>{
                if(res.id == e){
                    this.reader = res;
                    this.reading = true;
                    this.$http.post('api/clients/read/'+res.id)
                    .then(res=>{
                        if(res.data.response == 'success') this.$emit('reading');
                        else console.log("No Data Found")
                    })
                    .catch(err=>console.log(err))
                }
                else return null;
            });
        }
    },
    watch:{
      search(newvalue,old){
        this.startInit();
        return newvalue;
      }
    },
    mounted () {

    }
}
</script>

<style>
.mailcontainer{
    cursor: pointer;
}
</style>
