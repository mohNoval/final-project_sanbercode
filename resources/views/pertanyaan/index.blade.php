@extends('template.master')

@section('content')

        <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>
                Pertanyaan <a href="/pertanyaan/create" class="btn btn-success"> Buat Pertanyaan </a>
            </h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
    @if (session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
    @endif

    @forelse ($data as $data)
        <div class="card">
        <div class="card-header">
            <h4> Judul : {{$data->judul}}</h4>

            {{-- <div class="card-tools">
               <a href="" class="btn btn-warning">Detail</a>
            </div> --}}
        </div>
        <div  class="card-body">
        <div class="row">
            <div class="col col-md-10">
                pertanyaan :<br><br>
                {{$data->isi}}
            </div>

            <div class="col col-md-2 m-0 text-center">
                <b>Point vote : </b><br><br>
                <a href="" class="btn btn-default btn-sm"><i class="fa fa-caret-up"></i></a>
                    <h1>0</h1>
                <a href="" class="btn btn-default  btn-sm"><i class="fa fa-caret-down"></i></a>
            </div>
        </div>
            <br><br>

        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            Tags : <a href="" class="btn btn-default">asf</a>
        </div>
        <!-- /.card-footer-->
    </div>
    <!-- /.card -->
    @empty
        kosong
    @endforelse


    </section>
@endsection
