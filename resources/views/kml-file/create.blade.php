@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div lass="col-md-8">
                @include('alerts.errors')
                @include('alerts.success')
                <div class="card">
                    <div class="card-header">Upload New KML File</div>
                    <div class="card-body mx-2">
                        <form action="{{route('kml.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group my-3">
                                <label class="form-label" for="kmlFile">KML File</label>
                                <input type="file" class="form-control" id="kmlFile" name="kmlFile" />
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
