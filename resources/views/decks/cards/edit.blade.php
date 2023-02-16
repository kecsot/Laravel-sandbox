<x-app-layout>
    <x-slot name="title">
        {{ __('Edit card: ') }} {{$card->name}}
    </x-slot>

    <x-slot name="content">
        <div>
            <form method="POST" action="{{ route('decks.cards.update', [$deck, $card]) }}" class="grid gap-4">
                @csrf
                @method('patch')

                <div>
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" type="text" name="name" value="{{$card->name}}" />
                </div>

                <div>
                    <x-primary-button type="submit">Update</x-primary-button>
                </div>
            </form>
        </div>
    </x-slot>

</x-app-layout>
