@extends('layout/base')
@section('content')
<link rel="stylesheet" href="{{asset('css/product/index.css')}}">

<div class="row">
    @foreach($categories as $category)
    <div class="col-md-4 col-lg-3 mb-2">
        <div class="card">
            <img src="{{ asset('static/img/product/categories/'.$category['image']) }}" alt="image" class="card-img-top">
            <div class="card-body text-center">
                <a href="{{ route('product.showAllPerCategory', ['category' => $category['name']]) }}" class="btn products">{{ mb_convert_case($category['name'],MB_CASE_TITLE, "UTF-8") }}</a>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection