@extends('layout')
@section('content')
<div class="container container-fluid page col-xs-10 col-xs-offset-1 page">
  <a href="/"><button type="submit" class="btn btn-primary"><i class="fa fa-bars"></i> Menu Principale</button></a>
  <div class="block page">
       <div class="alert alert-success inline">
         <strong>Nombre de commerciaux Reglés:{{$CommercesPub}}</strong>
       </div>
       <div class="alert alert-danger inline">
         <strong>Nombre de commerciaux douteux:{{$CommercesDouteux}}</strong>
       </div>
  </div>
  <div class="block">
      <form action="/indexCommerce" id="form" method="GET" class="inline">
           <label >Critère de Recherche:</label>
               <select class="form-control" name="select" id="select">
                   <option >Selectionez....</option>
                   <option >Tous</option>
                   <option>Douteux</option>
                   <option>Reglés</option>
               </select>
      </form>

      <form class="inline margin_left" action="/commerce" method="get">
        <label>Trouvez un commercial:</label>
        <div class="form-group form-inline">
           <input type="text" class="form-control" placeholder="ref_part" name="FindCommerce">
           <button type="submit" name="submit" class="btn btn-primary btn-sm">Chercher <i class="fa fa-search"></i></button>
       </div>
      </form>
</div>
     <table border = "1" class="table table-striped">
         <tr class="active">
             <th class="center text-primary">Ref Part</th>
             <th class="center text-primary">Denom Part</th>
             <th class="center text-primary">Rs Epj</th>
             <th class="center text-primary">Etat</th>
             <th class="center text-primary">Information</th>
         </tr>
         @foreach ($Commerces as $commerce)
             @if ($commerce->etat=="réglé")
                   <tr class="success">
                       <th class="center">{{ $commerce->ref_part }}</th>
                       <th class="center">{{ $commerce->denom_part }}</th>
                       <th class="center">{{ $commerce->rs_epj }}</th>
                       <th class="center">{{$commerce->etat}}</th>
                       <th class="center"><a href="/commerce/{{$commerce->ref_part}}"><button type="button" class="btn btn-primary">Consulter <i class="fa fa-search-plus"></i></button></a></th>
                   </tr>
             @else
                 <tr class="danger">
                     <th class="center">{{ $commerce->ref_part }}</th>
                     <th class="center">{{ $commerce->denom_part }}</th>
                     <th class="center">{{ $commerce->rs_epj }}</th>
                     <th class="center">{{$commerce->etat}}</th>
                     <th class="center"><a href="/commerce/{{$commerce->ref_part}}"><button type="button" class="btn btn-primary">Consulter <i class="fa fa-search-plus"></i></button></a></th>
                 </tr>
             @endif
         @endforeach
     </table>
     <div class="container container-fluid col-xs-6 col-xs-offset-3">
       {{ $Commerces->render() }}
     </div>
</div>
<script>
var select = document.getElementById("select");
select.addEventListener('change',function(){
document.getElementById("form").submit();
})
</script>
@endsection
