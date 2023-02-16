<x-app-layout>
    <x-slot name="title">
        {{ __('Create new role') }}
    </x-slot>

    <x-slot name="content">
        <div>
            <form method="post" action="{{ route('roles.store') }}" class="grid gap-4">
                @csrf

                <div>
                    <x-input-label for="name" :value="__('Name')"/>
                    <x-text-input id="name" type="text" name="name" />
                </div>

                <div>
                    <x-primary-button type="submit">Create</x-primary-button>
                </div>
            </form>
        </div>
    </x-slot>
</x-app-layout>
