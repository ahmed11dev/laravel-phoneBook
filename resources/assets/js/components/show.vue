<template>
    <div class="modal " :class="openmodal" >
  <div class="modal-background"> </div>
  <div class="modal-card">
    <header class="modal-card-head">
      <p class="modal-card-title">{{list.name}}'s details</p>
      <button class="delete" aria-label="close"   @click="close"></button>
    </header>
    <section class="modal-card-body">
      <!-- name input ... -->
      <li class="panel-block">
          <label class="column is-2">Name </label>{{list.name}} 
      </li>
              
                 <!-- phone input ... -->
                 <li class="panel-block">
          <label class="column is-2">phone </label>{{list.phone}} 
      </li>
                 <!-- email input ... -->
                <li class="panel-block">
          <label class="column is-2">email </label>{{list.email}} 
      </li>


    </section>
    <footer class="modal-card-foot">
     
      <button class="button"  @click="close">Cancel</button>
    </footer>
  </div>
</div>
</template>
<script>
export default {
    props:['openmodal'],
    data(){
        return {
            list:''
        }
    },
    methods:{
       close(){
      this.$emit('closeRequest');
    }
    }
}
</script>
