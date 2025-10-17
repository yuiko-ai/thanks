<x-app-layout>
  <x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-gray-800">
      {{ __('受信一覧') }}
    </h2>
  </x-slot>
  <div class="py-8">
    <div class="">
        <form action="{{ route('mail') }}" method="GET" class="mb-6 flex  gap-4  justify-center ">

        @csrf

            <input type="text" name="keyword" size="50" value="{{ request('keyword') }}" placeholder="送信者名で検索" class="px-3 py-2 rounded-lg">
            <select name="department_id" class="px-3 py-2">
                <option value="">部署を選択</option>
                @foreach ($departments as $department)
                    <option value="{{ $department->id }}"
                        {{ request('department_id') == $department->id ? 'selected' : '' }}>
                        {{ $department->name }}
                    </option>
                @endforeach
            </select>
            <input type="submit" value="検索" class="rounded-lg bg-rose-500 text-white px-4 py-2 rounded hover:bg-rose-600">
        </form>
    </div>

    @foreach($mails as $value)
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg px-10 mb-4 ">
                    <div class="flex justify-between mt-4">
                        <div>
                            <div class="font-semibold text-orange text-2xl">{{$value->departmentsInfo->name ?? 'なし'}}</div>
                            <div class="text-gray-400 text-lg">{{$value->departmentsInfo->departmentInfo->name ?? '部署なし'}}</div>
                        </div>
                        <div class="text-gray-400 text-lg">{{$value->created_at->format('Y/m/d')}}</div>
                    </div>

                    <div class="text-gray text-center sm:rounded-lg bg-gradient-to-r from-orange-50  to-pink-50 my-4 py-4 ">
                        <p class=" text-gray-900 text-xl">{{$value->text}}</p>
                    </div>
                </div>
            </div>
     @endforeach
  </div>
</x-app-layout>
