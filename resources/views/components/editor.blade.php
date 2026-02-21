@props([
    'name' => 'content',
    'value' => '',
    'placeholder' => 'Schreib hier deine Inhalte...',
])

<div class="editor-field mt-3">
    <textarea 
        name="{{ $name }}"
        data-editor
        placeholder="{{ $placeholder }}"
        {{ $attributes->merge(['class' => 'bg-white w-full p-4 border border-gray-200 rounded-2xl h-40']) }}>{{ $value }}</textarea>
</div>