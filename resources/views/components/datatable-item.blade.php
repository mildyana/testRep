<div class="flex item-center">
    {{$columnName}}
    @if ($sortColumn !== $columnName)
        <x-heroicon-c-chevron-up-down class="w-6 h-6"/>
    @elseif ($sortDirection === 'ASC')
        <x-heroicon-c-chevron-down class="w-6 h-6"/>
    @else
        <x-heroicon-c-chevron-up class="w-6 h-6"/>
    @endif
</div>