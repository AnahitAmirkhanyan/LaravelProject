@extends('layout')

@section('content')


    <div style="margin-top: 50px">

        @if(session('success'))
            <div class="alert alert-success" role="alert">
                {{session('success')}}
            </div>
        @endif

        @if(session('errors'))
                <div class="alert alert-danger" role="alert">
                    There were some errors.
                </div>
        @endif


        <form method="POST" action="employees" class="was-validated">
            @csrf
            <div class="block">
                <div class="blockErrors">
                    <input name="first_name" type="text" placeholder="First Name" value="{{ old('first_name') }}" class="input-field"/>
                    @error('first_name')
                        <div class="alert alert-danger validation">{{ $message }}</div>
                    @enderror
                </div>
                <div class="blockErrors">
                    <input name="last_name" type="text" placeholder="Last Name" value="{{ old('last_name') }}" class="input-field"/>
                    @error('last_name')
                        <div class="alert alert-danger validation" >{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="block">
                <div class="blockErrors">
                    <input name="email" type="text" placeholder="Email" value="{{ old('email') }}" class="input-field"/>
                                @error('email')
                        <div class="alert alert-danger validation" >{{ $message }}</div>
                    @enderror
                </div>
                <div class="blockErrors">
                    <select name="company_id" value="{{ old('company_id') }}" class="select">
                        <option value="" disabled selected >Company Name</option>
                        @foreach($companies as $company)
                            <option value="{{$company['id']}}" {{ old('company_id') == $company['id'] ? "selected" :""}}>{{$company['company_name']}}</option>
                        @endforeach

                    </select>
                    @error('company_id')
                    <div class="alert alert-danger validation">{{ $message }}</div>
                    @enderror
                </div>

            </div>
            <div>
                <button class="button"> SUBMIT </button>
            </div>
        </form>
    </div>

    <div class="employeesTable">
        <table class="table">
            <thead>
                <tr>
                    <th style="border-radius: 5px">First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Company</th>
                    <th colspan="2">Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach($payload as $item)
                <tr>
                    <td>{{ $item->first_name }}</td>
                    <td>{{ $item->last_name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->company_name }}</td>
                    <td>
                        <button
                            data-emp="{{$item->id}}"
                            data-emp-first-name="{{$item->first_name}}"
                            data-emp-last-name="{{$item->last_name}}"
                            data-emp-email="{{$item->email}}"
                            data-emp-company="{{$item->company_name}}"
                            class="btn btn-success btn-sm rounded-0"
                            type="button"
                            data-toggle="modal"
                            data-target="#editModal"
                            data-placement="top"
                            title="Edit">
                            <i class="fa fa-edit"></i>
                        </button>
                    </td>
                    <td>
                        <button data-emp="{{$item->id}}" class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="modal" data-target="#deleteModal" data-placement="top" title="Delete">
                            <i class="fa fa-trash"></i>
                        </button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            {!! $payload->links() !!}
        </div>

        <!-- Delete Modal -->
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="Delete" aria-hidden="true">
            <div class  ="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Delete Employee</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete this employee?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <form action="employees" method="POST">
                            @method('DELETE')
                            @csrf
                            <input type=hidden id="emp_id" name="employee_id" value="">
                            <button type="submit" class="btn btn-danger deleteEmployee">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Edit Modal -->
        <div style="width:90%" class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="Edit" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content" style="width:750px">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Edit Employee</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="employees" class="was-validated">
                        <div class="block">
                            <div class="blockErrors">
                                <input name="e_first_name" id="fname" type="text" placeholder="First Name" value="" class="input-field"/>
                                @error('e_first_name')
                                <div id="validation" class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="blockErrors">
                                <input name="e_last_name" id="lname" type="text" placeholder="Last Name" value="" class="input-field"/>
                                @error('e_last_name')
                                <div id="validation" class="alert alert-danger" >{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="block">
                            <div class="blockErrors">
                                <input name="e_email" id="email" type="text" placeholder="Email" value="" class="input-field"/>
                                @error('e_email')
                                <div id="validation" class="alert alert-danger" >{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="blockErrors">
                                <select name="e_company_id"  value="" class="select">
                                    <option id="company_selected" value="" selected >Company Name</option>
                                    @foreach($companies as $company)
                                        <option value="{{$company['id']}}" {{ old('company_id') == $company['id'] ? "selected" :""}}>{{$company['company_name']}}</option>
                                    @endforeach

                                </select>
                                @error('e_company_id')
                                <div class="alert alert-danger" style="font-size:13px;color:#ff0000;padding-left: 10px">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        @method('PUT')
                        @csrf
                        <input type=hidden id="emp_id" name="employee_id" value="">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                </form>
                </div>
            </div>
        </div>

    </div>


    <script>
        $(document).ready(function(){
            $('#editModal').on('shown.bs.modal', function(event){
                let button = $(event.relatedTarget);
                let emp_id = button.data('emp');
                let emp_name = button.data('emp-first-name');
                let emp_last = button.data('emp-last-name');
                let emp_email= button.data('emp-email');
                let emp_comp = button.data('emp-company');
                let modal = $(this);

                modal.find('.modal-footer #emp_id').val(emp_id);
                modal.find('.modal-body #fname').val(emp_name);
                modal.find('.modal-body #lname').val(emp_last);
                modal.find('.modal-body #email').val(emp_email);
                modal.find('.modal-body #company_selected').val(emp_comp);
            });

            $('#deleteModal').on('shown.bs.modal', function(event){
                let button = $(event.relatedTarget);
                let emp_id = button.data('emp');
                let modal = $(this);
                console.log(emp_id);

                modal.find('.modal-footer #emp_id').val(emp_id);
            });
        });
    </script>

@endsection

