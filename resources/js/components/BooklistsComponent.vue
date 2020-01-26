<template>
<div class="container">
 <h2>Booklists</h2>
 <small v-if="error" class="text-danger">All field required</small>
 <small v-else-if="success" class="text-success">Data submitted succesfully</small>
 <!-- form start -->
<form v-on:submit.prevent="addbooklist()"> 
<div class="form-group">
<label for="BookName"><strong>Book Name</strong></label>
<input type="text" class="form-control" id="bookname"  placeholder="What is your book name ?" v-model="booklist.bookname">
<div class="form-group">
<label for="AuthorName"><strong>Author Name</strong></label>
<input type="text" class="form-control" id="authorname" placeholder="Author name ?" v-model="booklist.author">
</div>
</div>
<div class="form-group">
<label for="exampleFormControlTextarea1"><strong>Book Description</strong></label>
<textarea class="form-control" id="exampleFormControlTextarea1" rows="5"  placeholder="Write about book" v-model="booklist.body"></textarea>
</div>
<button type="submit" class="btn btn-primary btn-block mb-2" @click="addbooklist()">Submit</button>
</form>
<!-- form end -->
 <div class="card card-body mb-2 bg-secondary" v-for="booklist in booklists" v-bind:key="booklist.id">
  <h2><span>Bookname:-</span>{{booklist.bookname}}</h2>
  <h4><span>Author:-</span>{{booklist.author}}</h4>
  <p><strong>Description:-</strong>{{booklist.body}}</p>
   <small>
     <a style="float:right" class="btn btn-sm btn-outline-danger ml-1 text-black" @click="deleteBooklist(booklist.id)">Delete</a>
     <button style="float:right" class="btn btn-sm btn-outline-primary text-black">Edit</button>
   </small>
  </div>  
  <div class="pagination" style="padding-left:350px">
     <button class="btn btn-default" :disabled="!pagination.previous_page_url" @click="getbooklists(pagination.previous_page_url)">Previous</button>
    <small class="mt-2">{{pagination.current_page}} of {{pagination.last_page}}</small>
   <button class="btn btn primary" :disabled="!pagination.next_page_url"  @click="getbooklists(pagination.next_page_url)">Next</button>
  </div>
</div>  
</template>
<script>
export default {
data(){
return{
booklists:[],
pagination:{},
booklist:{bookname:'',author:'',body:''},
success:false,
error:false,
}
},   
//about created https://vuejs.org/v2/guide/instance.html      
created(){
this.getbooklists();
}, 
methods:{
//add new book
addbooklist(){
  let vm=this;
  var input=vm.booklist;
  if(input.bookname==''||input.author==''||input.body==''){
   vm.error=true;
  }else{
  axios.post('api/booklist',input)
  .then(function(response){
    vm.success=true;
    vm.booklist={bookname:'',author:'',body:''};
    vm.getbooklists();
    });
  }
},  
//get all booklists     
getbooklists(page_url){
let vm = this;
page_url=page_url ||'/api/booklists';     
axios.get(page_url)
.then((response)=>{
//Data warpe into data object  
vm.booklists = response.data.data;
console.log(vm.booklists);
vm.makePagination(response.data.meta,response.data.links);
});
},
//make pagination
makePagination(meta,links){
 let pagination ={
   current_page:meta.current_page,
   last_page:meta.last_page,
   next_page_url:links.next,
   previous_page_url:links.prev,
 }
 this.pagination =pagination;
},
deleteBooklist(id){
  let vm = this;
  if(confirm('Are you Sure ?')){
    axios.delete('api/deletebooklist/'+id)
         .then(function(response){
         vm.getbooklists();
});
 }
}    
}

}
</script>
