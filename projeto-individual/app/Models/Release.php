<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

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

    //essa função foi implementada na model devido ser uma das boa pratica, porem deve-se ter outra forma
    //Nesse caso, passou-se o paramentro search, caso seja passado algo no campo de busca é atribuido um  valor a variavel query que recebe o valor de search, caso não é passado null e não mostra nada
    public function getReleases(string $search = null)
    {
        $releases = $this->where(function ($query) use ($search) {
            if($search){
                $query->where('release_type', $search);
                $query->orWhere('person', 'LIKE', "%{$search}%");
            }
        })
        ->paginate(5);
        return $releases;
    }

    public function setPersonAttribute($value)
    {
        $this->attributes['person'] = strtoupper($value);
    }

    //metodo para relacionar um ou mais lancamentos com um usuario
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
