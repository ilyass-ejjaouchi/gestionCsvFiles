<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commerce extends Model
{
    //use the commerce id
    protected $table = 'commerce';
    //primary key
    protected $primaryKey = 'ref_part';
    // the primary key is a string
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = array(
      'ref_part',
      'code_epj',
      'rs_epj',
      'adresse_epj',
      'denom_part',
      'adresse_part',
      'cp_part',
      'ville_part',
      'etat'
  );

    public function etat()
    {
      return $this->hasMany('App\Etat');
    }

    public function avis()
    {
      return $this->hasMany('App\Avis');
    }
}
