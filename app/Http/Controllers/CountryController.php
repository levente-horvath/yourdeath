<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country; 

class CountryController extends Controller
{
    public function index()
    {
        $categories = Country::all(); // Fetch all categories
    
    }
}
