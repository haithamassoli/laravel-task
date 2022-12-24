@if (Session::has('success'))
<div role="alert" class="p-4 border-l-4 border-green-500 rounded bg-green-50">
  <strong class="block font-medium text-green-700"> {{ Session::get('success') }} </strong>
</div>
@endif