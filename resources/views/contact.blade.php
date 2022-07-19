<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Новое заявка') }}
        </h2>
    </x-slot>
    
    <form enctype="multipart/form-data" action="{{ route('contact-form') }}" class="max-w-7xl mx-auto sm:px-6 lg:px-8" method="post">
    @csrf
    <div class="form-group mt-2">
        <label for="title">Название</label>
        <input type="text" name="title" placeholder="Название" id="title" class="form-control" required>
    </div>

    <div class="form-group mt-2">
        <label for="category">Категория</label>
        <select type="text" name="category" placeholder="Категория" id="category" class="form-control" required>
            @foreach($data as $cat)
            <option>{{ $cat->category }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group mt-2">
        <label for="message">Описание</label>
        <textarea name="message" placeholder="Описание" id="message" class="form-control" required></textarea>
    </div>

    <div class="form-group mt-2">
        <label for="file">Фото</label>
        <input type="file" name="file" placeholder="Файл" id="file" accept=".jpg, .jpeg, .png, .bmp" required></textarea>
    </div>

    <button type="submit" class="btn btn-success mt-2">Отправить заявку</button>
    </form>

</x-app-layout>