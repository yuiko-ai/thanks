<x-app-layout>
  <x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-gray-800">
      {{ __('Dashboard') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
      <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">

        <form action="{{ route('message.store') }}" method="post" class="messageform">
            @csrf
            <label for="user-name">{{ ('ユーザー') }}<span class="badge badge-danger ml-2">{{ ('必須') }}</span></label><br>

            <select class="form-control" id="user-id" name="recieve_name">
                @foreach ($users as $user)
                    @if($id == $user->id)
                        <option value="{{ $user->id }}" selected>{{ $user->name }}</option>
                    @else
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endif
                @endforeach
            </select>

            <label for="text">{{ ('メッセージ') }}</label><br>
            <textarea class="form-control" rows="5" name="message_text"></textarea><br>

        <button type="submit" class="btn btn-succes">
            {{  ('登録' )}}
        </button>
        </form>

      </div>
    </div>
  </div>
</x-app-layout>
