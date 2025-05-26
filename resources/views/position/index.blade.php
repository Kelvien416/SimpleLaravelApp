<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Position List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl sm:px-6 lg:px-8 mb-4 flex justify-end">
            <x-primary2-button href="/position/create">Add Position</x-primary2-button>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="relative overflow-x-auto my-5">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Position ID
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Position Name
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Active
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Created
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        End
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($position as $pos)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $pos->id }}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ $pos->name }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $pos->active }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $pos->start_date }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $pos->end_date }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="mt-20">{{ $position->links() }}</div>
                    </div>
                    {{-- <x-new-employee></x-new-employee> --}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
