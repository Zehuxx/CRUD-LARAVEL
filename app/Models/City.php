<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class City
 * 
 * @property int $id
 * @property int $id_estado
 * @property string $nombre
 * 
 * @property Estate $estate
 * @property Collection|User[] $users
 *
 * @package App\Models
 */
class City extends Model
{
	protected $table = 'cities';
	public $timestamps = false;

	protected $casts = [
		'id_estado' => 'int'
	];

	protected $fillable = [
		'id_estado',
		'nombre'
	];

	public function estate()
	{
		return $this->belongsTo(Estate::class, 'id_estado');
	}

	public function users()
	{
		return $this->hasMany(User::class, 'id_ciudad');
	}
}
