<x-app-layout>
  <x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-gray-800">
      {{ __('ユーザー一覧') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
      <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
        <table class="min-w-full ">
            <thead>
                <tr>
                    <th class="px-6 py-3 ">ID</th>
                    <th class="px-6 py-3">名前</th>
                    <th class="px-6 py-3">メールアドレス</th>
                    <th class="px-6 py-3">部署名</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $value)
                    <tr class="clickable-row" data-url="{{ route('message.index', ['id' => $value->id]) }}" style="cursor: pointer;">
                        <td class="py-4 text-center">{{$value->id}}</td>
                        <td class="text-center">{{$value->name}}</td>
                        <td class="text-center">{{$value->email}}</td>
                        <td class="text-center">{{$value->departmentsInfo->name ?? 'なし'}}</td>
                    </tr>
                @endforeach
            </tbody>

            <script>
            document.addEventListener('DOMContentLoaded', function() {
                document.querySelectorAll('.clickable-row').forEach(row => {
                    row.addEventListener('click', function() {
                        window.location.href = this.dataset.url;
                    });
                });
            });
            </script>
        </table>

      </div>
    </div>
  </div>
</x-app-layout>
