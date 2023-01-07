@extends('pdf.layout')
@section('title','WebComponentsMX')
@section('listComponent')
<table class="table table-striped table-dark ">
<thead>
  <tr>

    <th scope="col">Titulo</th>
    <th scope="col">Codigo HTML</th>
    <th scope="col">Codigo CSS</th>
    <th scope="col">Codigo JS</th>

  </tr>
</thead>
<tbody>

        @foreach($components  as $webcomponent) <!--$components  as $webcomponent -->

           <tr>
              <td> {{$webcomponent->titulo}}</td>
              <td> {{$webcomponent->cod_html}}</td>
              <td> {{$webcomponent->cod_css}}</td>
              <td> {{$webcomponent->cod_js}}</td>
            </tr>
        @endforeach

</tbody>
</table>
@endsection
