<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Employees') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            @include('alerts.success')
            <div class="flex justify-end">
                <a href="/employees/create" type="submit" class="inline-block mb-4 rounded border border-indigo-600  bg-indigo-600 px-12 py-3 text-sm font-medium text-white hover:bg-transparent hover:text-indigo-600 focus:outline-none focus:ring active:text-indigo-500" href="/download">
                    Create Employee
                </a>
            </div>
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="overflow-hidden overflow-x-auto border border-gray-200 rounded-lg">
                    <table class="min-w-full text-sm divide-y divide-gray-200">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-4 py-2 font-medium text-left text-gray-900 whitespace-nowrap">
                                    ID
                                </th>
                                <th class="px-4 py-2 font-medium text-left text-gray-900 whitespace-nowrap">
                                    First Name
                                </th>
                                <th class="px-4 py-2 font-medium text-left text-gray-900 whitespace-nowrap">
                                    Last Name
                                </th>
                                <th class="px-4 py-2 font-medium text-left text-gray-900 whitespace-nowrap">
                                    Email
                                </th>
                                <th class="px-4 py-2 font-medium text-left text-gray-900 whitespace-nowrap">
                                    Phone
                                </th>
                                <th class="px-4 py-2 font-medium text-left text-gray-900 whitespace-nowrap">
                                    Company
                                </th>
                                <th class="px-4 py-2 font-medium text-left text-gray-900 whitespace-nowrap">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach ($employees as $employee)
                            <tr>
                                <td class="px-4 py-2 text-gray-700 whitespace-nowrap">
                                    {{ $employee->id }}
                                </td>
                                <td class="px-4 py-2 text-gray-700 whitespace-nowrap">
                                    {{ $employee->first_name }}
                                </td>
                                <td class="px-4 py-2 text-gray-700 whitespace-nowrap">
                                    {{ $employee->last_name }}
                                </td>
                                <td class="px-4 py-2 text-gray-700 whitespace-nowrap">
                                    {{ $employee->email }}
                                </td>
                                <td class="px-4 py-2 text-gray-700 whitespace-nowrap">
                                    {{ $employee->phone }}
                                </td>
                                <td class="px-4 py-2 text-gray-700 whitespace-nowrap">
                                    {{ $employee->company->name }}
                                </td>
                                <td class="px-4 py-2 text-gray-700 whitespace-nowrap">
                                    <a href="{{ route('employees.edit', $employee->id) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                    <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    {{ $employees->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>