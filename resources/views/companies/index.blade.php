<x-app-layout>
  <x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-gray-800">
      {{ __('Companies') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
      @include('alerts.success')
      <div class="flex justify-end">
        <a href="/companies/create" class="inline-block mb-4 rounded border border-indigo-600  bg-indigo-600 px-12 py-3 text-sm font-medium text-white hover:bg-transparent hover:text-indigo-600 focus:outline-none focus:ring active:text-indigo-500" href="/download">
          Create Company
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
                  Name
                </th>
                <th class="px-4 py-2 font-medium text-left text-gray-900 whitespace-nowrap">
                  Email
                </th>
                <th class="px-4 py-2 font-medium text-left text-gray-900 whitespace-nowrap">
                  Logo
                </th>
                <th class="px-4 py-2 font-medium text-left text-gray-900 whitespace-nowrap">
                  Website
                </th>
                <th class="px-4 py-2 font-medium text-left text-gray-900 whitespace-nowrap">
                  Actions
                </th>
              </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
              @foreach ($companies as $company)
              <tr>
                <td class="px-4 py-2 text-gray-700 whitespace-nowrap">
                  {{ $company->id }}
                </td>
                <td class="px-4 py-2 text-gray-700 whitespace-nowrap">
                  {{ $company->name }}
                </td>
                <td class="px-4 py-2 text-gray-700 whitespace-nowrap">
                  {{ $company->email }}
                </td>
                <td class="px-4 py-2 text-gray-700 whitespace-nowrap">
                  <img src="{{ asset($company->logo) }}" alt="{{ $company->name }}" class="w-10 h-10 rounded-full">
                </td>
                <td class="px-4 py-2 text-gray-700 whitespace-nowrap">
                  {{ $company->website }}
                </td>
                <td class="px-4 py-2 text-gray-700 whitespace-nowrap">
                  <a href="{{ route('companies.edit', $company->id) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                  <form action="{{ route('companies.destroy', $company->id) }}" method="POST" class="inline">
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
          {{ $companies->links() }}
        </div>
      </div>
    </div>
  </div>
</x-app-layout>