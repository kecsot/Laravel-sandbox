<x-app-layout>
    <x-slot name="title">
        {{ __('Detail') }}
    </x-slot>

    <x-slot name="content">
        <div>{{ $podcast->name }}</div>
    </x-slot>
</x-app-layout>
