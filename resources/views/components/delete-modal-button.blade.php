@props(['uniqueKey', 'route', 'buttonText', 'title'])

<x-modal name="confirm-{{$uniqueKey}}-deletion" focusable>
    <div class="w-full p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $title }}</h5>

        <div class="mb-3 font-normal text-gray-700 dark:text-gray-400">
            {{ $slot }}
        </div>

        <div class="flex" >
            <form class="mr-1" action="{{ $route }}" method="post">
                @csrf
                @method('DELETE')
                <x-secondary-button type="submit">
                    {{ $buttonText }}
                </x-secondary-button>
            </form>

            <x-primary-button x-on:click="$dispatch('close')">
                {{ __('Cancel') }}
            </x-primary-button>
        </div>
    </div>
</x-modal>

<x-danger-button x-data="" x-on:click.prevent="$dispatch('open-modal', 'confirm-{{$uniqueKey}}-deletion')">
    {{ $buttonText }}
</x-danger-button>
