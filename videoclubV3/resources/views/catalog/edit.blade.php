@extends('layout.master')
@section('content')

    <div class="row" style="margin-top:40px">
        <div class="offset-md-3 col-md-6">
            <div class="card">
                <div class="card-header text-center">
                    Modificar película
                </div>
                <div class="card-body" style="padding:30px">

                    <form action="" method="put">
                         {{--{{method_field('PUT'}}--}}
                        @csrf

                        <div class="form-group">
                            <label for="title">Título</label>
                            <input type="text" name="title" id="title" class="form-control" value="{{$peliculas->title}}">
                        </div>

                        <div class="form-group">
                            <label for="title">Año</label>
                            <input type="number" name="anyo" id="anyo" class="form-control" value="{{$peliculas->year}}">
                        </div>

                        <div class="form-group">
                            <label for="title">Título</label>
                            <input type="text" name="director" id="director" class="form-control" value="{{$peliculas->director}}">
                        </div>

                        <div class="form-group">
                            <label for="title">Póster</label>
                            <input type="text" name="poster" id="poster" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="synopsis">Resumen</label>
                            <textarea name="synopsis" id="synopsis" class="form-control" rows="3">{{$peliculas->synopsis}}</textarea>
                        </div>

                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;">
                                Modificar película
                            </button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection