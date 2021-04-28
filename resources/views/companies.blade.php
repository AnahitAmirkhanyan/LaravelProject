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
            <form method="POST" action="companies" enctype="multipart/form-data">
            @csrf
            <div class="block">
                <input  type="file" name="file">
            </div>
            <div class="block">
                <div class="blockErrors">
                    <input name="name" class="input-field" type="text" value="{{old("name")}}" placeholder="Company Name"/>
                        @error('name')
                            <div id="name_val" class="alert alert-danger validation">{{ $message }}</div>
                        @enderror
                </div>
                <div class="blockErrors">
                    <input name="email" class="input-field" type="email" value="{{old("email")}}" placeholder="Email"/>
                    @error('email')
                        <div id="email_val" class="alert alert-danger validation">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="block">
                <div class="blockErrors">
                    <input name="address" class="input-field" type="text" value="{{old("address")}}" placeholder="Address">
                    @error('address')
                        <div id="address_val" class="alert alert-danger validation">{{ $message }}</div>
                    @enderror
                </div>
                <div class="blockErrors">
                    <input name="phone" class="input-field" type="text" value="{{old("phone")}}" placeholder="Phone Number">
                    @error('phone')
                        <div id="phone_val" class="alert alert-danger validation">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div>
                <input id="submit" name="submit" type="submit" value="Submit" />
{{--                <button id="addSubmit" class="button"> SUBMIT </button>--}}
            </div>
        </form>
    </div>

    <div style="margin-top: 40px">
        <table class="table">
            <thead>
            <tr>
                <th>Logo</th>
                <th>Company Name</th>
                <th>Email</th>
                <th>Address</th>
                <th>Phone Number</th>
                <th colspan="2">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $item)
                <tr>
                    <td width="50px">
                        @if($item->logo)
                            <img height=40px src="{{ url('storage/'.$item->logo) }}">
                        @endif
                    </td>
                    <td>{{ $item->company_name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->address }}</td>
                    <td>{{ $item->phone_number }}</td>
                    <td>
                        <button id="editIcon"
                                data-id="{{$item->id}}"
                                data-company-name="{{$item->company_name}}"
                                data-address="{{$item->address}}"
                                data-email="{{$item->email}}"
                                data-phone-number="{{$item->phone_number}}"
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
                        <button data-id="{{$item->id}}" class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="modal" data-target="#deleteModal" data-placement="top" title="Delete">
                            <i class="fa fa-trash"></i>
                        </button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            {!! $data->links() !!}
        </div>
    </div>

    <!-- Delete Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="Delete" aria-hidden="true">
        <div class  ="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Delete Company</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this company?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <form action="companies" method="POST">
                        @method('DELETE')
                        @csrf
                        <input type=hidden id="company_id" name="company_id" value="">
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
                    <form method="POST" action="companies" class="was-validated">
                        @csrf
                        <div class="block">
                            <div class="blockErrors">
                                <input name="name" id="company_name" value="" class="input-field" type="text" placeholder="Company Name"/>
                                @error('name')
                                    <div id="edit_name_val" class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="blockErrors">
                                <input name="email" id="company_email" value="" class="input-field" type="email" placeholder="Email"/>
                                @error('email')
                                <div id="edit_email_val" class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="block">
                            <div class="blockErrors">
                                <input name="address" id="company_address" value="" class="input-field" type="text" placeholder="Address">
                                @error('address')
                                <div id="edit_address_val" class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="blockErrors">
                                <input name="phone" id="company_phone" value="" class="input-field" type="text" placeholder="Phone Number">
                                @error('phone')
                                <div id="edit_phone_val" class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    @method('PUT')
                    @csrf
                    <input type=hidden id="company_id" name="company_id" value="">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" id="editModalSubmit" class="btn btn-primary">Edit</button>
                </div>
                </form>
            </div>
        </div>
    </div>


    <script>
        // function  test () {
        //     console.log(this, 123)
        // }
        $(document).ready(function(){
            $('#submit').click(function(){
                $('#edit_name_val').hide();
                $('#edit_email_val').hide();
                $('#edit_address_val').hide();
                $('#edit_phone_val').hide();
            });

            $('#editIcon').click(function(){
               $('#name_val').hide();
               $('#email_val').hide();
               $('#address_val').hide();
               $('#phone_val').hide();
            });

            $('#editModal').on('shown.bs.modal', function(event){
                let button = $(event.relatedTarget);
                let company_id = button.data('id');
                let company_name = button.data('company-name');
                let company_email = button.data('email');
                let company_address = button.data('email');
                let phone_number = button.data('phone-number');
                let modal = $(this);

                modal.find('.modal-footer #company_id').val(company_id);
                modal.find('.modal-body #company_name').val(company_name);
                modal.find('.modal-body #company_email').val(company_email);
                modal.find('.modal-body #company_address').val(company_address);
                modal.find('.modal-body #company_phone').val(phone_number);
            });

            $('#deleteModal').on('shown.bs.modal', function(event){
                let button = $(event.relatedTarget);
                let company_id = button.data('id');
                let modal = $(this);
                modal.find('.modal-footer #company_id').val(company_id);
            });
        });
    </script>

@endsection
