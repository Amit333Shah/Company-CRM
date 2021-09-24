@extends('company/master')
@section('content')
    <div class="container my-3">
        <div class="row">
        <div class="col-sm-4 offset-sm-4">
         
            @if(Session::get('fail'))
                <span class="alert alert-danger">{{ Session::get('fail') }}</span>
            @endif

            <form action="{{ route('CompanyResources.update',$companyData) }}" method="post">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{ $companyData->id }}">
                <div class="card">
                        <div class="card-header">
                            Customer Edit
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="Name">Name</label>
                                <input type="text" value="{{ $companyData->Name }}" class="form-control" name="name" placeholder="Enter Customer Name" />
                                <span class="text-danger">@error('name') {{ $message }} @enderror</span>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" value="{{ $companyData->email }}" class="form-control" name="email" placeholder="Enter Customer Email" />
                                <span class="text-danger">@error('email') {{ $message }} @enderror</span>
                            </div>
                            <div class="form-group">
                                <label><b>Image :-</b></label>
                                <input type="file" name="logo" class="form-control" value="{{ $companyData->logo }}">
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

    </div>
@endsection