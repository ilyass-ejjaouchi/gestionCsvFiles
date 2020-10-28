@extends('layout')
@section('content')
<div class="container container-fluid col-xs-10 col-xs-offset-1 page">
  <a href="/"><button type="submit" class="btn btn-primary"><i class="fa fa-bars"></i> Menu Principale</button></a>
  <a href="/commerce/{{$etat->first()->commerce()->first()->ref_part}}"><button type="submit" class="btn btn-primary"><i class="fa fa-arrow-circle-left"></i> Retour</button></a>
        <h3><label>L'historique: </label></h3>
        <table class="table table-striped  ">
            <tr>
                <th class="text-primary">Date d'enregistrement</th>
                <th class="text-primary">Date</th>
                <th class="text-primary">Etat</th>
                <th class="text-primary">Raison technique</th>
            </tr>
            @foreach ($etat as $var)
                @if ($var->statut_parution == "réglé")
                    <tr class="success">
                        <th>{{$var->created_at}}</th>
                        <th>{{$var->file_date}}</th>
                        <th>{{$var->statut_parution}}</th>
                        <th>{{$var->raison_technique}}</th>
                    </tr>
                @else
                    <tr class="danger">
                      <th>{{$var->created_at}}</th>
                      <th>{{$var->file_date}}</th>
                      <th>{{$var->statut_parution}}</th>
                      <th>{{$var->raison_technique}}</th>
                    </tr>
                @endif
            @endforeach
        </table>
  <div class="container container-fluid col-xs-6 col-xs-offset-3">
    {{ $etat->render() }}
  </div>
</div>
@endsection
