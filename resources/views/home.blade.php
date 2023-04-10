@extends('layout/base')
@section('title', $title)
@section('content')

<div class="row">
    <div class="col-lg-4">
        <div class="image text-center">
            <img class="img fluid rounded-circle" src="{{ asset('static/img/homepage/carpenter_highlight.png') }}" alt="Generic placeholder image" width="200" height="200">
        </div>
        <h2>Jakość</h2>
        <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh.</p>
        <p><a class="btn btn-secondary w-auto" href="#" role="button">View details &raquo;</a></p>
    </div>
    <div class="col-lg-4">
        <div class="image text-center">
            <img class="img fluid rounded-circle" src="{{ asset('static/img/homepage/bed_highlight.jpg') }}" alt="Generic placeholder image" width="200" height="200">
        </div>
        <h2>Wygląd</h2>
        <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh.</p>
        <p><a class="btn btn-secondary w-auto" href="#" role="button">View details &raquo;</a></p>
    </div>
    <div class="col-lg-4">
        <div class="image text-center">
            <img class="img fluid rounded-circle" src="{{ asset('static/img/homepage/wakingup_highlight.jpg') }}" alt="Generic placeholder image" width="200" height="200">
        </div>
        <h2>Wygoda</h2>
        <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh.</p>
        <p><a class="btn btn-secondary w-auto" href="#" role="button">View details &raquo;</a></p>
    </div>
</div>

<hr class="featurette-divider">

<div class="row featurette">
    <div class="col-md-7">
        <h2 class="featurette-heading">First featurette heading. <span class="text-muted">It'll blow your mind.</span></h2>
        <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
    </div>
    <div class="col-md-5">
        <img class="featurette-image img-fluid mx-auto" style="border-radius:8px;" src="{{ asset('static/img/homepage/bed_article.png') }}" alt="Generic placeholder image">
    </div>
</div>

<hr class="featurette-divider">

@endsection