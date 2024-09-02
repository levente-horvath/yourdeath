<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class whoApiController extends Controller
{
    public function showData($countryCode, $birthyear, $sex)
    {
        // At first, it tries to ping the custom-made REST API
        $api_works = true;
        
        /*
        try {
            $response = Http::get("http://0.0.0.0:8000/country={$countryCode}/birthyear={$birthyear}/sex={$sex}");
            
            if ($response->successful()) {
                return $response->body();
            } else {
                $api_works = false;
            }
        } catch (\Exception $e) {
            // A logging system would be nice
        }
        */

        if($api_works) {
            // If the first API call fails, it implents the same logic the API would have done but locally
            if ($sex === 'Female') {
                $url = "http://apps.who.int/gho/athena/api/GHO/WHOSIS_000001.json?filter=COUNTRY:{$countryCode};SEX:FMLE";
            } elseif ($sex === 'combined') {
                $url = "http://apps.who.int/gho/athena/api/GHO/WHOSIS_000001.json?filter=COUNTRY:{$countryCode};SEX:BTSX";
            } else {
                $url = "http://apps.who.int/gho/athena/api/GHO/WHOSIS_000001.json?filter=COUNTRY:{$countryCode};SEX:MLE";
            }

            //API call to the WHO endpoint
            $response = Http::get($url);

            if ($response->successful()) {
                $jsonResponse = $response->json();

                $ageValueList = [];
                foreach ($jsonResponse["fact"] as $key => $value) {
                    
                    $currentYear = null;
                    $currentExpectancy = null;

                    foreach($value['Dim'] as $category){
                        if($category['category'] == 'YEAR') {
                            $currentYear = $category['code'];    
                        }
                    }
                    
                    $currentExpectancy = $value['value']['display'];                 
                        
                    $ageValueList[$currentYear] = $currentExpectancy;
                }


                foreach($ageValueList as $year => $value){
                    $ageValueList[abs($year - $birthyear)] = $value;
                }

            
                $smallestKey = min(array_keys($ageValueList)); 

                return $ageValueList[$smallestKey];

            } else {
                return 'Error';
            }
        }
    }
}
