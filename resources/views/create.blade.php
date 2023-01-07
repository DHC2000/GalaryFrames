@include('header')
<form action="{{url('/webcomponent')}}" method="post">
  @csrf
  @include('form',['mode'=>'Crear'],['user_id'=>auth()->id()])
</form>
@include('footer')
