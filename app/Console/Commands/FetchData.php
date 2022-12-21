<?php

namespace App\Console\Commands;

use App\Models\Country;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class FetchData extends Command
{
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'fetch:data';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Fetch countries data';

	/**
	 * Execute the console command.
	 *
	 * @return int
	 */
	public function handle()
	{
		$countries = Http::timeout(60000)->get('https://devtest.ge/countries')->json();
		foreach ($countries as $country)
		{
			$stats = Http::timeout(60000)->post('https://devtest.ge/get-country-statistics', [
				'code' => $country['code'],
			])->json();
			Country::create([
				'name'      => [
					'en' => $country['name']['en'],
					'ka' => $country['name']['ka'],
				],
				'code'      => $country['code'],
				'country'   => $stats['country'],
				'confirmed' => $stats['confirmed'],
				'recovered' => $stats['recovered'],
				'deaths'    => $stats['deaths'],
			]);
		}
	}
}
