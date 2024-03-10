@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

 <div class="card-body">
       
     
     <?php
//     echo "<pre>";
//     print_r($data);
//     die();
     
     ?>
     
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
     
                 @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
                @endif
     
                <table id="mydataTable" class="table table-bordered">
     
                    <thead>
                    <tr>
                        <th>Company ID</th>
                        <th>Name</th>
                        <th>Domain</th>
                        <th>Year Founded</th>
                        <th>Industry</th>
                        <th>size Range</th>
                         <th>Country</th>
                         <th>Action</th>
                         
                        
                    </tr>
                    </thead>
                    
                    
                    <tbody>
                    @foreach( $data as $company)
                       <tr>
                        <td>{{$company->company_id}}</td>
                        <td>{{$company->name}}</td>
                        <td>{{$company->domain}}</td>
                        <td>{{$company->year_founded}}</td>
                        <td>{{$company->industry}}</td>
                        <td>{{$company->size_range}}</td>
                        <td>{{$company->country}}</td>
                        <td><button type="button"  data-bs-toggle="modal" data-bs-target="#editModal" class="btn btn-sm btn-primary editBtn"
                                                data-name="{{ __($company->name) }}"  data-domain="{{ __($company->domain) }}"    data-year_founded="{{ __($company->year_founded) }}"   data-industry="{{ __($company->industry) }}"   data-size_range="{{ __($company->size_range) }}"   data-locality="{{ __($company->locality) }}"   data-country="{{ __($company->country) }}" data-linkedin_url="{{ __($company->linkedin_url) }}"    data-current_employee_estimate="{{ __($company->current_employee_estimate) }}" data-total_employee_estimate="{{ __($company->total_employee_estimate) }}"  
                                                 
                                                data-action="{{ route('company.import.update', $company->id) }}"
                                                data-original-title="Update">
                                            Edit

 
                                        </button></td> 
                         







                        </tr> 
                     @endforeach   
                        
                    </tbody>
     
                </table>
     
     
     <div id="editModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"> Update</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    
                </div>
                <form action="" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group mb-3">
                             <input type="text" class="form-control" placeholder="Name" name="name" required>
                         </div>
                          <div class="form-group mb-3">
                             <input type="text" class="form-control" placeholder="Domain" name="domain" required>
                         </div>
                        <div class="form-group mb-3">
                             <input type="text" class="form-control" placeholder="year founded" name="year_founded" required>
                         </div>
                        <div class="form-group mb-3">
                             <input type="text" class="form-control" placeholder="industry" name="industry" required>
                         </div>
                        <div class="form-group mb-3">
                             <input type="text" class="form-control" placeholder="size range" name="size_range" required>
                         </div>
                        <div class="form-group mb-3">
                             <input type="text" class="form-control" placeholder="locality" name="locality" required>
                         </div>
                        <div class="form-group mb-3">
                             <input type="text" class="form-control" placeholder="country" name="country" required>
                         </div>
                        <div class="form-group mb-3">
                             <input type="text" class="form-control" placeholder="linkedin url" name="linkedin_url" required>
                         </div>
                         <div class="form-group mb-3">
                             <input type="text" class="form-control" placeholder="current employee estimate" name="current_employee_estimate" required>
                         </div>
                         <div class="form-group mb-3">
                             <input type="text" class="form-control" placeholder="total employee estimate" name="total_employee_estimate" required>
                         </div>
                    </div>
                    <div class="modal-footer">
                     
                         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
                 </div>
            </div>
        </div>
    </div>
</div>



@endsection
@push('other-scripts')
<script>
   $('.editBtn').on('click', function () {
       
                var modal = $('#editModal');
                modal.find('form').attr('action' ,$(this).data('action'));
                modal.find('input[name=name]').val($(this).data('name'));
       
                modal.find('input[name=domain]').val($(this).data('domain'));
                modal.find('input[name=year_founded]').val($(this).data('year_founded'));
                modal.find('input[name=industry]').val($(this).data('industry'));
                modal.find('input[name=size_range]').val($(this).data('size_range'));
                modal.find('input[name=locality]').val($(this).data('locality'));
                modal.find('input[name=country]').val($(this).data('country'));
                modal.find('input[name=linkedin_url]').val($(this).data('linkedin_url'));
                modal.find('input[name=current_employee_estimate]').val($(this).data('current_employee_estimate'));
                modal.find('input[name=total_employee_estimate]').val($(this).data('total_employee_estimate'));
         
                modal.modal('show');
            });
</script>
@endpush