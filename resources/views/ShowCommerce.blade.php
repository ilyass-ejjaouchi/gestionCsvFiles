    @extends('layout')
    @section('content')
    <div class="container container-fluid col-xs-6 col-xs-offset-3 page">
        <a href="/indexCommerce"><button type="submit" class="btn btn-primary"><i class="fa fa-arrow-circle-left"></i> Retour</button></a>
        <a href="/"><button type="submit" class="btn btn-primary"><i class="fa fa-bars"></i> Menu Principale</button></a>
        <h3><label>Les coordonnées du commerce: </label></h3>
        <table class="table table-striped  ">
            <tr>
                <th class="text-primary">Ref_Part</th>
                <th >{{$commerce->ref_part}}</th>
            </tr>
            <tr>
                <th class="text-primary">Code_Epj</th>
                <th >{{$commerce->code_epj}}</th>
            </tr>
            <tr>
                <th class="text-primary">Rs_Epj</th>
                <th >{{$commerce->rs_epj}}</th>
            </tr>
            <tr>
                <th class="text-primary">Adresse_Epj</th>
                <th >{{$commerce->adresse_epj}}</th>
            </tr>
            <tr>
                <th class="text-primary">Denom_Part</th>
                <th >{{$commerce->denom_part}}</th>
            </tr>
            <tr>
                <th class="text-primary">Adresse_Part</th>
                <th >{{$commerce->adresse_part}}</th>
            </tr>
            <tr>
                <th class="text-primary">Cp_Part</th>
                <th >{{$commerce->cp_part}}</th>
            </tr>
            <tr>
                <th class="text-primary">Ville_Part</th>
                <th >{{$commerce->ville_part}}</th>
            </tr>
        </table>
    </div>
    <div class="container container-fluid col-xs-10 col-xs-offset-1 page">
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
            <a href="/allHistory/{{$commerce->ref_part}}"><button type="submit" class="btn btn-primary pull-right">Voir tous</button></a>
    </div>
    <div class="container container-fluid col-xs-10 col-xs-offset-1 page">
            <h3><label>Les avis: </label></h3>
              <table class="table table-bordered" border="1">
                  <tr>
                      <th class="text-primary">Uid avis</th>
                      <th class="text-primary">Prenom</th>
                      <th class="text-primary">Date experience</th>
                      <th class="text-primary">Date avis</th>
                      <th class="text-primary">Note</th>
                      <th class="text-primary">avis</th>
                      <th class="text-primary">etat</th>
                  </tr>
                  @foreach ($avis as $var)
                    @if ($var->etat == "réglé")
                            <tr class="success">
                              <th>{{$var->uid_avis}}</th>
                              <th>{{$var->prenom}}</th>
                              <th>{{$var->date_experience}}</th>
                              <th>{{$var->date_avis}}</th>
                              <th>{{$var->note}}</th>
                              <th>{{$var->avis}}</th>
                              <th>{{$var->etat}}</th>
                            </tr>
                    @else
                          <tr class="danger">
                              <th>{{$var->uid_avis}}</th>
                              <th>{{$var->prenom}}</th>
                              <th>{{$var->date_experience}}</th>
                              <th>{{$var->date_avis}}</th>
                              <th>{{$var->note}}</th>
                              <th>{{$var->avis}}</th>
                              <th>{{$var->etat}}</th>
                          </tr>
                    @endif
               @endforeach
            </table>
    </div>
    @endsection
