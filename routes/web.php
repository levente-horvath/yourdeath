<?php

use App\Http\Controllers\ProfileController;
use App\Models\LifeData;
use Illuminate\Support\Facades\Route;
use Carbon\Carbon;
use  App\Http\Controllers\whoApiController;

Route::get('/', function () {

    $categories = App\Models\Country::all();

    return view('welcome', [ 'categories' => $categories]);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/statistics', function () {
    return view('statistic');
})->middleware(['auth', 'verified'])->name('statistics');



Route::get('/visualize', function () {
    return view('visualize');
});



Route::get('/geth', function () {

    $whoApi = new whoApiController();
    $data = $whoApi->showData("HRV", 2004, "Female");

    return view('geth', compact('data'));
});



Route::post('/visualize', function(){

    $birthyear = Carbon::parse(request('dob'))->year; 


    $birthmonth = Carbon::parse(request('dob'))->month; 
    
    $birthday = Carbon::parse(request('dob'))->day;

    $sex = request('gender');

    //$nationality = request('country');
    
    list($code, $country) = explode('-', request('country'));
    
    $nationality = $code;

    $whoApi = new whoApiController();
    
    $data = $whoApi->showData($nationality, $birthyear, $sex);
    
    $currentYear = Carbon::now()->year;

    $percentage = round(($currentYear - $birthyear)  /$data*100, 2);

    $intPercentage = round($percentage);


    LifeData::create(
        [
            'birthdate' => request('dob'),
            'nationality' => request('country'),
            'gender' => request('gender'),
            'lifeexpectancy' => $data,
        ]
        );
        
        return redirect('visualize')
        ->with('percentage', $percentage)
        ->with('intPercentage', $intPercentage)
        ->with('birthyear', $birthyear)
        ->with('sex', $sex)
        ->with('nationality', $country)
        ->with('data', $data)
        ->with('currentYear', $currentYear)
        ->with('age', $currentYear - $birthyear)
        ->with('birthmonth', $birthmonth)
        ->with('birthday', $birthday);
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
