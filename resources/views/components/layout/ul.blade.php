@props([
    'items' => [],
    'icon' => 'arrow-right',
    'iconType' => 'fas',
])

@php
    $validTypes = ['fas', 'far', 'fal', 'fab'];
@endphp
<ul {{ $attributes->merge(['class' => 'list-none space-y-2']) }}>
@foreach($items as $item)
      @php
        // Standard-Werte
        $itemIcon = $icon;
        $itemIconType = $iconType;
        $itemLabel = '';
        $itemHref = '#';

        // Wenn Item ein Array ist
        if (is_array($item)) {
            $itemLabel = $item['label'] ?? '';
            $itemHref = $item['href'] ?? '#';
            $itemIcon = $item['icon'] ?? $icon;  // Pro Item Icon
            $itemIconType = $item['iconType'] ?? $iconType;  // Pro Item IconType
        } else {
            $itemLabel = $item;
        }

        // Inline-Validierung statt Funktion
        $resolvedType = in_array($itemIconType, $validTypes) ? $itemIconType : 'fas';
    @endphp
            <li>
            <i class="{{ $resolvedType }} fa-{{ $itemIcon }}"></i>
            <a href="{{ $itemHref }}" class="ml-2 hover:underline">{{ $itemLabel }}</a>
        </li>
@endforeach
    {{ $slot }}
</ul>
