 
 <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

        <title>Laravel11</title> 
    </head>
    <body>
        
        <?php
        
      // print_r(session()->all());
        ?>
    
<div class="container" id="app">
     
         
            
<!--                <div class="card-header">{{ __('Dashboard') }}</div>-->
         
    
    
                <a href="{{route('company.import.progress')}}">Progress check</a>
             <h2>@{{progress}}</h2>   
             <h2>@{{pageTitle}}</h2>   
                
            <div class="span4">
             
                   <div class="progress progress-striped active">
                      <div class="bar" role="progressbar"
                           :aria-valuenow="progressPercentage"
                           aria-valuemin="0"
                           aria-valuemax="100" :style="`width: ${progressPercentage}%` ">@{{progressPercentage}}%</div>
                  </div>
  
                 </div>  
   
</div>
     
     
        
     </body>
    
    
    <script src="https://unpkg.com/vue@3"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    
    
    
    <script type="text/javascript">
         
         const app = {
             data(){
                 return {
                     progress : "welcome to progress page",
                     progressTitle : "progress of uploads",
                     progressPercentage : 0,
                     params : {
                         id : null
                     }
                 }
             },
             methods :{
                 checkIfIdPresent(){
                     const urlSearchParams = new URLSearchParams(window.location.search);
                     const params = Object.fromEntries(urlSearchParams.entries());
                     
                     if(params.id){
                         this.params.id= params.id;
                     }
                     
                     //console.log(params);
                 },
                 
                 getUploadProgress(){
                     let = self = this;
                      self.checkIfIdPresent();
                     
                     let progressResponse = setInterval(() => {
                         axios.get('progress/data',{
                                   params: {
                                       id : self.params.id ? self.params.id : 
                                       "{{session()->get('lastBatchId')}}",
                                   }
                                   
                                   }).then(function(response){
                                console.log(response.data) ;
                             let totalJobs =  parseInt(response.data.total_jobs);
                             let pendingJobs = parseInt(response.data.pending_jobs);
                             let completedJobs  =   totalJobs - pendingJobs;
                               
                             if(pendingJobs == 0){
                                 self.progressPercentage = 100;
                             }else{
                                 self.progressPercentage =  parseInt(completedJobs / totalJobs *100 ).toFixed(0);
                             }
                             if(parseInt(self.progressPercentage) >=100){
                                 clearInterval(progressResponse);
                             }else
                                 {
                                     
                                 }
                             
                         });
                    },1000);
                 }
                 
             },
             created(){
                 this.getUploadProgress();
             }
         }
         
         
         Vue.createApp(app).mount('#app');
     </script>   
        
        
        
 
        
    
    
    
</html>