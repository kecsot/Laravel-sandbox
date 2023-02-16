<x-app-layout>
    <x-slot name="title">
        {{ __('Add new permission to ') }} '{{$role->name}}' {{ __('role') }}
    </x-slot>

    <x-slot name="content">
        <div>
            @if(empty($permissions))
                <div>
                    <span
                        class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{__('There is no more available permission for this role.')}}</span>
                </div>
            @else
                <form method="post" action="{{ route('roles.permissions.store', $role)  }}" class="grid gap-4">
                    @csrf

                    <div>
                        <x-input-label for="permission" :value="__('Select permission')"/>
                        <select id="permission" name="permission">
                            @foreach($permissions as $key => $permission)
                                <option value="{{$key}}">{{$permission}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <x-primary-button type="submit">Add</x-primary-button>
                    </div>
                </form>
            @endif
        </div>
    </x-slot>
</x-app-layout>
