<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Employee Detail') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="max-w-7xl sm:px-6 lg:px-8 mb-4 flex justify-start">
                <x-primary2-button href="/employee/">Back</x-primary2-button>
            </div>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="relative overflow-x-auto my-5">
                        <p>{{ $employee->id }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
