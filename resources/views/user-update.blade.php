<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Обновление заявку') }}
        </h2>
    </x-slot>
    <form enctype="multipart/form-data" action="{{ route('user-update', $data->id) }}" class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-8" method="post">
    @csrf

    <div class="form-group mt-2">
        <label for="title">Название</label>
        <input type="text" name="title" placeholder="Название" value="{{$data->title}}" id="title" class="form-control" required>
    </div>
    
    <div class="form-group mt-2">
        <label for="message">Описание</label>
        <textarea name="message" placeholder="Описание" id="message" class="form-control" required>{{$data->message}}</textarea>
    </div>

    <div class="form-group mt-2">
        <label for="file">Фото</label>
        <input type="file" name="file" placeholder="Файл" id="file" value="{{$data->file}}" accept=".jpg, .jpeg, .png" required></textarea>
    </div>
    <button type="submit" class="btn btn-success mt-2">Обновить</button>
    </form>
    
</x-app-layout>