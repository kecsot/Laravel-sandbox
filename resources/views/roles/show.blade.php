<x-app-layout>
    <x-slot name="title">
        {{ __('Role: ') }} {{ $role->name }}
    </x-slot>

    <x-slot name="operations">
        <x-secondary-link :href="route('roles.edit', $role)">Edit role</x-secondary-link>
        <x-delete-modal-button
            uniqueKey='roles.show.delete'
            buttonText="{{__('Delete Role')}}"
            title="{{__('Delete Role')}}"
            :route="route('roles.destroy', $role)">

            {{__('Are you sure want to delete this role?')}}
        </x-delete-modal-button>
    </x-slot>

    <x-slot name="content">
        <x-label-value label="{{__('Name')}}" :value="$role->name"/>


        @include('roles.partials.role-users')

        @include('roles.partials.role-permissions')
    </x-slot>
</x-app-layout>
