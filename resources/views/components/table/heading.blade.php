@props([
    'direction'=> 'asc',
    'sortBy' => 'id'
    ])

<th wire:click="sortBy('{{$sortBy}}')">
    {{$slot}}
    <i class="ri-sort-{{ $direction }}"></i>
</th>
