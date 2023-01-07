@include('header')

@if(Session::has('message'))

<div class="alert alert-warning" role="alert">
{{Session::get('message')}}
</div>

@endif
@if(isset($components))
<div class="container-fluid">
  <div class="container mt-5">
    <h1 class="mb-5 text-secondary">Componentes</h1>

    <a href="{{url('webcomponent/create')}}" class="btn btn-outline-info mb-3"> Nuevo Componente</a>
    <a href="{{url('componentPDF')}}" target="_blank" class="btn btn-outline-info mb-3"><i class="fas fa-print"></i></a>

            @foreach($components  as $webcomponent) <!--$components  as $webcomponent -->
                    <a href="{{url('/webcomponent/'.$webcomponent->id.'/edit')}}" class= "btn btn-secondary"><i class="fas fa-marker"></i></a>
                    <form action="{{url('/webcomponent/'.$webcomponent->id)}}"  method="post">
                      @csrf
                      {{method_field('DELETE')}}
                      <button type="submit" onclick="return confirm('Eliminar componente?')" class="btn btn-danger"><i class="fas fa-trash-alt" ></i></button>
                    </form>
                      <!--a href="" class= "btn btn-secondary"> <i class="fas fa-marker"></i></a-->
                      @include('form');

            @endforeach

@endif
    <div class="flex-row">
      <nav aria-label="Page navigation example">
          <ul class="pagination pagination-sm">
            </ul>
        </nav>
    </div>

  </div>
</div>

@include('footer')
