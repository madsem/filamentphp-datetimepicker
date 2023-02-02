<?php

namespace App\Http\Livewire;

use Filament\Tables;
use App\Models\State;
use Livewire\Component;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\Layout;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Http\Livewire\Concerns\HasTimezoneConfiguredDatePicker;

class ShowDateTimePickers extends Component implements Tables\Contracts\HasTable
{

    use Tables\Concerns\InteractsWithTable;
    use AuthorizesRequests;
    use HasTimezoneConfiguredDatePicker;

    public function isTableSearchable(): bool
    {
        return false;
    }


    public function render()
    {
        return view('livewire.show-date-time-pickers');
    }

    protected function getTableQuery(): Builder|Relation
    {
        return State::query();
    }


    protected function getTableColumns(): array
    {
        return [];
    }


    protected function getTableFiltersLayout(): ?string
    {
        return Layout::AboveContent;
    }


    protected function getTableFilters(): array
    {
        return [
            Filter::make('date')
                ->form($this->getTimezoneConfiguredDatePickerCombo('month')),
        ];
    }


    protected function getTableActions(): array
    {
        return [];
    }


    protected function isTableStriped(): bool
    {
        return true;
    }


    protected function getTableBulkActions(): array
    {
        return [];
    }


    protected function getTableRecordsPerPageSelectOptions(): array
    {
        return [];
    }


    protected function isTablePaginationEnabled(): bool
    {
        return false;
    }


    protected function shouldPersistTableFiltersInSession(): bool
    {
        return true;
    }


    protected function getTableEmptyStateHeading(): ?string
    {
        return 'No Reports match the filter criteria';
    }
}
