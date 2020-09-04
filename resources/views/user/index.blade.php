@extends('template.master')

@section('content')
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>
                User
            </h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="card">
                <div class="card-header">
                    <h4>Semua user</h4>
                    <div class="card-body">
                        <div class="row">
                            @foreach ($data as $data)
                            <div class="col col-md-3">
                                <div class="card mb-4" style="max-width: 540px;">
                                    <div class="row no-gutters">
                                        <div class="col-md-12 text-center">
                                        <img src="{{asset('assets/dist')}}/img/default.jpg" class="card-img" alt="...">
                                        <p class="card-text">{{$data->name}}</p>
                                            <p class="card-text">{{$data->email}}</p>
                                            <div class="card-body text-center">
                                                <a href="#" class="btn btn-primary">
                                                {{
                                                    ((DB::table('points')->where('user_id', $data->id)->where('keterangan', 'upvote')->count() * 10) -
                                                    DB::table('points')->where('user_id', $data->id)->where('keterangan', 'downvote')->count()) +
                                                    DB::table('points')->where('user_id',$data->id)->where('keterangan','jawaban tepat')->count() * 15
                                                }}
                                                Point reputasi
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
        </div>
    </section>
@endsection
