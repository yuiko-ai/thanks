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
            <thead>
                <tr>
                    <th>ID</th>
                    <th>名前</th>
                    <th>メールアドレス</th>
                    <th>部署名</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $value)
                    <tr class="clickable-row" data-url="{{ route('message.index', ['id' => $value->id]) }}" style="cursor: pointer;">
                        <td class="py-4">{{$value->id}}</td>
                        <td>{{$value->name}}</td>
                        <td>{{$value->email}}</td>
                        <td>{{$value->departmentsInfo->name ?? 'なし'}}</td>
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
