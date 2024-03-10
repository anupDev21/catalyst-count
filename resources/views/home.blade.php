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
            <div class="input-group">
              <label for="formFile" class="form-label text-center"> Upload Company Datas</label>
            <form class="input-group" action="{{ route('company.import.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input class="form-control" type="file" name="csv" id="csv">
            <input type="submit" value="Upload" class="btn btn-outline-secondary">
            </form> 
             </div>
                 </div>
            </div>
        </div>
    </div>
</div>
@endsection
