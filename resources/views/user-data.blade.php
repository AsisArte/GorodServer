<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Личный кабинет') }}
        </h2>
    </x-slot>
    <div class="mt-8">

        <div class="blocks"> 
            <input type="radio" id="new" name="application" />
            <label for="new">Новые</label>
            <input type="radio" id="solved" name="application"/>
            <label for="solved">Решеные</label>
            <input type="radio" id="rejected" name="application"/>
            <label for="rejected">Отклоненные</label>
            <input type="radio" id="reset" name="application"/>
            <label for="reset">Все</label>
            @foreach($data as $el)
                
                @if($el->status == 'Новая')
                <div class="card new">
                @endif
                @if($el->status == 'Решена')
                <div class="card solved">
                @endif
                @if($el->status == 'Отклонена')
                <div class="card rejected">
                @endif
                    <div class="card-content">
                    @if($el->status == 'Новая')
                    <p class="new-card">
                    @endif
                    @if($el->status == 'Решена')
                    <p class="solv">
                    @endif
                    @if($el->status == 'Отклонена')
                    <p class="rej">
                    @endif
                    {{ $el->status }}</p>
                        <div class="new solved rejected alert alert-info max-w-7x1 mx-auto sm:px-6 lg:px-8 kart">
                        @if($el->status != 'Решена')
                                <img src="{{ URL::to('/storage/image/'.$el->image)}}">
                                @else
                                <img src="{{ URL::to('storage/image/'.$el->image_after)}}">
                                <img class="on_top" src="{{ URL::to('storage/image/'.$el->image)}}">
                                @endif
                            <h3>{{ $el->title }}</h3>
                            <p>{{ $el->login }}</p>
                            <p>{{ $el->category }}</p>
                            <p>{{ $el->message }}</p>
                            @if($el->status == 'Отклонена')
                            <p>{{ $el->disprove_reason }}</p>
                            @endif
                            <p><small>{{ $el->created_at }}</small></p>
                            @if($el->status == 'Новая')
                            <a href="{{ route('user-update', $el->id) }}"><button class="btn btn-primary">Редактировать</button></a>
                            <form method="post" action="{{ route('user-delete', $el->id) }}">
                            @csrf
                                <button action="submit" class="btn show_confirm">Удалить</button>
                            </form>
                            @endif                        
                        </div>
                    </div>
                </div>
                    
            @endforeach
        </div>
        
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/d3js/7.0.0/d3.min.js"></script>
    <script type="text/javascript">
 
        $('.show_confirm').click(function(event) {
            var form =  $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                title: `Уверены, что хотите удалить заявку?`,
                text: "Заявка будет безвозвратно удалена",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                form.submit();
                }
            });
        });

    </script>

</x-app-layout>