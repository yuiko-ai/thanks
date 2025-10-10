<x-app-layout>
  <x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-gray-800">
      {{ __('サンクスカード') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
      <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">

        <div class="bg-gradient-to-r from-pink-500 to-rose-500 text-white p-6">
            <h2 class="text-xl font-semibold flex items-center">
                {{__('感謝のメッセージ') }}
            </h2>
        </div>

        <form action="{{ route('message.store') }}" method="post" class="messageform px-6">
            @csrf
            <div class="mb-2">
                <label for="user-name" class="block mt-2 text-lg">{{ ('送り先') }}</label>
            </div>
            <div class="mb-4">
                <select class="form-control w-full" id="user-id" name="recieve_name">
                    @foreach ($users as $user)
                        @if($id == $user->id)
                            <option value="{{ $user->id }}" selected>{{ $user->name }}</option>
                        @else
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="text" class="text-lg">{{ ('メッセージ') }}</label><br>
                <textarea class="form-control w-full" rows="5" name="message_text"></textarea><br>
            </div>

            <div class="mb-4 flex justify-center">
                <button type="submit" class="btn btn-succes w-64 h-10 rounded-lg bg-gradient-to-r from-pink-500 to-rose-500 text-white ">
                    {{  ('🩷送信🩷' )}}
                </button>
            </div>
        </form>

      </div>
    </div>
  </div>
</x-app-layout>
