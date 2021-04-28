@extends('layout')

@section('content')

    <div style="margin-top: 50px">
        @foreach($companies as $company)
        <div class="accordion" id="accordionExample">
            <div class="card">
                <div style="background-color: #dcf5ee; color: #1d755d" class="card-header" id="heading{{$company->id}}" >
                    <h2 class="mb-0">
                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse{{$company->id}}" aria-expanded="false" aria-controls="collapse{{$company->id}}">
                            {{$company->company_name}}
                        </button>
                    </h2>
                </div>

                <div id="collapse{{$company->id}}" class="collapse" aria-labelledby="heading{{$company->id}}" data-parent="#accordionExample">
                    <div class="card-body">
                        @if($company->employees->count() != 0)
                            @foreach($company->employees as $employee)
                                <p>{{$employee->first_name." ".$employee->last_name}}</p>
                            @endforeach
                        @else
                            <p style="color: grey">No employees to show</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection
