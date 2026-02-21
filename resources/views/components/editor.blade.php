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
        {{ $attributes->class([
            'bg-white w-full p-4 border rounded-2xl h-40',
            'border-gray-200' => ! $errors->has($name),
            'border-red-400' => $errors->has($name),
        ]) }}>{{ $value }}</textarea>
</div>