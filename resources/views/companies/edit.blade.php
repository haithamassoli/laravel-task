<x-app-layout>
  <x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-gray-800">
      {{ __('Edit Companies') }}
    </h2>
  </x-slot>
  <div class="mx-auto max-w-screen-xl px-4 py-16 sm:px-6 lg:px-8">
    @include('alerts.fail')
    <form action="{{ route('companies.update', $company->id) }}" method="POST" enctype="multipart/form-data" class=" mx-auto mt-8 mb-0 max-w-md space-y-4">
      @csrf
      @method('put')
      <div>
        <label for="name" class="sr-only">Name</label>
        <input name="name" type="text" class="w-full rounded-lg border-gray-200 p-4 pr-12 text-sm shadow-sm" placeholder="Enter name" value="{{ $company->name }}" />
      </div>

      <div>
        <label for="email" class="sr-only">Email</label>
        <input name="email" type="email" class="w-full rounded-lg border-gray-200 p-4 pr-12 text-sm shadow-sm" placeholder="Enter email" value="{{ $company->email }}" />
      </div>

      <div>
        <label for="logo" class="sr-only">Logo</label>
        <input name="logo" type="file" class="w-full rounded-lg border-gray-200 p-4 pr-12 text-sm shadow-sm" placeholder="Enter logo" />
      </div>

      <div>
        <label for="website" class="sr-only">WebSite</label>
        <input name="website" type="text" class="w-full rounded-lg border-gray-200 p-4 pr-12 text-sm shadow-sm" placeholder="Enter website" value="{{ $company->website }}" />
      </div>
      <button type="submit" class="inline-block rounded border border-indigo-600 bg-indigo-600 px-12 py-3 text-sm font-medium text-white hover:bg-transparent hover:text-indigo-600 focus:outline-none focus:ring active:text-indigo-500" href="/download">
        Edit Company
      </button>
    </form>
  </div>
</x-app-layout>