<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Обновление записи') }}
        </h2>
    </x-slot>
    <form action="{{ route('admin-delete', $data->id) }}" class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-8" method="post">
    @csrf
    <div class="form-group mt-2">
        <label for="text">Причина отклонения</label>
        <input type="text" name="text" placeholder="Причина отклонения" id="text" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-success mt-2">Обновить статус</button>
    </form>

</x-app-layout>