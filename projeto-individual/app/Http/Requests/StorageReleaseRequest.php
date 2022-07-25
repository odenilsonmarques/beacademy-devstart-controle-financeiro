<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorageReleaseRequest extends FormRequest
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
            //a validacao abaixo poderia ser separada por uma barra, porem é apenas uma outra forma de fazer. No meu caso, preferir usar um array
            'release_type'=>['required'],
            'person'=>['required','string','min:3','max:25'],
            'amount'=>['required'],
            'due_date'=>['required'],
            'description'=>['required','string','min:3','max:25']
        ];
    }
    public function messages() //funcaão criada para exibir as mensagem
    {
        return [
            'release_type.required'=>'O campo lancamento é obrigatório',
            'person.required'=>'O campo pessoa é obrigatório',
            'person.min'=>'O campo pessoa deve ter no mínimo 3 caractres',
            'person.max'=>'O campo pessoa deve ter no maximo 25 caractres',
            'amount.required'=>'O campo valor é obrigatório',
            'due_date.required'=>'O campo data é obrigatório',
            'description.required'=>'O campo descrição é obrigatório',
            'description.min'=>'O campo pessoa deve ter no mínimo 3 caractres',
            'description.max'=>'O campo pessoa deve ter no maximo 25 caractres'
        ];
    }
}
