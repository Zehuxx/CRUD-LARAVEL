<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Estate
 * 
 * @property int $id
 * @property int $id_pais
 * @property string $nombre
 * 
 * @property Country $country
 * @property Collection|City[] $cities
 *
 * @package App\Models
 */
class Estate extends Model
{
	protected $table = 'estates';
	public $timestamps = false;

	protected $casts = [
		'id_pais' => 'int'
	];

	protected $fillable = [
		'id_pais',
		'nombre'
	];

	public function country()
	{
		return $this->belongsTo(Country::class, 'id_pais');
	}

	public function cities()
	{
		return $this->hasMany(City::class, 'id_estado');
	}
}
