<div>
    {{$card->name}}

    <x-primary-link :href="route('decks.cards.show', [$deck, $card])">Detail</x-primary-link>
    <x-primary-link :href="route('decks.cards.edit', [$deck, $card])">Edit</x-primary-link>
    <x-delete-modal-button
        uniqueKey='decks.cards.partials.item.delete.{{$deck->id}}.{{$card->id}}'
        buttonText="{{__('Delete')}}"
        title="{{__('Delete card: ')}} {{$card->name}}"
        :route="route('decks.cards.destroy', [$deck,$card])">
        {{__('Are you sure want to delete this card?')}}
    </x-delete-modal-button>
</div>

