<x-app-layout>
    <x-slot name="header">
        
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ ( $data->title ) }}
        </h2>
    </x-slot>

    <div class="mt-8">
        @section
        <div class="alert alert-info max-w-7x1 mx-auto sm:px-6 lg:px-8">
            <h3>{{ $data->title }}</h3>
            <p>{{ $data->login }}</p>
            <p>{{ $data->category }}</p>
            <p>{{ $data->message }}</p>
            <p><small>{{ $data->created_at }}</small></p>
            @if($data->status == 'Новая')
            <a href="{{ route('user-update', $data->id) }}"><button class="btn btn-primary">Редактировать</button></a>
            <form method="post" action="{{ route('user-delete', $data->id) }}">
            @csrf
                <button action="submit" class="btn show_confirm">Удалить</button>
            </form>
            @endif
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