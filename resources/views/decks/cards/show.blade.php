<x-app-layout>
    <x-slot name="title">
        {{ __('Detail of card: ') }} {{$card->name}}
    </x-slot>

    <x-slot name="content">
        <x-label-value label="{{__('Name')}}" :value="$card->name"/>
    </x-slot>
</x-app-layout>
