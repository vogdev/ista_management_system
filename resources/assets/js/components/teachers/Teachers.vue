<template>
  <div>
    <div v-for="chunk in teacherChunks" :key="chunk.id" class="columns is-desktop">
        <div v-for="teacher in chunk" :key="teacher.id" class="column">
            <div class="card">
                <div class="dropdown-links dropdown is-right">
                    <div class="dropdown-trigger">
                        <p  aria-haspopup="true" aria-controls="dropdown-menu3">
                            <i class="fa fa-ellipsis-v fa-lg" aria-hidden="true"></i>
                        </p>
                    </div>
                    <div class="dropdown-menu" id="dropdown-menu3" role="menu">
                        <div class="dropdown-content">
                            <a href="#" class="dropdown-item">
                            Edit
                            </a>
                        </div>
                    </div>
                </div>
                <a v-on:click.stop.prevent="showModal(teacher)">
                    <div class="card-image">
                        <figure class="image is-4by3">
                            <img class="svg-img" src="/img/teacher.svg" :alt="teacher.name">
                        </figure>
                    </div>
                    <div class="card-content">  
                        <div class="media">
                            <div class="media-content">
                                <p class="title">{{ teacher.name }}</p>
                            </div>
                        </div>  
                    </div>
                </a>
            </div>
        </div>
    </div> 
  <TeacherModal :classrooms="classrooms" :teacher="selectedTeacher" v-on:reRender="fetchData"></TeacherModal>
  </div>
</template>

<script>
  import _ from 'lodash'
  import axios from 'axios';
  import TeacherModal from './TeacherModal.vue';
    export default {
        components: {
            'TeacherModal': TeacherModal,
        },
        mounted() {
         this.fetchData()
        },
        data() {
            return {
                teachers: '',
                selectedTeacher: '',
                classrooms:''

            }
        },
        methods:{
            fetchData() {
                axios.get('/admin/api/teachers')
                          .then((res)=>{
                            this.teachers   = res.data[0]
                            this.classrooms = res.data[1]
                          })
                          .catch((err)=>{
                            console.log(err)
                          })
            },
            showModal(teacher){
              this.selectedTeacher = teacher
              document.getElementById("modal").className += " is-active";
            },
        },
        computed: {
            teacherChunks(){
                return _.chunk(this.teachers, 4);
            }
        },
    }
</script>
<style>


</style>
