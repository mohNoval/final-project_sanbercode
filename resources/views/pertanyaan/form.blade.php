@extends('template.master')

@section('content')
<div class="container mt-3">
    <div class="card card-success">
        <div class="card-header">
            <h3 class="card-title">Buat Pertanyaan</h3>
        </div>

        <form role="form" method="POST" action="/pertanyaan">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Judul Pertanyaan</label>
                    <input type="text" class="form-control" value="{{old('judul','')}}" name="Judul" id="exampleInputEmail1" placeholder="Judul pertanyaan">
                    @error('judul')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="isi">Pertanyaan</label>
                    <textarea name="isi" id="isi" cols="30" rows="10" class="form-control" placeholder="Pertanyaan...">{{old('isi','')}}</textarea>
                    @error('isi')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>
@endsection
