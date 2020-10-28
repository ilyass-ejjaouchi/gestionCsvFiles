<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Etat extends Model
{
    protected $table = 'etat';
    //primary key
    protected $primaryKey = 'id';
    protected $fillable = array(
        'id',
        'commerce_ref_part',
        'statut_parution',
        'raison_technique',
        'file_date',
    );

    public function commerce()
    {
        return $this->belongsTo('App\Commerce');
    }
    
}
