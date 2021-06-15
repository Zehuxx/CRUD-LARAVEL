<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Usuario;

class UsuarioUpdateRequest extends FormRequest
{
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	} 

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
        $time = now();
		$newtime = $time->modify('-18 year')->format('Y-m-d');	
		return [
		'nombre'=>'required|max:50',
		//'cedula'=>'required|unique:users,cedula,'.$this->id.',id|max:11',
		'telefono'=>'nullable|numeric|unique:users,celular,'.$this->id.',id|digits_between:8,10',
		'pais'=>'exists:countries,id',
		'estado'=>'exists:estates,id',
		'ciudad'=>'exists:cities,id',
		'fecha_nacimiento'=> 'required|before:'.$newtime,
		//'email'=>'required|max:35|email|unique:users,email,'.$this->id.',id|regex:/(^[a-zA-Z]{1}[a-zA-Z.]*[A-zA-Z0-9]+@{1}[a-zA-Z]{1}[a-zA-Z.]*[a-zA-Z]{1}$)/u',
		//'password' => 'required|min:8|max:20|same:password-confirm',
		];
	}

	public function messages()
	{
		return [
			'nombre.required' => "El nombre es obligatorio.",
            'nombre.max' => 'El nombre debe tener 50 caracteres máximo.',
			// 'cedula.required' => "La cedula es obligatoria.",
			// 'cedula.unique' => "La cedula ya esta en uso.",
            // 'cedula.max' => 'La cedula debe tener 11 caracteres máximo.',
            'telefono.required' => "El teléfono es obligatorio.",
			'telefono.numeric' => 'El teléfono solo debe de contener numeros.',
			'telefono.unique' => "El teléfono ya esta en uso.",
			'telefono.digits_between' => 'El teléfono debe tener entre 8 y 10 caracteres.',
            // 'email.required' => "El correo electrónico es obligatorio.",
            // 'email.max' => 'El correo electrónico debe tener 35 caracteres máximo.',
            // 'email.unique' => 'El correo electrónico ingresado ya está en uso.',
            // 'email.regex' => 'Formato de correo invalido, ejemplo: nombre.apellido@example.com',
            // 'email.email' => 'Formato de correo invalido, ejemplo: nombre.apellido@example.com',
            'pais.exists' => 'El país es invalido.',
			'estado.exists' => 'El estado es invalido.',
			'ciudad.exists' => 'La ciudad es invalida.',
			'fecha_nacimiento.required' => 'La fecha de nacimiento es requerida.',
			'fecha_nacimiento.before' => 'La fecha de nacimiento debe ser mayor a 18 años.',
			// 'password.required' => "La contraseña es obligatoria.",
            // 'password.same' => 'Las contraseñas no coinciden.',
            // 'password.min' => 'La contraseña debe tener 8 caracteres minimo.',
            // 'password.max' => 'La contraseña debe tener 20 caracteres máximo.',
		];
	}
}