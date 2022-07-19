<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Новые заявки') }}
        </h2>
    </x-slot>
    <div class="mt-8">
    <div class="blocks">
        @foreach($data as $el)
        @if($el->status=="Новая")
            <div class="alert alert-info max-w-7x1 mx-auto sm:px-6 lg:px-8 kart">
                <img src="{{ URL::to('/storage/image/'.$el->image)}}">
                <h3>{{ $el->title }}</h3>
                <p>{{ $el->login }}</p>
                <p>{{ $el->category }}</p>
                <p>{{ $el->message }}</p>
                <p><small>{{ $el->created_at }}</small></p>
                <a href="{{ route('admin-update', $el->id) }}"><button class="btn btn-primary">Решена</button></a>
                <a href="{{ route('admin-delete', $el->id) }}"><button class="btn btn-denger">Отклонить</button></a>            
            </div>
        @endif
        @endforeach
    </div>
</div>
</x-app-layout>