<div class="w-full flex flex-col">
    <textarea
        name="{{ $name }}" 
        cols = "{{$cols}}"
        rows = "{{$rows}}"
        placeholder="{{ $placeholder }}" 
    ></textarea>
    @error($name)
        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
    @enderror
</div>
