<x-app-layout>
    <x-slot name="title">
        {{ __('Edit') }}
    </x-slot>

    <x-slot name="content">
        <form method="POST" action="{{ route('podcasts.update', $podcast) }}">
            @csrf
            @method('patch')

            <div>
                <label for="name">Name:*</label>
                <input type="text" name="name" value="{{$podcast->name}}"/>
            </div>

            <button type="submit">Update</button>
        </form>
    </x-slot>

</x-app-layout>
