<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function index()
    {
        $countries = [
            ['code' => 'US', 'name' => 'United States'],
            ['code' => 'CA', 'name' => 'Canada'],
            ['code' => 'GB', 'name' => 'United Kingdom'],
            // Add all countries here or fetch from a database
        ];

        return response()->json([
            'success' => true,
            'data' => $countries
        ]);
    }
}
