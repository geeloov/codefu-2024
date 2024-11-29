<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class AirPollutionController extends Controller
{   

    public function index(){
        return view('forecast');
    }
    public function showForecast($type)
    {   
        
        if (!in_array($type, ['pm10', 'pm25', 'no2'])) {
            return response()->json(['error' => 'Invalid pollution type'], 400);
        }

        $yesterday = Carbon::yesterday('Europe/Skopje');
        $today = Carbon::today('Europe/Skopje');

        $fromDateTimeYesterday = urlencode($yesterday->startOfDay()->format('Y-m-d\TH:i:sP'));
        $toDateTimeYesterday = urlencode($yesterday->endOfDay()->format('Y-m-d\TH:i:sP'));
        $fromDateTimeToday = urlencode($today->startOfDay()->format('Y-m-d\TH:i:sP'));
        $toDateTimeToday = urlencode($today->endOfDay()->format('Y-m-d\TH:i:sP'));

        $cityName = 'skopje';
        $urlYesterday = "https://{$cityName}.pulse.eco/rest/avgData/day?sensorId=-1&type={$type}&from={$fromDateTimeYesterday}&to={$toDateTimeYesterday}";
        $urlToday = "https://{$cityName}.pulse.eco/rest/overall";

        $responseYesterday = Http::get($urlYesterday);
        $dataYesterday = $responseYesterday->successful() ? $responseYesterday->json() : ['error' => 'Failed to retrieve yesterday\'s data'];

        $responseToday = Http::get($urlToday);
        $dataToday = $responseToday->successful() ? $responseToday->json() : ['error' => 'Failed to retrieve today\'s data'];


        return response()->json([
            'yesterday' => $dataYesterday[0]['value'],
            'today' => $dataToday['values'][$type],
        ]);
       
    }

}
