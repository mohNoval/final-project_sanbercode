@extends('template.master')

@section('content')
    <section class="content mt-3">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{session('success')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="card m2">
            <div class="card-header bg-dark">
                <div class="row">
                    <div class="col col-md-11">
                        <div class="image">
                            <img src="{{asset('assets/dist')}}/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image" style="width: 30px"> {{$data->penanya->name}}
                        </div>
                        <h4>{{$data->judul}}</a></h4>
                    </div>
                    <div class="col col-md-1 m-auto" style="display: flex">
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

                dibuat : {{$data->created_at}}, terakhir di edit : {{$data->updated_at}}
            </div>
                <div  class="card-body">
                <div class="row">
                    <div class="col col-md-10">
                        {{-- <h4>{{$data->judul}}</a></h4>
                        <hr> --}}
                        <b>pertanyaan :</b><br><br>
                        {{$data->isi}} {{$jawaban->user->name}} {{$jawaban->jawaban}}
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
                        <b>Jawaban :</b>
                            {{-- @if (empty($count_jawaban))
                                0 Jawaban :
                            @else
                                {{$count_jawaban}} Jawaban : 
                            @endif --}}
                        </b><br>
                        
                        <div class ="post mt-3">
                            <div class="user-block">
                                <img class="img-circle img-bordered-sm" src="{{asset('assets/dist')}}/img/user2-160x160.jpg">
                                <span class="username">
                                        {{$jawaban->user->name}}
                                        <i class="fa fa-check"></i>
                                        <br><p class="description ml-0">jawaban tepat  </p>
                                    </span>
                                </div>
                                <p class="description ml-2">{{$jawaban->jawaban}}</p>
                        </div>

                        @forelse ($jawab as $jawab)
                            <div class = "post mt-3">
                                <div class="user-block">
                                    <img class="img-circle img-bordered-sm" src="{{asset('assets/dist')}}/img/user2-160x160.jpg">
                                        
                                        <span class="username">
                                            <div class="row">
                                                <div class="col col-md-11">
                                                {{$jawab->penjawab->name}}
                                                <br><p class="description ml-0">{{$jawab->created_at}}</p></div>
                                                <div class="col col-md-1">
                                                    <form action="/jawaban_tepat" method="post">
                                                        @csrf
                                                        <input type="hidden" name="jawaban" value="{{$jawab->jawaban}}">
                                                        <input type="hidden" name="user_id" value="{{$jawab->penjawab->id}}">
                                                        <input type="hidden" name="pertanyaan_id" value="{{$jawab->pertanyaan->id}}">
                                                        <input type="hidden" name="id" value="{{$jawab->id}}">
                                                        <button type="submit" class="btn btn-success btn-sm">Jawaban Benar</button>
                                                    </form>
                                                </div>
                                            </div>
                                            
                                        </span>
                                    </div>
                                    <p class="description ml-2">{{$jawab->jawaban}}</p>
                                </div>
                        @empty

                        @endforelse
                    </div>

                    <div class="col col-md-2 m-0 text-center">
                        @if (session('vote'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{session('vote')}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
                        <b>Point vote : </b><br><br>
                        @if ($upvote > 0)
                            <br>
                        @else
                            <form role="form" action="/vote" method="POST">
                                @csrf
                                <input type="hidden" name="point" value="1">
                                <input type="hidden" name="author" value="{{$data->penanya->id}}">
                                <input type="hidden" name="id_pertanyaan" value="{{$data->id}}">
                                <button type="submit" class="btn btn-default btn-sm"><i class="fa fa-caret-up"></i></button>
                            </form>
                        @endif
                        <h1>{{$count_vote}}</h1>
                        <form action="/downvote" method="POST">
                            @csrf
                            <input type="hidden" name="point" value="1">
                            <input type="hidden" name="author" value="{{$data->penanya->id}}">
                            <input type="hidden" name="id_pertanyaan" value="{{$data->id}}">
                            <button type="submit" class="btn btn-default  btn-sm"><i class="fa fa-caret-down"></i></button>
                        </form>
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

