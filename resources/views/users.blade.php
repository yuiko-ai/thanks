<x-app-layout>
  <x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-gray-800">
      {{ __('ユーザー一覧') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
      <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
        <!-- <div class="p-6 text-gray-900">
          {{ __("ユーザー一覧") }}
        </div> -->
        <table>
            <tr>
                <th>ID</th>
                <th>name</th>
                <th>mail</th>
                <th>department</th>
            </tr>
            @foreach($users as $value)
                <tr>
                    <th>{{$value->id}}</th>
                    <th>{{$value->name}}</th>
                    <th>{{$value->email}}</th>
                    <th>{{$value->DepartmentsInfo->name}}</th>
                </tr>
            @endforeach
        </table>

      </div>
    </div>
  </div>
</x-app-layout>
