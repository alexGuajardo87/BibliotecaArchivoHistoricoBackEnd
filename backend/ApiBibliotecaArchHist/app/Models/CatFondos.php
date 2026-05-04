<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Observers\UserABCObserver;

class CatFondos extends Model
{
    use HasFactory;

    public $table = "CatFondos"; 

    protected $primaryKey = "IdFondo";

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
        'NombreFondo',
        'SiglasFondo',
        'FechaInicial',
        'FechaFinal',
        'EstaActivo'
    ];
}
