<x-app-layout>
  <x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-gray-800">
      {{ __('送信一覧') }}
    </h2>
  </x-slot>

  <div class="py-8">
    <div>
      <form class="mb-6 flex justify-center gap-4" action="{{ route('mailsend') }}" method="GET">

        @csrf

        <input class="rounded-lg px-3 py-2" name="keyword" type="text"
          value="{{ request('keyword') }}" size="50" placeholder="送信者名で検索">
        <select class="px-3 py-2" name="department_id">
          <option value="">部署を選択</option>
          @foreach ($departments as $department)
            <option value="{{ $department->id }}"
              {{ request('department_id') == $department->id ? 'selected' : '' }}>
              {{ $department->name }}
            </option>
          @endforeach
        </select>
        <input class="rounded bg-rose-500 px-4 py-2 text-white hover:bg-rose-600" type="submit"
          value="検索">
      </form>
    </div>
    @foreach ($users as $user)
      @foreach ($user->sentThanks as $thanks)
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
          <div class="mb-4 overflow-hidden bg-white px-10 shadow-sm sm:rounded-lg">
            <div class="mt-4 flex justify-between">
              <div>
                <div class="text-2xl font-semibold text-gray-800">
                  {{ $thanks->receiveUser->name ?? 'なし' }}</div>
                <div class="text-gray-400">
                  {{ $thanks->receiveUser->departmentInfo->name ?? '無所属' }}
                </div>
              </div>
              <div class="text-lg text-gray-400">{{ $thanks->created_at->format('Y/m/d') }}</div>
            </div>

            <div
              class="text-gray my-4 bg-gradient-to-r from-orange-50 to-pink-50 py-4 text-center sm:rounded-lg">
              <p class="text-xl text-gray-900">{{ $thanks->text }}</p>
            </div>
          </div>
        </div>
      @endforeach
    @endforeach
  </div>
</x-app-layout>
