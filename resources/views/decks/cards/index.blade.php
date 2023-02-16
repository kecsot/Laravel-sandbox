<x-app-layout>
    <x-slot name="title">
        {{ __('Cards of {deck}') }}
    </x-slot>

    <x-slot name="content">
        @foreach ($cards as $card)
            <div>
                <div>{{ $card->name }}</div>

                <x-primary-link :href="route('decks.cards.show', [$card->deck,$card])">Detail</x-primary-link>
                <x-primary-link :href="route('decks.cards.edit', [$card->deck,$card])">Edit</x-primary-link>

                <x-delete-modal-button uniqueKey='decks.card.index.delete.{{$card->id}}' :route="route('decks.cards.destroy', [$card->deck, $card])">Delete </x-delete-modal-button>
            </div>
        @endforeach
    </x-slot>
</x-app-layout>
