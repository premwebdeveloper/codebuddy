@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Categories') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                    <div class="col-lg-6 margin-tb">                            
                            <h1>Categories</h1>
                        </div>
                        <div class="col-lg-6 margin-tb text-end">                            
                            @can('category-create')
                                <a class="btn btn-success" href="{{route('category.create')}}"> Create New Category</a>
                            @endcan                            
                        </div>
                    </div>
                    <div class="clearfix">&nbsp;</div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    <table class="table table-bordered">
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                        </tr>
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $category->name }}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection