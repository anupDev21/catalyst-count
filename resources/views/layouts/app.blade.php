<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

   

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('public/frontend/css/bootstrap.min.css') }}" rel="stylesheet">
    
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    Catalyst
                </a>
                
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                           
                        
                                <li class="nav-item dropdown">
                                  <a class="nav-link" style="float:right;" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>  
                                    
                                    
<!--
                                  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                     {{ Auth::user()->name }}
                                  </a>
                                  <ul class="dropdown-menu">
                                      <li><a class="dropdown-item" href="#">my profile</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="#">account</a></li>
                                    <li><a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a></li>
-->
                                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                      
                                    
                                  </ul>
                                </li>
                        
                        
                        
                        
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    
     
    
    
    
     <!-- Scripts -->
    <script src="{{ asset('public/frontend/js/bootstrap.bundle.min.js') }}" defer></script>
    <script src="{{ asset('public/frontend/js/jquery-3.7.1.min.js') }}" defer></script>
    
     
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
    
   
     <link href="{{ asset('public/frontend/css/dataTables.dataTables.min.css') }} " rel="stylesheet">
 
    <script src="{{ asset('public/frontend/js/dataTables.min.js') }} " ></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js" ></script>
    <script src="{{ asset('public/frontend/js/dataTables.js') }} " ></script>
    <script src="{{ asset('public/frontend/js/dataTables.bootstrap5.js') }} " ></script>
    


<!--    <script src="//cdn.datatables.net/2.0.2/js/dataTables.min.js" ></script>-->
    <script>
       //$.noConflict();
        
        new DataTable('#mydataTable');
       
    
    </script>
    
    @stack('other-scripts')
    
</body>
</html>
