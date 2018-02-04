<template>
<div class="columns">
  <div class="column is-two-fifths search-bar">
    <div class="field" :class="{apply_shake: Shake}">
        <div class="control control has-icons-left has-icons-right" :class="{is_loading: Loading}">
            <input v-model="SearchWord" class="input is-medium" type="email" placeholder="Search">
            <span class="icon is-medium is-left">
               <i class="fa fa-search"></i>
            </span>
        </div>
    </div>
    <div v-show="ShowSuggestions" class="field suggestions">
        <div v-for="teacher in SearchResult" :key="teacher.id" class="item">
            <a :href="'/admin/users/' + teacher.id">
                <h1>{{teacher.name}}</h1>
            </a>
        </div>
    </div>
  </div>
</div>
</template>

<script>
import axios from 'axios';
import _ from 'lodash'
 export default {
    data(){
        return {
            SearchWord:'',
            SearchResult:'',
            ShowSuggestions:false,
            Loading:false,
            Shake:false,
        }
    },
    watch: {    
        SearchWord: function(){
            if(this.SearchWord.length >= 2){
                this.search()
                this.Shake = false
                this.Loading = true
            }else{
                this.ShowSuggestions = false
                this.Loading = false
            }
        }
    },
    methods:{
            
        search: _.debounce(function () {
            if (this.SearchWord.length >= 2) {
                axios.get(`/admin/api/teacher/search/${this.SearchWord}`)
                .then((res)=>{
                    this.SearchResult = res.data
                    this.Loading = false
                    if(this.SearchResult.length != 0){
                        this.ShowSuggestions = true
                    }else {
                        this.Shake = true
                    }
                })
            }
        }, 1000),
    },
  }
  
</script>

<style scoped>
.search-bar{
   position: relative;
}
.suggestions {
    position: absolute;
    top: 56px;
    right: 12px;
    left: 12px;
    background-color: #ffffff;
    z-index: 10;
    border-radius: 0;
    border: 1px solid #d6d6d6;
}
.item:hover {
    background-color: #f5f5f5;
    }
.item {
    text-align: center;
    color: #232323;
    display: block;
    font-size: 19px;
    line-height: 1.5;
    padding: 0.375rem 1rem;
    white-space: nowrap;
    cursor: pointer;
    user-select: none;
}
.item a{
    color: #232323;
}

.control.is_loading::after {
    -webkit-animation: spinAround 500ms infinite linear;
    animation: spinAround 500ms infinite linear;
    border: 2px solid #dbdbdb;
    border-radius: 290486px;
    border-right-color: transparent;
    border-top-color: transparent;
    content: "";
    display: block;
    height: 25px;
    position: relative;
    width: 25px;
    position: absolute !important;
    right: 10px;
    top: 10px;
}

@keyframes shake {
  10%, 90% {
    transform: translate3d(-1px, 0, 0);
  }

  20%, 80% {
    transform: translate3d(3px, 0, 0);
  }

  30%, 50%, 70% {
    transform: translate3d(-6px, 0, 0);
  }

  40%, 60% {
    transform: translate3d(6px, 0, 0);
  }
}

.apply_shake {
    animation: shake 0.82s cubic-bezier(.36,.07,.19,.97) both;
}
</style>
