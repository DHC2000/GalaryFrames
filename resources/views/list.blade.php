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
    <table class="table table-striped table-dark ">
    <thead>
      <tr>
        <th scope="col">Titulo</th>
        <th scope="col">Codigo HTML</th>
        <th scope="col">Codigo CSS</th>
        <th scope="col">Codigo JS</th>
        <th scope="col">Acciones</th>
      </tr>
    </thead>
    <tbody>
            @foreach($components  as $webcomponent) <!--$components  as $webcomponent -->
               <tr>
                  <td> {{$webcomponent->titulo}}</td>
                  <td> {{$webcomponent->cod_html}}</td>
                  <td> {{$webcomponent->cod_css}}</td>
                  <td> {{$webcomponent->cod_js}}</td>
                  <td>
                    <a href="{{url('/webcomponent/'.$webcomponent->id.'/edit')}}" class= "btn btn-secondary"><i class="fas fa-marker"></i></a>
                    <form action="{{url('/webcomponent/'.$webcomponent->id)}}"  method="post">
                      @csrf
                      {{method_field('DELETE')}}
                      <button type="submit" onclick="return confirm('Eliminar componente?')" class="btn btn-danger"><i class="fas fa-trash-alt" ></i></button>
                    </form>
                      <!--a href="" class= "btn btn-secondary"> <i class="fas fa-marker"></i></a-->
                  </td>
                </tr>
            @endforeach


    </tbody>

  </table>
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
