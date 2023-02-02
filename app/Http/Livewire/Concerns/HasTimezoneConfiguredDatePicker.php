<?php

namespace App\Http\Livewire\Concerns;

use Illuminate\Support\Carbon;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\DateTimePicker;

trait HasTimezoneConfiguredDatePicker
{

    /**
     * Reporting data from traffic sources is already in the timezone the ad accounts were set up under.
     * (We try to set up all ad accounts in EST timezone)
     *
     * Furthermore, most reporting data downloaded from advertising APIs,
     * is already aggregated and has only the date available , so converting into EST would result in wrong statistics.
     *
     * Lead Distribution system records everything in app default timezone (UTC),
     * therefore reports displayed need to be converted into the timezone that our ad accounts are running in.
     *
     *
     * @param  string  $range  - valid values: month
     * @param  string  $timezone
     *
     * @return array
     */
    public function getTimezoneConfiguredDatePickerCombo(
        string $range = 'day',
        string $timezone = 'America/New_York',
    ): array {

        DateTimePicker::configureUsing(fn(DateTimePicker $component) => $component->timezone($timezone));

        $now = Carbon::now()->timezone($timezone);
        $startDate = $now;
        $endDate = $now;

        if ($range == 'month') {
            $startDate = $now->startOfMonth();
            $endDate = $now->copy()->endOfMonth();
        }

        return [
            Grid::make()
                ->schema([
                    DateTimePicker::make('date_from')
                        ->default($startDate)
                        ->format('yyyy-dd-mm')
                        ->withoutTime()
                        ->weekStartsOnMonday()
                        ->closeOnDateSelection(),
                    DateTimePicker::make('date_until')
                        ->default($endDate)
                        ->format('yyyy-dd-mm')
                        ->withoutTime()
                        ->weekStartsOnMonday()
                        ->closeOnDateSelection(),
                ]),
        ];
    }
}
