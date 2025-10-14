<x-app-layout>
  <x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-gray-800">
      {{ __('送信一覧') }}
    </h2>
  </x-slot>

<div class="py-8">
    @foreach($mails as $value)
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg px-10 mb-4 ">
                    <div class="flex justify-between mt-4">
                        <div>
                            <div class="font-semibold text-gray-800 text-2xl">{{$value->receiveUser->name ?? 'なし'}}</div>
                            <div class="text-gray-400">{{$value->receiveUser->departmentInfo->name ?? '部署なし'}}</div>
                        </div>
                        <div class="text-gray-400 text-lg">{{$value->created_at->format('Y/m/d')}}</div>
                    </div>

                    <div class="text-gray text-center sm:rounded-lg bg-gradient-to-r from-orange-50  to-pink-50 my-4 py-4">
                        <p class="text-gray-900 text-xl">{{$value->text}}</p>
                    </div>
                </div>
            </div>
     @endforeach
</div>
</x-app-layout>
