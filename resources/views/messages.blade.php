<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Категории') }}
        </h2>
    </x-slot>
    
    @foreach($data as $cat)
    
    <div class="mt-8">
        
            <div class="alert alert-info max-w-7x1 mx-auto sm:px-6 lg:px-8">
                <p>{{ $cat->category }}</p>
                <a href="{{ route('category-delete', [$cat->id, $cat->category]) }}"><button class="btn btn-warning">Удалить</button></a>
            </div>
    
    </div>

    @endforeach

    <form action="{{ route('admin-category') }}" class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-8" method="post">
    @csrf

    <div class="form-group mt-2">
        <label for="category">Новая Категория</label>
        <input type="category" name="category" placeholder="Новая Категория" id="category" class="form-control">
    </div>

    <button type="submit" class="btn btn-success mt-2">Добавить категорию</button>
    </form>

</x-app-layout>