<div class="bg-white shadow rounded p-4 flex items-center space-x-4">
    <div class="p-3 rounded-full text-white" style="background-color: {{ $color }}">
        {!! $icon !!}
    </div>
    <div>
        <p class="text-sm text-gray-500">{{ $title }}</p>
        <p class="text-xl font-bold">{{ $count }}</p>
    </div>
</div>
