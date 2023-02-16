<x-app-layout>
    <x-slot name="title">
        {{ __('Edit') }}
    </x-slot>

    <x-slot name="content">
        <div>
            <form method="POST" action="{{ route('roles.update', $role) }}" class="grid gap-4">
                @csrf
                @method('patch')

                <div>
                    <x-input-label for="name" :value="__('Name')"/>
                    <x-text-input id="name" type="text" name="name" value="{{$role->name}}"/>
                </div>

                <div>
                    <x-primary-button type="submit">Update</x-primary-button>
                </div>
            </form>
        </div>
    </x-slot>

</x-app-layout>
