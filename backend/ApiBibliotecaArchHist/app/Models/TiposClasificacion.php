<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Observers\UserABCObserver;

class TiposClasificacion extends Model
{
    use HasFactory;

    public $table = "TiposClasificacion"; 

    protected $primaryKey = "IdTipoClaficacion";

    use SoftDeletes;

    protected static function boot()
    {
        parent::boot();
        $class = get_called_class();
        $class::observe(new UserABCObserver());
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
    */
    protected $fillable = [
        'NombreTipo',
        'SiglasTipo',
        'EstaActivo'
    ];
}
