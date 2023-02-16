<x-app-layout>
    <x-slot name="title">
        {{ __('Add new user to ') }} '{{$role->name}}' {{ __('role') }}
    </x-slot>

    <x-slot name="content">
        <div>
            @if($users->isEmpty())
                <div>
                    <span
                        class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{__('There is no more available user for this role.')}}</span>
                </div>
            @else
                <form method="post" action="{{ route('roles.users.store', $role)  }}" class="grid gap-4">
                    @csrf

                    <div>
                        <x-input-label for="uid" :value="__('Select user')"/>
                        <select id="uid" name="uid">
                            @foreach($users as $key => $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>
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
