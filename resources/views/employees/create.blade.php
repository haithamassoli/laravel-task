<x-app-layout>
  <x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-gray-800">
      {{ __('Create Employee') }}
    </h2>
  </x-slot>

  <div class="mx-auto max-w-screen-xl px-4 py-16 sm:px-6 lg:px-8">
    @include('alerts.fail')
    <form action="{{ route('employees.store') }}" method="POST" class=" mx-auto mt-8 mb-0 max-w-md space-y-4">
      @csrf
      <div>
        <label for="first_name" class="sr-only">First Name</label>
        <input name="first_name" type="text" class="w-full rounded-lg border-gray-200 p-4 pr-12 text-sm shadow-sm" placeholder="Enter First Name" value="{{ old('first_name') }}" />
      </div>

      <div>
        <label for="last_name" class="sr-only">Last Name</label>
        <input name="last_name" type="text" class="w-full rounded-lg border-gray-200 p-4 pr-12 text-sm shadow-sm" placeholder="Enter Last Name" value="{{ old('last_name') }}" />
      </div>

      <div>
        <label for="email" class="sr-only">Email</label>
        <input name="email" type="email" class="w-full rounded-lg border-gray-200 p-4 pr-12 text-sm shadow-sm" placeholder="Enter email" value="{{ old('email') }}" />
      </div>

      <div>
        <label for="phone" class="sr-only">Phone</label>
        <input name="phone" type="text" class="w-full rounded-lg border-gray-200 p-4 pr-12 text-sm shadow-sm" placeholder="Enter phone" value="{{ old('phone') }}" />
      </div>

      <div>
        <label for="company_id" class="sr-only">Company</label>
        <input name="company_id" type="text" class="w-full rounded-lg border-gray-200 p-4 pr-12 text-sm shadow-sm" placeholder="Enter company" value="{{ old('company_id') }}" />
      </div>

      <button type="submit" class="inline-block rounded border border-indigo-600 bg-indigo-600 px-12 py-3 text-sm font-medium text-white hover:bg-transparent hover:text-indigo-600 focus:outline-none focus:ring active:text-indigo-500" href="/download">
        Create Employee
      </button>
    </form>
  </div>
</x-app-layout>