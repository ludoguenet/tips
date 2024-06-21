<?php

use App\Http\Controllers\StoreStatisticController;
use App\Http\Resources\StatisticResource;
use App\Jobs\SendInvoice;
use App\Models\Statistic;
use App\Models\User;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;

Route::get('pluck', function () {
    $collection = collect([
        ['color' => 'blue' , 'qty' => 2],
        ['color' => 'green' , 'qty' => 5],
        ['color' => 'yellow' , 'qty' => 3],
    ]);

    return $collection->pluck('qty', 'color');
});

Route::get('stats', function () {
    $stats = static function () {
        foreach(Statistic::lazy() as $index => $statistic) {
            yield StatisticResource::make($statistic);

            if (($index + 1) % 100 === 0) {
                flush();
            }
        }

        flush();
    };

    return Response::streamJson(['data' => $stats()]);
});

Route::post('store-statistics', StoreStatisticController::class)->name('statistics.store');

Route::get('send-invoices', function () {
    Bus::batch(
        User::query()
            ->lazy()
            ->mapInto(SendInvoice::class),
    )->dispatch();
});

Route::get('race-conditions', function () {
    //
});

