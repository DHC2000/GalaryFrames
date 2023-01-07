@include('header')

<form class="form" action="{{url('/webcomponent/'.$webcomponent[0]->id)}}" method="post">
  @csrf
  {{method_field('PATCH')}}

    @include('form',['mode'=>'Editar'])

</form>

    <div class="container border border-dark XD">
    </div>

@include('footer')
