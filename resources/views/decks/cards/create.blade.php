<x-app-layout>
    <x-slot name="title">
        {{ __('Add new card to') }} '{{$deck->name}}' {{ __('deck') }}
    </x-slot>

    <x-slot name="content">

        <div>
            <form method="post" action="{{ route('decks.cards.store', $deck) }}" class="grid gap-4">
                @csrf

                <div>
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" type="text" name="name" required autofocus />
                </div>

                <div>
                    <x-primary-button type="submit">Create</x-primary-button>
                </div>
            </form>
        </div>
    </x-slot>
</x-app-layout>
