<x-app-layout>
    <x-slot name="title">
        {{ __('Deck: ') }} {{ $deck->name }}
    </x-slot>

    <x-slot name="operations">
        <x-secondary-link :href="route('decks.edit', $deck)">Edit deck</x-secondary-link>
        <x-delete-modal-button
            uniqueKey='decks.show.delete'
            buttonText="{{__('Delete Deck')}}"
            title="{{__('Delete Deck')}}"
            :route="route('decks.destroy', $deck)">

            {{__('Are you sure want to delete this deck?')}}
        </x-delete-modal-button>
    </x-slot>

    <x-slot name="content">
        <x-label-value label="{{__('Name')}}" :value="$deck->name"/>
        <x-label-value label="{{__('Description')}}" :value="$deck->description"/>


        <div class="w-full p-6 mb-4 mt-4 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <div class="mb-2">
                <span class="text-lg tracking-tight dark:text-white">{{__('Cards')}}</span>
            </div>

            <x-secondary-link :href="route('decks.cards.create', $deck)">Add card</x-secondary-link>

            <div>
                @foreach ($deck->cards as $card)
                    @include('decks.cards.partials.item', [$deck, $card])
                @endforeach
            </div>
        </div>

    </x-slot>
</x-app-layout>
