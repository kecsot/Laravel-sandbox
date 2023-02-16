<x-app-layout>
    <x-slot name="title">
        {{ __('Create new deck') }}
    </x-slot>

    <x-slot name="content">
        <div>
            <form method="post" action="{{ route('decks.store') }}" class="grid gap-4">
                @csrf

                <div>
                    <x-input-label for="name" :value="__('Name')"/>
                    <x-text-input id="name" type="text" name="name" />
                </div>
                <div>
                    <x-input-label for="description" :value="__('Description')"/>
                    <x-text-input id="description" type="text" name="description" />
                </div>

                <div>
                    <x-primary-button type="submit">Create</x-primary-button>
                </div>
            </form>
        </div>
    </x-slot>
</x-app-layout>
