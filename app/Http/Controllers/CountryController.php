<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class CountryController extends Controller
{
    public function index(): View
    {
        $countries = Country::all();
        return view('countries.index', compact('countries'));
    }

    public function show($code): View
    {
        $country = Country::query()->where('code', $code)->firstOrFAil();
        return view('countries.show', compact('country'));
    }
}
