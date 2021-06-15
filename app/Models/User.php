<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
/**
 * Class User
 * 
 * @property int $id
 * @property int $id_role
 * @property string $nombre
 * @property string|null $celular
 * @property string $email
 * @property string $password
 * @property string $cedula
 * @property Carbon $fecha_nacimiento
 * @property int $id_ciudad
 * @property string|null $remember_token
 * 
 * @property City $city
 * @property Role $role
 *
 * @package App\Models
 */
class User extends Authenticatable
{
	use HasFactory;
	protected $table = 'users'; 
	public $timestamps = false;

	protected $casts = [
		'id_role' => 'int',
		'id_ciudad' => 'int'
	];

	protected $dates = [
		'fecha_nacimiento'
	];

	protected $hidden = [
		'password',
		'remember_token'
	];

	protected $fillable = [
		'id_role',
		'nombre',
		'celular',
		'email',
		'password',
		'cedula',
		'fecha_nacimiento',
		'id_ciudad',
		'remember_token'
	];

	public function city()
	{
		return $this->belongsTo(City::class, 'id_ciudad');
	}

	public function role()
	{
		return $this->belongsTo(Role::class, 'id_role');
	}
}
