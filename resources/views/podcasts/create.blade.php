<x-app-layout>
    <x-slot name="title">
        {{ __('Create new podcast') }}
    </x-slot>

    <x-slot name="content">
        <div>
            <form method="post" action="{{ route('podcasts.store') }}">
                @csrf

                <div>
                    <label for="name">Name:*</label>
                    <input type="text" name="name"/>
                </div>

                <button type="submit">Create</button>
            </form>
        </div>
    </x-slot>
</x-app-layout>
