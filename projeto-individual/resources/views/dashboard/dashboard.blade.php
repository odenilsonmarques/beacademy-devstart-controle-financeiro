@extends('layouts.template')
@section('title','dashboard')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-sm-3 text-center mt-5">
          <div class="card text-white mb-3" style="max-width: 540px; background-color:#6c63ff;">
              <div class="row g-0">
                <div class="col-md-4">
                  <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-graph-up-arrow mt-4" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M0 0h1v15h15v1H0V0Zm10 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V4.9l-3.613 4.417a.5.5 0 0 1-.74.037L7.06 6.767l-3.656 5.027a.5.5 0 0 1-.808-.588l4-5.5a.5.5 0 0 1 .758-.06l2.609 2.61L13.445 4H10.5a.5.5 0 0 1-.5-.5Z"/>
                  </svg>
                </div>
                <div class="col-md-8">
                  <div class="card-body">
                    <p class="card-title text-center">Lancamentos</p>
                    <h5 class="number">{{$allsReleasesUser}}</h5>
                  </div>
                </div>
              </div>
          </div>
      </div>
      <div class="col-sm-3 text-center mt-5">
        <div class="card text-white bg-success mb-3" style="max-width: 540px;">
            <div class="row g-0">
              <div class="col-md-4">
                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-currency-dollar mt-4" viewBox="0 0 16 16">
                  <path d="M4 10.781c.148 1.667 1.513 2.85 3.591 3.003V15h1.043v-1.216c2.27-.179 3.678-1.438 3.678-3.3 0-1.59-.947-2.51-2.956-3.028l-.722-.187V3.467c1.122.11 1.879.714 2.07 1.616h1.47c-.166-1.6-1.54-2.748-3.54-2.875V1H7.591v1.233c-1.939.23-3.27 1.472-3.27 3.156 0 1.454.966 2.483 2.661 2.917l.61.162v4.031c-1.149-.17-1.94-.8-2.131-1.718H4zm3.391-3.836c-1.043-.263-1.6-.825-1.6-1.616 0-.944.704-1.641 1.8-1.828v3.495l-.2-.05zm1.591 1.872c1.287.323 1.852.859 1.852 1.769 0 1.097-.826 1.828-2.2 1.939V8.73l.348.086z"/>
                </svg>
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title">Receitas</h5>
                  <h5 class="number">{{number_format("$allsRevenues",2,",",".")}}</h5>
                </div>
              </div>
            </div>
        </div>
      </div>
      <div class="col-sm-3 text-center mt-5">
        <div class="card text-white  bg-danger mb-3" style="max-width: 540px;">
            <div class="row g-0">
              <div class="col-md-4">
                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-currency-dollar mt-4" viewBox="0 0 16 16">
                  <path d="M4 10.781c.148 1.667 1.513 2.85 3.591 3.003V15h1.043v-1.216c2.27-.179 3.678-1.438 3.678-3.3 0-1.59-.947-2.51-2.956-3.028l-.722-.187V3.467c1.122.11 1.879.714 2.07 1.616h1.47c-.166-1.6-1.54-2.748-3.54-2.875V1H7.591v1.233c-1.939.23-3.27 1.472-3.27 3.156 0 1.454.966 2.483 2.661 2.917l.61.162v4.031c-1.149-.17-1.94-.8-2.131-1.718H4zm3.391-3.836c-1.043-.263-1.6-.825-1.6-1.616 0-.944.704-1.641 1.8-1.828v3.495l-.2-.05zm1.591 1.872c1.287.323 1.852.859 1.852 1.769 0 1.097-.826 1.828-2.2 1.939V8.73l.348.086z"/>
                </svg>
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title">Despesas</h5>
                  <h5 class="number">{{number_format("$allsExpenses",2,",",".")}}</h5>
                </div>
              </div>
            </div>
        </div>
      </div>
      <div class="col-sm-3 text-center mt-5">
        <div class="card text-white mb-3" style="max-width: 540px; background-color:#1A1A40">
            <div class="row g-0">
              <div class="col-md-4">
                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-currency-dollar mt-4" viewBox="0 0 16 16">
                  <path d="M4 10.781c.148 1.667 1.513 2.85 3.591 3.003V15h1.043v-1.216c2.27-.179 3.678-1.438 3.678-3.3 0-1.59-.947-2.51-2.956-3.028l-.722-.187V3.467c1.122.11 1.879.714 2.07 1.616h1.47c-.166-1.6-1.54-2.748-3.54-2.875V1H7.591v1.233c-1.939.23-3.27 1.472-3.27 3.156 0 1.454.966 2.483 2.661 2.917l.61.162v4.031c-1.149-.17-1.94-.8-2.131-1.718H4zm3.391-3.836c-1.043-.263-1.6-.825-1.6-1.616 0-.944.704-1.641 1.8-1.828v3.495l-.2-.05zm1.591 1.872c1.287.323 1.852.859 1.852 1.769 0 1.097-.826 1.828-2.2 1.939V8.73l.348.086z"/>
                </svg>
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title">Saldo</h5>
                  <h5 class="number">{{number_format($allsRevenues - $allsExpenses,2,",","." )}}</h5>
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="table-responsive mt-4">
        <table class="table table-borderless dashboard">
          <thead class="table" style="background-color:#6c63ff;" >
            <tr class="text">
                <th>Lançamento</th>
                <th>Pessoa</th>
                <th>Valor</th>
                <th>Data do Lançamento</th>
            </tr>
          </thead>
          <tbody>
            @foreach($releases as $release)
              @if($release->release_type == 'DESPESA')
                <tr class="lineRed">
                  <td>
                    {{$release->release_type}} 
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-arrow-down-circle mb-1" viewBox="0 0 16 16">
                      <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v5.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V4.5z"/>
                    </svg>
                  </td>
                  <td>{{$release->person}}</td>
                  <td>R$ {{number_format($release->amount, 2, ',', '.')}}</td>
                  <td>{{date('d/m/Y',strtotime($release->due_date))}}</td>
                </tr>
              @else
                <tr class="lineDark">
                  <td>
                    {{$release->release_type}}
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-arrow-up-circle mb-1" viewBox="0 0 16 16">
                      <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-7.5 3.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V11.5z"/>
                    </svg>
                  </td>
                  <td>{{$release->person}}</td>
                  <td>R$ {{number_format($release->amount, 2, ',', '.')}}</td>
                  <td>{{date('d/m/Y',strtotime($release->due_date))}}</td>
                </tr>
              @endif
            @endforeach
          </tbody>
        </table>
        <div class="justify-content-center pagination">
          {{$releases->links('pagination::bootstrap-4')}}
        </div>
      </div>
    </div>
  </div>
@endsection






