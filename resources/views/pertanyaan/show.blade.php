@extends('template.master')

@section('content')
    <section class="content mt-3">
         @if (session('success'))
            <div class="alert alert-success">
                {{session('success')}}
            </div>
        @endif
        <div class="card m2">
            <div class="card-header">
                <div class="row">
                    <div class="col col-md-11">
                        <h4>{{$data->judul}}</a></h4>
                    </div>
                    <div class="col col-md-1" style="display: flex">
                        @if ($data->user_id == Auth::user()->id)
                        <a href="/pertanyaan/{{$data->id}}/edit" class="btn btn-primary">Edit</a>
                        <form action="/pertanyaan/{{$data->id}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Delete" class="btn btn-warning"></input>
                        </form>
                    @endif
                    </div>
                </div>
                penanya : {{$data->penanya->name}}<br>
                dibuat : {{$data->created_at}}, terakhir di edit : {{$data->updated_at}}
            </div>
                <div  class="card-body">
                <div class="row">
                    <div class="col col-md-10">
                        {{-- <h4>{{$data->judul}}</a></h4>
                        <hr> --}}
                        <b>pertanyaan :</b><br><br>
                        {{$data->isi}}
                        <hr>
                        <form action="/jawaban" method="post">
                            @csrf
                            <input type="hidden" value="{{$data->id}}" name="pertanyaan_id">
                            <div class="form-group">
                                <label for="">Jawab</label>
                                <textarea name="jawab" class="form-control" id="" cols="30" rows="5"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">simpan</button>
                        </form>
                        <hr>
                        <b>Jawaban :</b><br>
                        @forelse ($jawab as $jawab)
                            {{$jawab->jawaban}}<br>
                        @empty
                            tidak ada jawaban
                        @endforelse
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
                    Tags :
                    @foreach ($data->tags as $tag)
                    <a href="" class="btn btn-default">{{$tag->tag_name}}</a>
                    @endforeach
                </div>
                <!-- /.card-footer-->
            </div>
     </section>
@endsection

