<x-app-layout>
    <x-slot name="title">
        {{ __('Roles') }}
    </x-slot>

    <x-slot name="operations">
        <x-secondary-link :href="route('roles.create')">Create Role</x-secondary-link>
    </x-slot>

    <x-slot name="content">
        <div class="flex flex-wrap w-100">
            @foreach ($roles as $role)
                <div
                    class="w-full p-6 mb-4 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <a href="{{route('roles.show', $role)}}">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $role->name }}</h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{$role->description}}</p>
                    <x-primary-link :href="route('roles.show', $role)">Detail</x-primary-link>
                </div>
            @endforeach
        </div>
    </x-slot>
</x-app-layout>
