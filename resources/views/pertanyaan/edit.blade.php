@extends('template.master')

@section('content')
<div class="container mt-3">
    <div class="card card-success">
        <div class="card-header">
            <h3 class="card-title">Buat Pertanyaan</h3>
        </div>

        <form role="form" method="POST" action="/pertanyaan/{{$post->id}}">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Judul Pertanyaan</label>
                    <input type="text" class="form-control" value="{{old('judul', $post->judul)}}" name="judul" id="exampleInputEmail1" placeholder="Judul pertanyaan">
                    @error('judul')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="isi">Pertanyaan</label>
                    <textarea name="isi" id="isi" cols="30" rows="10" class="form-control" placeholder="Pertanyaan...">{{old('isi',$post->isi)}}</textarea>
                    @error('isi')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>

                {{-- <div class="form-group">
                  <label>Multiple</label>
                  <select class="select2bs4 select2-hidden-accessible" multiple="" data-placeholder="Select a State" style="width: 100%;" data-select2-id="23" tabindex="-1" aria-hidden="true">
                    <option data-select2-id="78">Alabama</option>
                    <option data-select2-id="79">Alaska</option>
                    <option data-select2-id="80">California</option>
                    <option data-select2-id="81">Delaware</option>
                    <option data-select2-id="82">Tennessee</option>
                    <option data-select2-id="83">Texas</option>
                    <option data-select2-id="84">Washington</option>
                  </select><span class="select2 select2-container select2-container--bootstrap4 select2-container--below" dir="ltr" data-select2-id="24" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--multiple" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="-1" aria-disabled="false"><ul class="select2-selection__rendered"><li class="select2-search select2-search--inline"><input class="select2-search__field" type="search" tabindex="0" autocomplete="off" autocorrect="off" autocapitalize="none" spellcheck="false" role="searchbox" aria-autocomplete="list" placeholder="Select a State" style="width: 458px;"></li></ul></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                </div> --}}

            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="/pertanyaan/{{$post->id}}" class="btn btn-warning">Back</a>
            </div>
        </form>
    </div>
</div>
@endsection
