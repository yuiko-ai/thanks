<x-app-layout>
  <x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-gray-800">
      {{ __('ユーザー一覧') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
      @if (session('success'))
        <div class="mb-4 rounded-lg bg-rose-100 p-4 text-rose-700 shadow">
          {{ session('success') }}
        </div>
      @endif
      <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
        <table class="min-w-full">
          <thead class="bg-gradient-to-r from-pink-500 to-rose-500 text-white">
            <tr>
              <th class="px-6 py-3">ID</th>
              <th class="px-6 py-3">名前</th>
              <th class="px-6 py-3">メールアドレス</th>
              <th class="px-6 py-3">部署名</th>
              @can('isadmin')
                <th class="px-6 py-3">権限</th>
              @endcan
            </tr>
          </thead>
          <tbody>
            @foreach ($users as $value)
              <tr
                class="clickable-row transition-colors duration-200 hover:bg-pink-50"data-url="{{ route('message.index', ['id' => $value->id]) }}"
                style="cursor: pointer;">
                <td class="py-4 text-center">{{ $value->id }}</td>
                <td class="text-center">{{ $value->name }}</td>
                <td class="text-center">{{ $value->email }}</td>
                <td class="text-center">{{ $value->departmentInfo->name ?? '無所属' }}</td>
                @can('isadmin')
                  <td class="text-center" onclick="event.stopPropagation();">
                    <form class="flex items-center justify-center space-x-2"
                      action="{{ route('users.update', $value) }}" method="POST">
                      @csrf
                      <select
                        class="rounded-md border-2 border-gray-300 py-1 shadow-sm focus:border-pink-300 focus:ring focus:ring-pink-200 focus:ring-opacity-50"
                        name="is_admin">
                        <option value="0" {{ $value->is_admin == 0 ? 'selected' : '' }}>ユーザー
                        </option>
                        <option value="1" {{ $value->is_admin == 1 ? 'selected' : '' }}>管理者
                        </option>
                      </select>

                      <button
                        class="rounded-md bg-rose-500 px-3 py-1 text-sm font-semibold text-white shadow-sm transition hover:bg-rose-600"
                        type="submit">
                        保存
                      </button>
                    </form>
                  </td>
                @endcan
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
