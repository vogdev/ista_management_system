<template>
  <div>
    <div class="columns" style="margin-bottom: 0;">
        <div class="column">
            <div class="level-right actions">
                  <button class="button is-success level-item"  id="unflag" @click="setStatus('unflag')">Unflag</button>
                  <button class="button is-danger level-item"  id="flag" @click="setStatus('flag')">Flag</button>
            </div>
          </div>
      </div>
    <div class="columns ">
      <div class="column">
        <table class="table is-striped ">
          <div v-show="loading" class="loading-container">
            <div class="loading animated-background"></div>
          </div>
          <thead>
            <tr>
              <th>
                <abbr title="checkbox">        
                  <label class="label--checkbox">
                        <input type="checkbox" class="checkbox" id="checkAll">
                    </label>
                </abbr>
              </th>
              <th>Nom & prénom</th>
              <th class="ms-dn">Date de naissance</th>
              <th class="ms-dn">CIN</th>
              <th class="ms-dn">REF</th>
              <th>Groupe</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>


            <tr v-for="student in students" v-bind:key="student.id">
              <th>        
                <label class="label--checkbox">
                    <input type="checkbox" class="checkbox Checked" :checked="checked" @click="selected(student)" id="checkItem">
                </label>
              </th>
              <!-- <td><a :href="'/admin/students/' + student.id">{{student.name}}</a></td> -->
              <td>{{student.name}}</td>
              <td class="ms-dn">{{student.birthday}}</td>
              <td class="ms-dn">{{student.cn}}</td>
              <td class="ms-dn" >{{student.ref}}</td>
              <td>{{classroom.name}}0{{ classroom.pos_year}}G{{classroom.group.toUpperCase()}}</td>
              <td>
                 <p :class="{ 'status green' : student.status, 'status red' : !student.status}" vlaue="test">
                   <span v-if="student.status == 0">absent</span>
                   <span v-if="student.status == 1">présent</span>
                </p>
            </td>

            </tr>
          </tbody>
        </table>
        </div>
    </div>
  </div>
</template>

<script>

  import axios from 'axios';
    export default {
    props: ['classromstudents','classroom'],
        data() {
            return {
                loading:true,
                students: this.classromstudents,
                selectedStudent: '',
                classrooms:'',
                selectedStudents : [],
                checked: '',
            }
        },
        methods:{
            selected(student) {
              if (this.selectedStudents.includes(student.id)) {
                 const studentIndex = this.selectedStudents.indexOf(student)
                  this.selectedStudents.splice(studentIndex, 1)
              }else {
                this.selectedStudents.push(student.id)
              }
            },
            setStatus(action) {
                 //check if the any one of the students is selected
                if (this.selectedStudents.length != 0) {
                  // send a put request to admin/StudentController with the students_ids and the action(flag OR unflag)
                      axios.get(`/students/${action}/${this.selectedStudents}`)
                          .then((res)=>{
                            // loop thru every student in students array and check if the student.id exists in the selected students array
                            for (var i = this.students.length - 1; i >= 0; i--) {
                              // if the student.id exists in the selectedStudents array then switch the current student status to (true OR false ) that's depends on the action value (flag OR unflag)
                                      if(this.selectedStudents.includes(this.students[i].id))
                                      {
                                        switch (action) {
                                            case 'unflag': this.students[i].status = 1; break;  
                                            case 'flag': this.students[i].status = 0; break;
                                         }
                                         // if (action == 'flag') {this.students[i].status = false}else{this.students[i].status = true}
                                      }
                            }
                            this.selectedStudents = []
                            this.checked = false
                          })
                          .catch((err)=>{
                            console.log(err)
                          })
                }
            },
        },
    }
</script>
<style>
.timeline-item {
    background: #fff;
    border: 1px solid;
    border-color: #e5e6e9 #dfe0e4 #d0d1d5;
    border-radius: 3px;
    padding: 12px;

    margin: 0 auto;
    max-width: 472px;
    min-height: 200px;
}
table {
  position: relative;
}
</style>
