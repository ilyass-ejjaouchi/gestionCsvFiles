@extends('layout')
@section('content')

<div class="container page">
  <a href="/"><button type="submit" class="btn btn-primary"><i class="fa fa-bars"></i> Menu Principale</button></a>
  <h1 class="center text-primary">Traitement des avis</h1>
  <table border = "1" class="table table-striped">
            <tr>
                <th class="center text-primary">Uid avis</th>
                <th class="center text-primary">Prenom</th>
                <th class="center text-primary">Ref Part</th>
                <th class="center text-primary">Denom part</th>
                <th class="center text-primary">Etat</th>
                <th class="center text-primary">Information</th>
            </tr>
      @foreach ($Avis as $avis)
              @if ($avis->etat=="réglé")
                  <tr class="success">
                      <th class="center">{{ $avis->uid_avis}}</th>
                      <th class="center">{{ $avis->prenom}}</th>
                      <th class="center">{{ $avis->commerce_ref_part}}</th>
                      <th class="center">{{$avis->commerce()->first()->denom_part}}</th>
                      <th class="center">{{$avis->etat}}</th>
                      <th class="center"><a href="/detailsAvis/{{$avis->uid_avis}}"><button type="button" class="btn btn-primary">Consulter <i class="fa fa-search-plus"></i></button></a></th>
                  </tr>
              @else
                  <tr class="danger">
                    <th class="center">{{ $avis->uid_avis}}</th>
                    <th class="center">{{ $avis->prenom}}</th>
                    <th class="center">{{ $avis->commerce_ref_part}}</th>
                    <th class="center">{{$avis->commerce()->first()->denom_part}}</th>
                    <th class="center">{{$avis->etat}}</th>
                    <th class="center"><a href="/detailsAvis/{{$avis->uid_avis}}"><button type="button" class="btn btn-primary">Consulter <i class="fa fa-search-plus"></i></button></a></th>
                  </tr>
              @endif
      @endforeach
  </table>
</div>
@endsection
