@extends('layout')
@section('content')

<div class="container container-fluid col-xs-6 col-xs-offset-3 page">
    <a href="/indexAvis"><button type="submit" class="btn btn-primary"><i class="fa fa-arrow-circle-left"></i> Retour</button></a>
    <a href="/"><button type="submit" class="btn btn-primary"><i class="fa fa-bars"></i> Menu Principale</button></a>
    <h3><label>Les détails de l'avis: </label></h3>
    <table class="table table-striped">
        <tr>
            <th class="text-primary">Uid_avis</th>
            <th >{{$Avis->uid_avis}}</th>
        </tr>
        <tr>
            <th class="text-primary">Ref part</th>
            <th >{{$Avis->commerce_ref_part}}</th>
        </tr>
        <tr>
            <th class="text-primary">Prenom</th>
            <th >{{$Avis->prenom}}</th>
        </tr>
        <tr>
            <th class="text-primary">Date avis</th>
            <th >{{$Avis->date_avis	}}</th>
        </tr>
        <tr>
            <th class="text-primary">Date experience</th>
            <th >{{$Avis->date_experience}}</th>
        </tr>
        <tr>
            <th class="text-primary">Note</th>
            <th >{{$Avis->note}}</th>
        </tr>
        <tr>
            <th class="text-primary">Avis</th>
            <th >{{$Avis->avis}}</th>
        </tr>
        <tr>
            <th class="text-primary">Etat</th>
            <th >{{$Avis->etat}}</th>
        </tr>
    </table>
<a href="/reglerAvis/{{$Avis->uid_avis}}"><button style="font-size:18px" class="btn btn-success pull-right">Regler <i class="fa fa-check-square-o"></i></button></a>
</div>
@endsection
