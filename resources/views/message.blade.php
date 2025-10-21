<x-app-layout>
  <x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-gray-800">
      {{ __('サンクスカード') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
      <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">

        <div class="bg-gradient-to-r from-pink-500 to-rose-500 p-6 text-white">
          <h2 class="flex items-center text-xl font-semibold">
            {{ __('感謝のメッセージ') }}
          </h2>
        </div>

        <form class="messageform px-6" action="{{ route('message.store') }}" method="post">
          @csrf
          <div class="mb-2">
            <label class="mt-2 block text-lg" for="user-name">{{ '送り先' }}</label>
          </div>
          <div class="mb-4">
            <select
              class="form-control @error('receive_name') border-red-500 @enderror w-full"id="user-id"
              name="receive_name">
              <option value="">選択してください</option>
              @foreach ($users as $user)
                @if ($id == $user->id)
                  <option value="{{ $user->id }}" selected>{{ $user->name }}</option>
                @else
                  <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endif
              @endforeach
              {{ old('receive_name') }}
            </select>
            @error('receive_name')
              <div class="mt-1 text-red-600">{{ $message }}</div>
            @enderror
          </div>

          <div class="mb-4">
            <label class="text-lg" for="text">{{ 'メッセージ' }}</label><br>
            <textarea class="form-control @error('message_text') border-red-500 @enderror w-full"
              name="message_text" rows="5">{{ old('message_text') }}</textarea><br>
            @error('message_text')
              <div class="mt-1 text-red-600">{{ $message }}</div>
            @enderror
          </div>

          <div class="mb-4 flex justify-center">
            <button
              class="btn btn-succes h-10 w-64 rounded-lg bg-gradient-to-r from-pink-500 to-rose-500 text-white"
              type="submit">
              {{ '🤍送信🤍' }}
            </button>
          </div>
        </form>

      </div>
    </div>
  </div>
</x-app-layout>
