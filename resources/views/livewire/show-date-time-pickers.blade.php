<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Look Ma - A Picker') }}
        </h2>
    </x-slot>

    <div class="py-12 px-2 relative">

        {{ $this->table }}

    </div>
</div>
