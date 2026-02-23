@props([
    'name' => 'content',
    'value' => '',
    'placeholder' => 'Schreib hier deine Inhalte...',
])

<div class="editor-field mt-3 min-w-0 w-full max-w-full overflow-x-hidden">
    <textarea 
        name="{{ $name }}"
        data-editor
        placeholder="{{ $placeholder }}"
        {{ $attributes->class([
            'bg-white w-full max-w-full min-w-0 p-3 sm:p-4 border rounded-2xl min-h-40 wrap-break-word',
            'border-gray-200' => ! $errors->has($name),
            'border-red-400' => $errors->has($name),
        ]) }}>{{ $value }}</textarea>
</div>
