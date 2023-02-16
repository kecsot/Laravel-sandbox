<div
    class="w-full p-6 mb-4 mt-4 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
    <div class="mb-2">
        <span class="text-lg tracking-tight dark:text-white">{{__('Permissions:')}}</span>
    </div>

    <x-secondary-link :href="route('roles.permissions.create', $role)">Add permission to role</x-secondary-link>

    @foreach($role->permissions as $permission)

        <div>
            <span class="dark:text-white">{{$permission->permission}}</span>
            <x-delete-modal-button
                uniqueKey='roles.permissions.destroy.{{$permission->role}}-{{$permission->permission}}'
                buttonText="{{__('Revoke')}}"
                title="{{__('Revoke')}}"
                :route="route('roles.permissions.destroy', [$role, $permission])">

                {{__('Are you sure want to revoke this permission?')}}
            </x-delete-modal-button>
        </div>
    @endforeach
</div>
