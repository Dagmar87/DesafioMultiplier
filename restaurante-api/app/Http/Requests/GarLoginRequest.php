<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Contracts\Validation\Factory as ValidationFactory;

class GarLoginRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'apelido' => 'required',
            'password' => 'required'
        ];
    }

    public function getCredentials() {

        $apelido = $this->get('apelido');

        if ($this->isEmail($apelido)) {
            return [
                'email' => $apelido,
                'password' => $this->get('password')
            ];
        }

        return $this->only('apelido', 'password');

    }

    private function isEmail($param) {

        $factory = $this->container->make(ValidationFactory::class);

        return ! $factory->make(
            ['apelido' => $param],
            ['apelido' => 'email']
        )->fails();

    }

}
