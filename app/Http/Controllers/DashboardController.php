<?php

namespace App\Http\Controllers;

use App\Models\Country;

class DashboardController extends Controller
{
	public function dashboard()
	{
		$countries = Country::all();
		$totalDeaths = $countries->sum('deaths');
		$totalConfirmed = $countries->sum('confirmed');
		$totalRecovered = $countries->sum('recovered');

		return view('components.dashboard', [
			'countries'      => Country::all(),
			'totalConfirmed' => $totalConfirmed,
			'totalDeaths'    => $totalDeaths,
			'totalRecovered' => $totalRecovered,
		]);
	}

	public function byCountry()
	{
		$countries = Country::all();
		$totalDeaths = $countries->sum('deaths');
		$totalConfirmed = $countries->sum('confirmed');
		$totalRecovered = $countries->sum('recovered');
		return view('components.by-country', [
			'countries'      => Country::oldest()->filter(request(['search', 'sortLocation', 'sortNewCases', 'sortDeaths', 'sortRecovered']))->get(),
			'totalConfirmed' => $totalConfirmed,
			'totalDeaths'    => $totalDeaths,
			'totalRecovered' => $totalRecovered,
		]);
	}
}
