<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Release;
use App\Models\User;
use App\Http\Requests\StorageReleaseRequest;
use Illuminate\Support\Facades\Auth;

class ReleaseController extends Controller
{
    //definindo a quantidade de itens por pagina
    private $totalPage = 5;

    //metodo para chamar a view
    public function create()
    {   
        return view('releases.add');
    }

    public function createAction(StorageReleaseRequest $request)//esse request é o mesmo que Request = new request
    {
        //foi utilizado essa forma de salvar dados devido a necessidade de pegar o id do usuario logado, caso não houvesse essa necessidade poderia usar o metodo create. poreḿ deve existir outras maneiras
        $user = Auth::user()->id;
        $release = new Release;
        $release->release_type = $request->release_type;
        $release->person = $request->person;
        $release->description = $request->description;
        $release->amount = $request->amount;
        $release->due_date = $request->due_date;
        $release->user_id = $user;

        $release->save();
        return redirect()->route('releases.list')
        ->with('messageRegister', 'Lancamento cadastrado com sucesso!');
    }

    public function list(Release $release)//passando o objeto, mas poderia ser de outra forma. usando esse recurso pq vou precisar filtar 
    {
        $releases = auth()->user()->releases()->paginate($this->totalPage);//filtrando apenas os registro do usuario logado
        return view('releases.list', compact('releases'));
    }
    public function filter(Request $request, Release $release)//pegando o objetto do metod list
    {
        $dataForm = $request->except('_token');//não exibindo o token sa requisição
        $releases = $release->search($dataForm,$this->totalPage);
        return view('releases.list', compact('releases', 'dataForm'));
    }

    public function edit($id)
    {
        // chamo esse array para capturar o campo escolhido através da logica implementada no form de edição. Poderia ser apenas uma select com options declarados no form de edicão, mas esse recurso me permite capturar o campo option selecionado optei por usa-lo, porem deve ter outras formas, essa forma serve para formularios de cadastros... 
        $typeReleases = ['DESPESA', 'RECEITA'];
        $data = Release::find($id);
        if(!$data)
        {
            return redirect()->route('releases.list');
        }
            return view('releases.edit',compact('data','typeReleases'));
    }
    public function editAction(StorageReleaseRequest $request, $id)
    {
        $data = Release::find($id);
        if(!$data)
        {
            return redirect()->route('releases.list');
        }
            $release = $request->all();
            
            $data -> update($release);
            return redirect()->route('releases.list')
            ->with('messageEdit', 'Lancamento alterado com sucesso!');
    }
    
    public function destroy($id)
    {
        Release::find($id)->delete();
        return redirect()->route('releases.list')
        ->with('messageDelete', 'Lancamento excluído com sucesso!');
    }

}
