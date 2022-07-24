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
}
