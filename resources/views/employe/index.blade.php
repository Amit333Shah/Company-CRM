@extends('company/master')
@section('content')
    <div class="container my-3">
        <div class="row">
        <div class="col-sm-4 offset-sm-4">
            @if(Session::get('success'))
                <span class="alert alert-success">{{ Session::get('success') }}</span>
            @endif

            @if(Session::get('fail'))
                <span class="alert alert-danger">{{ Session::get('success') }}</span>
            @endif
            <form action="{{ route('EmployeResources.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="card">
                        <div class="card-header">
                            Employe Add
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="first_name">Name</label>
                                <input type="text" value="{{ old('first_name') }}" class="form-control" name="first_name" placeholder="Enter Employe Fisrt_Name" />
                                <span class="text-danger">@error('first_name') {{ $message }} @enderror</span>
                            </div>
                            <div class="form-group">
                                <label for="last_name">Name</label>
                                <input type="text" value="{{ old('last_name') }}" class="form-control" name="last_name" placeholder="Enter Employe Last_Name" />
                                <span class="text-danger">@error('last_name') {{ $message }} @enderror</span>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" value="{{ old('employe_email') }}" class="form-control" name="employe_email" placeholder="Enter Employe Email" />
                                <span class="text-danger">@error('employe_email') {{ $message }} @enderror</span>
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" value="{{ old('phone') }}" class="form-control" name="phone" placeholder="Enter Employe phone" />
                                <span class="text-danger">@error('phone') {{ $message }} @enderror</span>
                            </div>
                            <div class="form-group">
                                <label for="company_id">Company_id</label>
                                <input type="text" value="{{ old('company_id') }}" class="form-control" name="company_id" placeholder="Enter Employe phone" />
                                <span class="text-danger">@error('company_id') {{ $message }} @enderror</span>
                            </div>
                        </div>
                        <div class="card-footer">
                        <button class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="row">
            <div class="col-sm-12">
            <h1>Employe List</h1>
            <table class="table table-hovered table-stripped">
                    <thead>
                    <tr>
                        <th>SNo.</th>
                        <th>&nbsp first_name</th>
                        <th>&nbsp last_name</th>
                        <th>&nbsp employe_email</th>
                        <th>&nbsp company_id</th>
                        <th>&nbsp Action</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($employe as $data)
                        <tr>
                            <td>{{ $data->id }}</td>
                            <td>{{ $data->first_name }}</td>
                            <td>{{ $data->last_name }}</td>
                            <td>{{ $data->employe_email }}</td>
                            <td>&nbsp&nbsp&nbsp&nbsp{{ $data->company_id }}</td>

                            <td>
                           
                            <a type="button" href="{{ route('EmployeResources.edit',$data) }}" class="btn btn-primary">Edit</a>
                            &nbsp;
                            <form method="post" enctype="multipart/form-data" action="{{ route('EmployeResources.destroy',$data) }}" style="display:inline-block">
                            @csrf
                            @method('DELETE')
                                <button class="btn btn-danger" onclick="return confirm('Sure to Delete !!!')">Delete</button>
                            </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
            </table>
            <span>
                {{$employe->links()}}
            </span>
            </div>
    </div>
    <style>
        .w-5{
            display: none;
        }
    </style>
@endsection