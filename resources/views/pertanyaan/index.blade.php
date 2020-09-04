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

    <div class="row">
        @forelse ($data as $data)
            <div class="col col-md-6">
                <div class="card">
                <div class="card-header bg-dark text-center">
                    <h4><a href="/pertanyaan/{{$data->id}}" class="text-white">{{$data->judul}}</a></h4>

                    {{-- <div class="card-tools">
                    <a href="" class="btn btn-warning">Detail</a>
                    </div> --}}
                </div>
                <div  class="card-body">
                    <div class="row">
                        <div class="col col-md-10">
                            <b>pertanyaan :</b><br><br>
                            {{$data->isi}}
                        </div>

                        <div class="col col-md-2 m-0 text-center">
                            <b>Point vote : </b><br>
                            <h4>
                                @if (empty($data->vote->point))
                                    0
                                @else
                                    {{DB::table('vote_pertanyaans')->where('pertanyaan_id', $data->id)->count()}}
                                @endif
                            </h4><br>
                        </div>
                        <small class="mt-3 ml-1 btn btn-info btn-sm">{{DB::table('jawabans')->where('pertanyaan_id', $data->id)->count()}} jawaban</small>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <div class="row">
                        <div class="col col-md-10">
                            Tags :
                            @forelse ($data->tags as $tag)
                                <a href="" class="btn btn-default">{{$tag->tag_name}}</a>
                            @empty
                                tidak ada tag
                            @endforelse
                        </div>
                        <div class="col col-md-2">
                            <div class="image">
                                <img src="{{asset('assets/dist')}}/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image" style="width: 30px"> {{$data->penanya->name}}
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.card-footer-->
            </div>
        </div>

        <!-- /.card -->
        @empty
            kosong
        @endforelse
    </div>
    </section>
@endsection
