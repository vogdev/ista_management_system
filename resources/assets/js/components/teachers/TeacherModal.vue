<template>
<div id="modal" class="modal">
  <div class="modal-background" @click="closeModal()"></div>
  <div class="modal-card">
    <header class="modal-card-head">
      <p class="modal-card-title">Edit Teacher</p>
      <button class="delete" @click="closeModal()"></button>
    </header>
    <section class="modal-card-body">
      <div class="content">
        <h1 class="has-text-centered">{{teacher.name}}</h1>
        <div class="field">
         <label class="label">Name</label>
          <div class="control">
            <input class="input" v-model="teacher.name" type="text" placeholder="Full Name">
          </div>
        </div>
        <div class="field">
         <label class="label">Email</label>
          <div class="control">
            <input class="input" v-model="teacher.email" type="text" placeholder="email@ista.com">
          </div>
        </div>
        <div class="field">
         <label class="label">Password</label>
          <div class="control password">
            <input class="input" v-model="TeacherNewPassword" :type="inputType" value="" placeholder="Password">
                <i @click="toggleVue()" class="fa password-eye" aria-hidden="true" :class="eye"></i>
          </div>
        </div>
        <div class="field">
         <label class="label">Confirm Password</label>
          <div class="control password">
            <input class="input" v-model="ConfirmTeacherNewPassword" :type="inputType" placeholder="Password" @keyup="validatePassword()" :class="{ notvalid: notValid }">
                <i @click="toggleVue()" class="fa password-eye" aria-hidden="true" :class="eye"></i>
          </div>
        </div>
        <div class="field">
         <label class="label">Groups</label>
          <div class="control">
            <div class="select is-multiple">
              <select multiple v-model="SelectedClassrooms">
                <option v-for="classroom in classrooms" :value="classroom.id" :key="classroom.id" >
                  {{classroom.name}}0{{ classroom.pos_year}}G{{classroom.group.toUpperCase()}}
                  </option>
              </select>
            </div>
          </div>
        </div>
      </div>
    </section>
    <footer class="modal-card-foot">
      <a class="button is-success" @click="updateTeacher()">Save changes</a>
      <a class="button is-danger" @click="deleteTeacher()">Delete user</a>
    </footer>
  </div>
</div>
</template>

<script>
import axios from 'axios';
 export default {
    props: ['teacher','classrooms'],
    data(){
      return {
          TeacherNewPassword: '',
          ConfirmTeacherNewPassword: '',
          inputType: 'password',
          eye: 'fa-eye',
          notValid: '',
          change_password:false,
          SelectedClassrooms:[],
      }
    },
    methods:{
       deleteTeacher(){
        axios.delete(`/admin/api/teacher/${this.teacher.id}`)
        .then((res)=>{
          this.$emit('reRender')
          this.closeModal()
        })
      },
        updateTeacher(){
          // adding the new property to the teacher object using (dot notation)
          this.teacher.change_password = this.change_password
          this.teacher.new_password = this.TeacherNewPassword
          this.teacher.classrooms_id = this.SelectedClassrooms
          axios.put(`/admin/api/updateteacher/${this.teacher.id}`,this.teacher)
          .then((res)=>{
            this.closeModal()
            this.TeacherNewPassword = ''
            this.ConfirmTeacherNewPassword = ''
            this.change_password = false
            this.SelectedClassrooms = []
          })
        },
        closeModal(){
          document.getElementById("modal").classList.remove("is-active");
         },
         toggleVue(){
             if(this.inputType == 'password'){
                 this.inputType = 'text'
                 this.eye = 'fa-eye-slash'
             } else {
                 this.inputType = 'password'
                 this.eye = 'fa-eye'
             }
         },
         validatePassword(){
           if(this.ConfirmTeacherNewPassword != this.TeacherNewPassword){
             this.notValid = true
             this.change_password = false
           } else {
             this.notValid = false
             this.change_password = true
           }
         },
    }
  }
</script>
<style scoped>
.password-eye {
    cursor: pointer;
    position: absolute;
    top: 4px;
    right: 5px;
    font-size: 19px;
    color: #212121;
    background-color: white;
    height: 29px;
    width: 26px;
    line-height: inherit;
    text-align: center;
}
.password {
    position: relative;
}
.notvalid{
  border-color: red!important;
  box-shadow: 0 0 0 0.125em rgba(255, 67, 67, 0.479);
}

.modal.is-active {
      z-index: 9999;
  }
</style>
