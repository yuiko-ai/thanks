<x-app-layout>
  <x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-gray-800">
      {{ __('ALLカードリスト') }}
    </h2>
  </x-slot>
  <div class="py-8">
    <div class="">
      <form class="mb-6 flex justify-center gap-4" action="{{ route('mailall') }}" method="GET">

        @csrf

        <input class="rounded-lg px-3 py-2" name="keyword" type="text"
          value="{{ request('keyword') }}" size="50" placeholder="送信者 or 受信者名で検索">
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

    @foreach ($thanks as $thank)
      <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="mb-4 overflow-hidden bg-white px-10 shadow-sm sm:rounded-lg">

          <div class="mt-2 text-right text-gray-400">
            {{ $thank->created_at->format('Y/m/d') }}
          </div>

          <div class="flex justify-between">
            <div class="mr-4">
              <label>Dear</label>
              <div class="flex items-end">
                <div class="mr-2 text-2xl font-semibold text-gray-800">
                  {{ $thank->sendUser->name ?? 'なし' }}
                </div>
                <div class="text-gray-400">
                  {{ $thank->sendUser->departmentInfo->name ?? '無所属' }}
                </div>
              </div>
            </div>

            <div>
              <label>From</label>
              <div class="flex items-end">
                <div class="mr-2 text-2xl font-semibold text-gray-800">
                  {{ $thank->receiveUser->name ?? 'なし' }}
                </div>
                <div class="text-gray-400">
                  {{ $thank->receiveUser->departmentInfo->name ?? '無所属' }}
                </div>
              </div>
            </div>
          </div>

          <div
            class="text-gray my-4 bg-gradient-to-r from-orange-50 to-pink-50 py-4 text-center sm:rounded-lg">
            <p class="text-xl text-gray-900">{{ $thank->text }}</p>
          </div>


        </div>
      </div>
    @endforeach
</x-app-layout>
