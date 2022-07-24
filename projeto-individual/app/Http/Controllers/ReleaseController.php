<?php

namespace App\Http\Controllers;

use App\Models\Release;
use Illuminate\Http\Request;

class ReleaseController extends Controller
{
    //funcao para chamar o model,onde será incluida alguma regras de negócio
    public function __construct(Release $release)
    {
        $this->model = $release;
    }

    public function list(Request $request)//passando o Request por causa do formulario de busca que foi implementado na list de releases
    {
        // dd($request->all());
        // $releases = Release::paginate(5);
        $releases = $this->model->getReleases(//chamando a funcaoa declarada no model release para realisar filtragem
            $request->search ?? '' //caso encontre um valor será exibido, se não vai aparecer nenhum valor
        );
        return view('releases.list', compact('releases'));
    }

    public function create()
    {
        return view('releases.add');
    }
    public function createAction(Request $request)//esse request é o mesmo que Request = new request
    {
        $data = $request->all();
        Release::create($data);
        return redirect()->route('releases.list');
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
    public function editAction(Request $request, $id)
    {
        $data = Release::find($id);
        if(!$data)
        {
            return redirect()->route('releases.list');
        }
            $release = $request->all();
            $data -> update($release);
            return redirect()->route('releases.list');
    }
    
    public function destroy($id)
    {
        Release::find($id)->delete();
        return redirect()->route('releases.list');
    }

}
