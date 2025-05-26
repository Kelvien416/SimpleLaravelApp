<div class="relative overflow-x-auto my-5">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    User ID
                </th>
                <th scope="col" class="px-6 py-3">
                    Active
                </th>
                <th scope="col" class="px-6 py-3">
                    Department
                </th>
                <th scope="col" class="px-6 py-3">
                    Position
                </th>
                <th scope="col" class="px-6 py-3">
                    Start
                </th>
                <th scope="col" class="px-6 py-3">
                    End
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employee as $emp)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $emp->user_id }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $emp->active }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $emp->department_id }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $emp->position_id }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $emp->start_date }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $emp->end_date }}
                    </td>
                </tr>
            @endforeach


        </tbody>
    </table>
</div>
