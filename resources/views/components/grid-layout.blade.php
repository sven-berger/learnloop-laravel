@props([
  'cols' => 2,
])

@php
  $colsInt = (int) $cols;
  $colsInt = max(1, min(6, $colsInt));

  $colsMap = [
    1 => 'lg:grid-cols-1',
    2 => 'lg:grid-cols-2',
    3 => 'lg:grid-cols-3',
    4 => 'lg:grid-cols-4',
    5 => 'lg:grid-cols-5',
    6 => 'lg:grid-cols-6',
  ];

  $colsClass = $colsMap[$colsInt] ?? $colsMap[2];
@endphp

<div {{ $attributes->merge(['class' => "grid grid-cols-1 gap-2.5 {$colsClass}"]) }}>
  {{ $slot }}
</div>

