@extends('adminlte::page')

@section('title','Add New Customer')

@section('content')
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Add New Customer') }}</div>

                <div class="card-body">
                   <form action="{{ route('customer.store') }}" method="post">
                    
                    @csrf
                        <div class="row mb-3">
                          <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                          <div class="col-sm-10">
                            <input type="text" name="name" class="form-control" id="name">
                            @error('name')
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                          </div>
                        </div>
                       

                        <div class="row mb-3">
                          <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                          <div class="col-sm-10">
                            <input type="email" name="email" class="form-control" id="email">
                            @error('email')
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label class="col-form-label col-sm-2 pt-0">Gender</label>
                          <div class="col-sm-10">
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="gender" id="gender" value="Male" >
                              <label class="form-check-label" for="gridRadios1">
                                Male
                              </label>
                            </div>
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="gender" id="gender" value="Female">
                              <label class="form-check-label" for="gridRadios2">
                                Female
                              </label>
                            </div>
                          </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputName" class="col-sm-2 col-form-label">Address</label>
                            <div class="col-sm-10">
                              <textarea name="address" id="address" class="form-control"></textarea>
                              @error('address')
                              <span class="text-danger">
                                  {{ $message }}
                              </span>
                          @enderror
                            </div>
                          </div>

                        <button type="submit" class="btn btn-primary">Sign in</button>
                   </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop