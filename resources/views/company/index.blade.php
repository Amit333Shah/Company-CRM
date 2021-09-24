@extends('company\master')
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
            <form action="{{ route('CompanyResources.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="card">
                        <div class="card-header">
                            Company Add
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="Name">Name</label>
                                <input type="text" value="{{ old('Name') }}" class="form-control" name="Name" placeholder="Enter Customer Name" />
                                <span class="text-danger">@error('name') {{ $message }} @enderror</span>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" value="{{ old('email') }}" class="form-control" name="email" placeholder="Enter Customer Email" />
                                <span class="text-danger">@error('email') {{ $message }} @enderror</span>
                            </div>
                            <div class="form-group">
                                <label><b>Image :-</b></label>
                                <input type="file" name="logo" class="form-control" value="{{ old('logo') }}">
                                <span class="text-danger">@error('logo') {{ $message }} @enderror</span>

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
            <h1>Customer List</h1>
            <table class="table table-hovered table-stripped">
                    <thead>
                    <tr>
                        <th>SNo.</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>image</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($company as $data)
                        <tr>
                            <td>{{ $data->id }}</td>
                            <td>{{ $data->Name }}</td>
                            <td>{{ $data->email }}</td>
                            <img src="{{ asset('public/storage/app/.$data->logo') }}" class="img img-thumbnail">

                            <td>
                           
                            <a type="button" href="{{ route('CompanyResources.edit',$data) }}" class="btn btn-primary">Edit</a>
                            &nbsp;
                            <form method="post" enctype="multipart/form-data" action="{{ route('CompanyResources.destroy',$data) }}" style="display:inline-block">
                            @csrf
                            @method('DELETE')
                                <button class="btn btn-danger" onclick="return confirm('Sure to Delete !!!')">Delete</button>
                            </form>
                            </td>
                            
                        </tr>
                        @endforeach
                    </tbody>
            </table>
            </div>
    </div>
    
@endsection