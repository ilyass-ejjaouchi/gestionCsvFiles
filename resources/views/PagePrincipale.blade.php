@extends('layout')
@section('content')
<div class="col-xs-10 col-xs-offset-2 page2">
  <div class="inline col-xs-5">
    <a href="/indexAvis"><img src='{{ asset('photo/'.'avis2.png')}}' class="image"></a>
    <i><h2 class="blue">Gestion des avis</h2></i>
  </div>
  <div class="inline col-xs-5">
    <a href="/indexCommerce"><img src='{{ asset('photo/'.'commerciaux2.png')}}' class="image"></a>
    <i><h2 class="inline col-xs-offset-0">Gestion des commerces</h2></i>
  </div>
</div>
@endsection
