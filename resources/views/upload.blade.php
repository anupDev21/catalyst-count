 
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
        
//        print_r($batch);
        ?>
    
<div class="container" id="app">
     
         
            
<!--                <div class="card-header">{{ __('Dashboard') }}</div>-->
         
    
    
            <a href="{{route('company.import.progress')}}">Progress check</a>
             
                
            <div class="span4">
            <form action="{{ route('company.import.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="file" name="csv" id="csv">
            <input type="submit" value="Upload">
            </form>   
         
            </div>  
                
                
                @if(!is_null($batch))
                
                <div class="mt-4">
                
                {{$batch->processedJobs()}} completed out of {{$batch->totalJobs }}
                ({{$batch->progress()}}%)
                </div>  
                @endif
         
            
         
     
</div>
     
     
        
     </body>
    
    
    <script src="https://unpkg.com/vue@3"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    
    
    
    <script type="text/javascript">
         
//         const app = {
//             data(){
//                 return {
//                     progress : "welcome to progress page",
//                     progressTitle : "progress of uploads",
//                     progressPercentage : 0,
//                     params : {
//                         id : null
//                     }
//                 }
//             },
//             methods :{
//                 checkIfIdPresent(){
//                     const urlSearchParams = new URLSearchParams(window.location.search);
//                     const params = Object.fromEntries(urlSearchParams.entries());
//                     
//                     if(params.id){
//                         this.params.id= params.id;
//                     }
//                     
//                     //console.log(params);
//                 },
//                 
//                 getUploadProgress(){
//                     let = self = this;
//                      self.checkIfIdPresent();
//                     
//                     let progressResponse = setInterval(() => {
//                         axios.get('progress/data',{
//                                   params: {
//                                       id : self.params.id ? self.params.id : 
//                                       "{{session()->get('lastBatchId')}}",
//                                   }
//                                   
//                                   }).then(function(response){
//                                console.log(response.data) 
//                         });
//                    },1000);
//                 }
//                 
//             },
//             created(){
//                 this.getUploadProgress();
//             }
//         }
//         
//         
//         Vue.createApp(app).mount('#app');
     </script>   
        
        
        
 
<!--
    @if(!is_null($batch) && $batch->progress() < 100 ) 
    <script>
       window.setInterval('refresh()',2000);
        function refresh(){
        window.location.reload();
        }
    </script>    
     @endif   
-->
        
    
    
    
</html>