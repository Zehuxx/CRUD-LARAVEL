<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Country
 * 
 * @property int $id
 * @property string $nombre
 * 
 * @property Collection|Estate[] $estates
 *
 * @package App\Models
 */
class Country extends Model
{
	protected $table = 'countries';
	public $timestamps = false;

	protected $fillable = [
		'nombre'
	];

	public function estates()
	{
		return $this->hasMany(Estate::class, 'id_pais');
	}
}
