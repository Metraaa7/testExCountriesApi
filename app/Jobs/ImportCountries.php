<?php

namespace App\Jobs;

use App\Models\Country;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;

class ImportCountries implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public int $tries = 3;
    public array $backoff = [60, 120, 240];
    public int $timeout = 120;


    public function handle(): void
    {
        $response = Http::get('https://restcountries.com/v3.1/all');
        $countries = $response->json();

        foreach ($countries as $country) {
            Country::updateOrCreate(
                ['code' => $country['cca2']],
                [
                    'name' => $country['name']['common'],
                    'capital' => $country['capital'][0] ?? null,
                    'region' => $country['region'] ?? null,
                    'subregion' => $country['subregion'] ?? null,
                    'languages' => implode(', ', $country['languages'] ?? [])
                ]
            );
        }
    }
}
