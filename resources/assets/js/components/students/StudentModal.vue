<template>
<div id="modal" class="modal">
  <div class="modal-background" @click="closeModal()"></div>
  <div class="modal-card">
    <header class="modal-card-head">
      <p class="modal-card-title">Edit Student</p>
      <button class="delete" @click="closeModal()"></button>
    </header>
    <section class="modal-card-body">
      <div class="content">
        <h1 class="has-text-centered">{{student.name}}</h1>
        <div class="field">
         <label class="label">Name</label>
          <div class="control">
            <input class="input" v-model="currentStudent.name" type="text" placeholder="Full Name">
          </div>
        </div>
        <div class="field">
         <label class="label">birthday</label>
          <div class="control">
            <input class="input" v-model="currentStudent.birthday" type="text" placeholder="birthday">
          </div>
        </div>
        <div class="control">
            <div class="select">
               <select class="form-control" v-model="currentStudent.classroom_id">
                  <option v-for="classroom in classrooms" v-bind:value="classroom.id" v-bind:key="classroom.id" >{{ classroom.name }}0{{ classroom.pos_year}}G{{classroom.group.toUpperCase()}}</option>
               </select>
            </div>
        </div>
        <div class="field">
         <label class="label">cn</label>
          <div class="control">
            <input class="input" v-model="currentStudent.cn" type="text" placeholder="cn">
          </div>
        </div>
        <div class="field">
         <label class="label">ref</label>
          <div class="control">
            <input class="input" v-model="currentStudent.ref" type="text" placeholder="Text input">
          </div>
        </div>
      </div>
    </section>
    <footer class="modal-card-foot">
      <a class="button is-success" @click="updateStudent()">Save changes</a>
      <a class="button is-danger" @click="deleteStudent()">Delete user</a>
    </footer>
  </div>
</div>
</template>

<script>
import axios from 'axios';
 export default {
    props: ['student','classrooms'],
    data(){
      return {
        currentStudent: '',
        selectedClassroom:'',
      }
    },
    watch: {
      student(value) {
       this.currentStudent = value;
      }
    },
    methods:{
      updateStudent(){
        axios.put(`/admin/api/student/${this.currentStudent.id}`, this.currentStudent)
        .then((res)=>{
          console.log(res)
          this.$emit('reRender')
          this.closeModal()
          
        })
        .catch((err)=>{
        console.log(err)
        })
      },
      setClassroom(){
        this.currentStudent.classroom_id = this.selectedClassroom
      },
      deleteStudent(){
        axios.delete(`/admin/api/student/${this.currentStudent.id}`)
        .then((res)=>{
          this.$emit('reRender')
          this.closeModal()
        })
        .catch((err)=>{
        console.log(err)
        })
      },
      closeModal(){
        document.getElementById("modal").classList.remove("is-active");
      },
    },
  }
</script>
<style>
.modal.is-active {
    z-index: 9999;
}
</style>
