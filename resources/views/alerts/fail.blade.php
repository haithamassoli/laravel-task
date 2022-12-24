@if($errors->any())

<div role="alert" class="p-4 border-l-4 border-red-500 rounded bg-red-50">
  <strong class="block font-medium text-red-700"> {{ $errors->first() }} </strong>
</div>

@endif