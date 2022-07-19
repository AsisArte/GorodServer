<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ ( $data->title ) }}
        </h2>
    </x-slot>
    
    <div class="mt-8">
        
        <div class="alert alert-info max-w-7x1 mx-auto sm:px-6 lg:px-8">
            <h3>{{ $data->title }}</h3>
            <p>{{ $data->login }}</p>
            <p>{{ $data->category }}</p>
            <p>{{ $data->message }}</p>
            <p><small>{{ $data->created_at }}</small></p>
            <a href="{{ route('admin-update', $data->id) }}"><button class="btn btn-primary">Решена</button></a>
            <a href="{{ route('admin-delete', $data->id) }}"><button class="btn btn-denger">Отклонить</button></a>
        </div>
        
    </div>

</x-app-layout>