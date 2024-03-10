<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\CompanyCSVData;
use Illuminate\Support\Facades\Bus;
use App\Models\JobBatch;
use DB;
use App\Models\Company;
class CompanyImportController extends Controller
{
    
    
     public function __construct()
    {
        $this->middleware('auth');
    }
     
    
     public function index(Request $request) {
         $batch = null;
         
         if($request->batch_id){
             $batch = Bus::findBatch($request->batch_id);
         }
         
         
//         $batchId = $request->id ??  session()->get('lastBatchId');
//         //dd($batchId);
//         if(JobBatch::where('id',$batchId)->count())
//         {
//             $response = JobBatch::where('id',$batchId)->first();
//             return response()->json($response);
//        }
         
         
        return view('upload', compact('batch'));
    }
    
    public function progress() {
       
        return view('progress');
    }
    
     public function progressResponse(Request $request) {
         
         $batchId = $request->id ??  session()->get('lastBatchId');
        // dd($batchId);
         if(JobBatch::where('id',$batchId)->count())
         {
             $response = JobBatch::where('id',$batchId)->first();
              
             return response()->json($response);
        }
         
         
       // return view('progress');
    }
    
    
    
    
    
    public function store(Request $request) {
        
         if (request()->has('csv')) {
             
             $csv = file(request()->csv);
             $chunks = array_chunk($csv, 500);
            // dd($chunks);
             
            $header = [];
            $batch = Bus::batch([])->dispatch();  
             
            foreach($chunks as $key => $chunk) {
                
                $data = array_map('str_getcsv', $chunk);

                if ($key === 0) {
                    $header = $data[0];
                    unset($data[0]);
                }
                
                $batch->add(new CompanyCSVData($data,$header));
                // Start The Job
                //CompanyCsvProcess::dispatch($data, $header);
            }
             session()->put('lastBatchId',$batch->id);
              
             return redirect('/progress?id='. $batch->id);
             
         }
        
        return redirect()->route('company.import.index')
                        ->with('success','csv import added on queue, will update you once done');
        
    }
    
    
     public function companies() {
       
        $data = Company::get();
         
        return view('company_list',compact('data')); 
         
    }
      
      public function companiesUpdate(Request $request, $id){
         
        $company = Company::find($request->id);
        $company->name = $request->name;
        $company->domain = $request->domain;
        $company->year_founded = $request->year_founded;
        $company->industry = $request->industry;
        $company->size_range = $request->size_range;
        $company->locality = $request->locality;
        $company->country = $request->country;
        $company->linkedin_url = $request->linkedin_url;
        $company->current_employee_estimate = $request->current_employee_estimate;
        $company->total_employee_estimate = $request->total_employee_estimate;
        $company->save();
          return redirect()->back()->with('message', 'data updated successfully!');;  
          
     }
    

     










    
    
}
