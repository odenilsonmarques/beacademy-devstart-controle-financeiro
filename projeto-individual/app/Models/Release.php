<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Release;
use Illuminate\Support\Facades\Auth;


class Release extends Model
{
    use HasFactory;

    protected $fillable = [
        'release_type',
        'person',
        'description',
        'amount',
        'due_date',
        'user_id',
    ];
    //metodo para relacionar um ou mais lancamentos com um usuario
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //utilizando o recurso mutators para especificar os padrões que desejo inserir na banco de dados
    //utilizei o nome das variaveis igual aos campo, mas poderia ser outro nome
    public function setPersonAttribute($person)
    {
        $this->attributes['person'] = strtoupper($person);
    }
    public function setDescriptionAttribute($description)
    {
        $this->attributes['description'] = strtoupper($description);
    }
    public function setAmountAttribute($amount)
    {
        $this->attributes['amount'] = str_replace(['.',','],['','.'],$amount);
    }


    //Nesse caso, passou-se o paramentro search, caso seja passado algo no campo de busca é atribuido um  valor a variavel query que recebe o valor de search, caso não, não mostra nada
    public function search(Array $search, $totalPage)
    {
        //atribuindo o valor da busca a variavel releases
        $releases = $this->where(function ($query) use ($search) {

        if(isset($search['release_type'])){
            $query->where('release_type', $search['release_type']);
        }

        if(isset($search['person'])){
            $query->where('person', $search['person']);
            // $query ->orWhere('person', 'LIKE', "%{$search}%");
        }

        if(isset($search['due_date'])){
            $query->where('due_date', $search['due_date']);
            // $query ->orWhere('person', 'LIKE', "%{$search}%");
        }
        })
        ->where('user_id', Auth()->user()->id)
        ->paginate($totalPage);
        return $releases;
    }
}
