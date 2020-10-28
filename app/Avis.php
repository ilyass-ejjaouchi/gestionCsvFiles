<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Avis extends Model
{
  protected $table = 'avis';
  protected $primaryKey = 'uid_avis';
  // the primary key is a string
  public $incrementing = false;
  protected $keyType = 'string';
  protected $fillable = array(
      'prenom',
      'nom',
      'date_experience',
      'date_avis',
      'note',
      'avis',
      'uid_avis',
      'uid_reponse',
      'date_reponse',
      'reponse',
      'date_regulation',
      'etat',
  );

  public function commerce()
  {
      return $this->belongsTo('App\Commerce');
  }
}
