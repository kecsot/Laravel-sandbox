<div
    class="w-full p-6 mb-4 mt-4 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
    <div class="mb-2">
        <span class="text-lg tracking-tight dark:text-white">{{__('Users:')}}</span>
    </div>

    <x-secondary-link :href="route('roles.users.create', $role)">Add user to role</x-secondary-link>

    @foreach($role->users as $user)

        <div>
            <span class="dark:text-white">{{$user->name}}</span>

            <x-delete-modal-button
                uniqueKey='roles.users.destroy.{{$user->id}}'
                buttonText="{{__('Remove')}}"
                title="{{__('Remove')}}"
                :route="route('roles.users.destroy', [$role, $user])">

                {{__('Are you sure want to remove user from this role?')}}
            </x-delete-modal-button>
        </div>
    @endforeach
</div>
