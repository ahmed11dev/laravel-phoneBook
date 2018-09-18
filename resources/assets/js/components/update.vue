<template>
<div class="modal " :class="openmodal" >
  <div class="modal-background"></div>
  <div class="modal-card">
    <header class="modal-card-head">
      <p class="modal-card-title">update {{list.name}}'s details</p>
      <button class="delete" aria-label="close"  @click="close"></button>
    </header>
    <section class="modal-card-body">
      <!-- name input ... -->
                <div class="field">
                  <label class="label">Name</label>
                  <div class="control">
                    <input class="input" :class="{'is-danger':errors.name}" type="text" v-model="list.name">
                  </div>
                  <small v-if="errors.name" class="has-text-danger">{{errors.name[0]}}</small>
                </div>
                 <!-- phone input ... -->
                <div class="field">
                  <label class="label">phone</label>
                  <div class="control">
                    <input class="input" :class="{'is-danger':errors.phone}" type="text" v-model="list.phone" >
                  </div>
                   <small v-if="errors.phone" class="has-text-danger">{{errors.phone[0]}}</small>
                </div>
                 <!-- email input ... -->
                <div class="field">
                  <label class="label">email</label>
                  <div class="control">
                    <input class="input" :class="{'is-danger':errors.email}" type="text" v-model="list.email" >
                  </div>
                  <small v-if="errors.email" class="has-text-danger">{{errors.email[0]}}</small>
                </div>

    </section>
    <footer class="modal-card-foot">
      <button class="button is-success" @click='update'>update</button>
      <button class="button" @click="close">Cancel</button>
    </footer>
  </div>
</div>
</template>
<script>
export default {
  props:['openmodal'],
  data(){
    return {
           list:{},
           errors:{}
    }
  },
  methods:{
    close(){
      this.$emit('closeRequest');
    },
    update(){
            axios.patch(`/phonebook/${this.list.id}`,this.$data.list).then((response)=>this.close())
              .catch((error)=> this.errors = error.response.data.errors )

    }
  }
}
</script>
