<x-app-layout>
    <x-slot name="title">
        {{ __('Edit') }}
    </x-slot>

    <x-slot name="content">
        <div>
            <form method="POST" action="{{ route('decks.update', $deck) }}" class="grid gap-4">
                @csrf
                @method('patch')

                <div>
                    <x-input-label for="name" :value="__('Name')"/>
                    <x-text-input id="name" type="text" name="name" value="{{$deck->name}}"/>
                </div>
                <div>
                    <x-input-label for="description" :value="__('Description')"/>
                    <x-text-input id="description" type="text" name="description" value="{{$deck->description}}"/>
                </div>

                <div>
                    <x-primary-button type="submit">Update</x-primary-button>
                </div>
            </form>
        </div>
    </x-slot>

</x-app-layout>
