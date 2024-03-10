 
@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">

                     <nav class="navbar navbar-expand-lg bg-body-tertiary">
                      <div class="container-fluid">
                         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                          <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                          <ul class="navbar-nav">
                            <li class="nav-item">
                              <a class="nav-link active" aria-current="page" href="{{route('home')}}">Home</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{route('company.import.companies')}}">Companies</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" href="{{route('company.import.progress')}}">Progress Bar</a>
                            </li>
 
                          </ul>
                        </div>
                      </div>
                    </nav>
                    
 
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
            
        <div class="container" id="app">
      
              <h2>@{{progress}}</h2>   
             <h2>@{{pageTitle}}</h2>   
                
            <div class="span4">
             
                   <div class="progress progress-striped active">
                      <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"
                           :aria-valuenow="progressPercentage"
                           aria-valuemin="0"
                           aria-valuemax="100" :style="`width: ${progressPercentage}%` ">@{{progressPercentage}}%</div>
                  </div>
  
                 </div>  
   
         </div>
                    
                    
                 </div>
            </div>
        </div>
    </div>
</div>
@endsection


 