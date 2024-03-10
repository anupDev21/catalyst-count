<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $fillable = [
        'company_id', 'name', 'domain', 'year_founded', 
        'industry', 'size_range', 'locality', 'country', 
        'linkedin_url', 'total_employee estimate','total_employee_estimate'
    ]; 
}
