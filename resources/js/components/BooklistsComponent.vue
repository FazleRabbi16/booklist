<template>
<div class="container">
 <h2>Booklists</h2>
 <div class="card card-body mb-2 bg-info" v-for="booklist in booklists" v-bind:key="booklist.id">
  <h2><span>Bookname:-</span>{{booklist.bookname}}</h2>
  <h4><span>Author:-</span>{{booklist.author}}</h4>
  <p><strong>Description:-</strong>{{booklist.body}}</p>   
  </div>  
</div>  
</template>
<script>
    export default {
     data(){
      return{
       booklists:[],
      }
     },   
  //about created https://vuejs.org/v2/guide/instance.html      
      created(){
          this.getbooklists();
      }, 
      methods:{
     //get all booklists     
      getbooklists(){
     var vm = this;    
      axios.get('/api/booklists')
      .then((response)=>{
        //Data warpe into data object  
        vm.booklists = response.data.data;
       console.log(vm.booklists);
       });
      }    
      }
    }
</script>
