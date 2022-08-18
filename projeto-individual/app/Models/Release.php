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

    public function setPersonAttribute($value)
    {
        $this->attributes['person'] = strtoupper($value);
    }

    //metodo para relacionar um ou mais lancamentos com um usuario
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //essa função foi implementada na model devido ser uma das boa pratica, porem deve-se ter outra forma
    //Nesse caso, passou-se o paramentro search, caso seja passado algo no campo de busca é atribuido um  valor a variavel query que recebe o valor de search, caso não é passado null e não mostra nada
    public function search(Array $search, $totalPage)
    {
        
        $releases = $this->where(function ($query) use ($search) {
            if(isset($search['release_type']))
                $query->where('release_type', $search['release_type']);
                // $query ->orWhere('person', 'LIKE', "%{$search}%");
            
        })
        
        ->paginate($totalPage);
        return $releases;
    }

    // public function search(Array $data, $totalPage)
    // {
    //     $historics = $this->where(function ($query) use ($data) {
    //         if (isset($data['id']))
    //             $query->where('id', $data['id']);

    //         if (isset($data['date']))
    //             $query->where('date', $data['date']);

    //         if (isset($data['type']))
    //             $query->where('type', $data['type']);
    //     })
    //     // ->where('user_id', auth()->user()->id)
    //     ->userAuth()
    //     ->with(['userSender'])
    //     ->paginate($totalPage);
    //     //->toSql();dd($historics);

    //     return $historics;
    // }

}
