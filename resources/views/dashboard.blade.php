<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Выполненые заявки') }}
        </h2>
    </x-slot>

    <div class="solved_counter">
            @php
            $solved = 0;
            foreach ($data as $value) {
                if ($value->status == "Решена") {
                    $solved++;
                };
            };
        @endphp

        <h3 class="solved">Всего решено заявок: {{ $solved }} </h3>
    </div>

        @php
            $count = 0;
        @endphp
        <div class="mt-8">
        <div class="blocks">
        @foreach ($data as $el)

        @php
            if ($count == 4) {
                break;
            }
            $count++;
        @endphp
    
    
        @if($el->status == 'Решена')
            <div class="alert alert-info max-w-7x1 mx-auto sm:px-6 lg:px-8 kart">
                <img src="{{ URL::to('/storage/image/'.$el->image_after) }}">
                <img class="on_top" src="{{ URL::to('/storage/image/'.$el->image)}}">
                <h3>{{ $el->title }}</h3>
                <p>{{ $el->login }}</p>
                <p>{{ $el->category }}</p>
                <p>{{ $el->message }}</p>
                <p><small>{{ $el->created_at }}</small></p>
            </div>
        @endif
        @endforeach
    </div>
        </div>

    <script>
        var audio = new Audio('storage/image/PTQJUES-message-notification.mp3');
        $(document).ready(function(){
            setInterval(function(){
                $(".solved_counter").load(location.href + " .solved");
                console.log("refreshed");
            }, 5000);
        });
    </script>

</x-app-layout>
