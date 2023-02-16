<x-app-layout>
    <x-slot name="title">
        {{ __('Podcasts') }}
    </x-slot>

    <x-slot name="content">
        @foreach ($podcasts as $podcast)
            <div class="d-flex">
                <div>{{ $podcast->name }}</div>
                <x-primary-link :href="route('podcasts.show', $podcast)">Detail</x-primary-link>
                <x-primary-link :href="route('podcasts.edit', $podcast)">Edit</x-primary-link>

                <form action="{{ route('podcasts.destroy', $podcast)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </div>
        @endforeach
    </x-slot>
</x-app-layout>
