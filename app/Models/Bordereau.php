<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Bordereau
 * 
 * @property int $id
 * @property string $uuid
 * @property string|null $numero
 * @property int|null $numero_mandat
 * @property Carbon|null $date_mandat
 * @property string|null $designation
 * @property float|null $montant
 * @property int|null $nombre_de_piece
 * @property string|null $observation
 * @property int $courriers_id
 * @property int|null $listes_id
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Courrier $courrier
 * @property Liste|null $liste
 *
 * @package App\Models
 */
class Bordereau extends Model
{
	
    use HasFactory;
	use SoftDeletes;
	use \App\Helpers\UuidForKey;
	protected $table = 'bordereaus';

	protected $casts = [
		'numero_mandat' => 'int',
		'montant' => 'float',
		'nombre_de_piece' => 'int',
		'courriers_id' => 'int',
		'listes_id' => 'int'
	];

	protected $dates = [
		'date_mandat'
	];

	protected $fillable = [
		'uuid',
		'numero',
		'numero_mandat',
		'date_mandat',
		'designation',
		'montant',
		'nombre_de_piece',
		'observation',
		'courriers_id',
		'listes_id'
	];

	public function courrier()
	{
		return $this->belongsTo(Courrier::class, 'courriers_id');
	}

	public function liste()
	{
		return $this->belongsTo(Liste::class, 'listes_id');
	}
}
