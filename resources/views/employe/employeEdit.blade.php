@extends('company/master')
@section('content')
    <div class="container my-3">
        <div class="row">
        <div class="col-sm-4 offset-sm-4">
         
            @if(Session::get('fail'))
                <span class="alert alert-danger">{{ Session::get('fail') }}</span>
            @endif

            <form action="{{ route('EmployeResources.update',$employeData) }}" method="post">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{ $employeData->id }}">
                <div class="card">
                        <div class="card-header">
                            Customer Edit
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="first_name">Name</label>
                                <input type="text" value="{{ $employeData->first_name }}" class="form-control" name="first_name" placeholder="Enter Customer Name" />
                                <span class="text-danger">@error('name') {{ $message }} @enderror</span>
                            </div>
                            <div class="form-group">
                                <label for="last_name">Name</label>
                                <input type="text" value="{{ $employeData->last_name }}" class="form-control" name="last_name" placeholder="Enter Customer Name" />
                                <span class="text-danger">@error('name') {{ $message }} @enderror</span>
                            </div>
                            <div class="form-group">
                                <label for="employe_email">Email</label>
                                <input type="email" value="{{ $employeData->employe_email }}" class="form-control" name="employe_email" placeholder="Enter Customer Email" />
                                <span class="text-danger">@error('email') {{ $message }} @enderror</span>
                            </div>
                            <div class="form-group">
                                <label for="phone">Name</label>
                                <input type="text" value="{{ $employeData->phone }}" class="form-control" name="phone" placeholder="Enter Customer Name" />
                                <span class="text-danger">@error('name') {{ $message }} @enderror</span>
                            </div>
                            <div class="form-group">
                                <label for="company_id">Name</label>
                                <input type="text" value="{{ $employeData->company_id }}" class="form-control" name="company_id" placeholder="Enter Customer Name" />
                                <span class="text-danger">@error('name') {{ $message }} @enderror</span>
                            </div>
                        </div>
                        <div class="card-footer">
                        <button class="btn btn-success">Update</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>
@endsection