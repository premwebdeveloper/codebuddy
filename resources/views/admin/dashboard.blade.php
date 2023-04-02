@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                   <h3>Categoies In Tree View</h3>
                    <ul id="tree1">
                        @foreach($categories as $category)
                            <li>
                                {{ $category->name }}
                                @if(count($category->childs))
                                    @include('categories.childs',['childs' => $category->childs])
                                @endif
                            </li>
                        @endforeach
                    </ul>

                </div>
            </div>
        </div>
    </div>
</div>


@endsection