<template>

  <div>
    <nav class="panel column is-offset-2 is-8">
  <p class="panel-heading">
   
    
    <i class="fa fa-address-book"></i>
    phone book
     <button class="button is-link is-outlined " @click="openAdd" >
      add new one
    </button>
  </p>
  <div class="panel-block">
    <p class="control has-icons-left">
      <input class="input is-small" type="text" placeholder="search" v-model="searchQuery">
      
    </p>
  </div>
  
  <a class="panel-block is-active" v-for="(item,key) in temp ">
   
    {{item.name}}
    
      <span class="panel-icon column is-1">
      <i class="has-text-danger fa fa-trash "aria-hidden="true" @click="del(key,item.id)"></i>
    </span>
     <span class="panel-icon column is-1">
      <i class="fa fa-edit "aria-hidden="true" @click="openupdate(key)"></i>
    </span>
     <span class="panel-icon column is-1">
      <i class="fa fa-eye "aria-hidden="true" @click="openShow(key)"></i>
    </span>
      
   
  </a>

  

 
 
  <div class="panel-block">
    <button class="button is-link is-outlined is-fullwidth">
      reset all filters
    </button>
  </div>
</nav>

<add :openmodal='addActive' @closeRequest='close'></add>
<show :openmodal='showActive' @closeRequest='close'></show>
<update :openmodal='updateActive' @closeRequest='close'></update>


</div>
</template>
<script>
let add = require('./add.vue');
let show = require('./show.vue');
let update = require('./update.vue');
export default {
  components: {add,show,update},
  data(){
    return {
           addActive: '',
           showActive: '',
           updateActive: '',
           searchQuery:'',
           temp:'',
           lists:{},
           errors:{}
    }
  },
  watch:{
          searchQuery(){
            if (this.searchQuery.length > 0) {

             this.temp = this.lists.filter((item)=>{
                
                return Object.keys(item).some((key) =>{
                  let string= String(item[key])
                   return string.toLowerCase().indexOf(this.searchQuery.toLowerCase())>-1

                })
                // searsh by name only
               // return item.name.toLowerCase().indexOf(this.searchQuery.toLowerCase())>-1
              
              });
              
            }else{
              this.temp =this.lists 
            }
          }
  },
  mounted(){
    axios.post('/getdata').then((response)=> this.lists = this.temp =response.data )
              .catch((error)=> this.errors = error.response.data.errors )
  },
   methods:{
     openAdd(){
        this.addActive = "is-active";
     },
     openShow(key){
       this.$children[1].list = this.temp[key]
        this.showActive = "is-active";
     },
     openupdate(key){
       this.$children[2].list = this.temp[key]
        this.updateActive = "is-active";
     },
     del(key,id){
      if(confirm('are you sure ?')){
        axios.delete(`/phonebook/${id}`)
              .then((response)=> this.lists.splice(key,1) )
              .catch((error)=> this.errors = error.response.data.errors )
      }

     },
     close(){
       this.addActive = this.showActive = this.updateActive = '';
     }
   }
}
</script>
