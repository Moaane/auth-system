@extends('adminlte::page')

@section('title','Customer List')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Customer List') }}</div>

                <div class="card-body">
                    <a href="{{ route('customer.create') }}" class="btn btn-success float-right mb-3">
                        <i class="fa fa-plus fa-light"></i> Create
                    </a>
                   <table class="table table-bordered">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Gender</th>
                            <th>Address</th>
                            <th colspan="2" class="text-center">Action</th>
                        </tr>
                        @php
                            $no=1;    
                        @endphp
                        @foreach ($customer as $c)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $c->name }}</td>
                                <td>{{ $c->email }}</td>
                                <td>{{ $c->gender }}</td>
                                <td>{{ $c->address }}</td>
                                <td class="d-flex justify-content-around">
                                    <a href="{{ route('customer.edit',$c->id) }}" class="btn btn-sm btn-primary" title="Edit">
                                        <i class="fa fa-edit"></i>
                                    </a> 
                                    <form action="{{ route('customer.destroy',$c->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" title="Delete">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                   </table>
                   <br>
                   {{ $customer->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@stop