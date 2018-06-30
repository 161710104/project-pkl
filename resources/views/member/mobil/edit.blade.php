@extends('member.master')
@section('content')
<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Data Table</h1>
          <p>Table to display analytical data effectively</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Tables</li>
          <li class="breadcrumb-item active"><a href="#">Data Table</a></li>
        </ul>
      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <form class="form-horizontal form-label-left" action="{{ route('mobils.update',$c->id) }}" method="post" enctype="multipart/form-data">
                <input name="_method" type="hidden" value="PATCH">
            
              {{ csrf_field() }}

              <div class="form-group {{ $errors->has('gambar') ? ' has-error' : '' }}">
                          <label class="control-label col-md-3 col-sm-3 col-xs-3">Gambar</label>
                          <div class="col-md-9 pr-1">
                          <input type="file" name="gambar" class="form-control" required="" style="background-color: #0000">
                            @if ($errors->has('gambar'))
                              <span class="help-block">
                                <strong>{{ $errors->first('gambar') }}</strong>
                              </span>
                          @endif
                          </div>
                        </div>


              <div class="form-group {{ $errors->has('nama') ? ' has-error' : '' }}">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Nama Mobil</label>
                        <div class="col-md-9 pr-1">
                          <input type="text" name="nama" class="form-control" value="{{$c->nama}}" required>
                          @if ($errors->has('nama'))
                            <span class="help-block">
                              <strong>{{ $errors->first('nama') }}</strong>
                            </span>
                        @endif
                        </div>
                      </div>


                      <div class="form-group {{ $errors->has('merk_id') ? ' has-error' : '' }}">
                      <label class="control-label col-md-3 col-sm-3 col-xs-3">Daftar Merk</label>
                      <div class="col-md-9 col-sm-9 col-xs-9">
                        <select name="merk_id" class="form-control">
                          @foreach($a as $data)
                        <option value="{{ $data->id }}" {{ $selectedMK == $data->id ? 'selected="selected"' : '' }} >{{ $data->nama }}</option>   @endforeach
                        </select>
                          @if ($errors->has('merk_id'))
                            <span class="help-block">
                                <strong>{{ $errors->first('merk_id') }}</strong>
                            </span>
                        @endif
                    </div>
                  </div>

                  <div class="form-group {{ $errors->has('model') ? ' has-error' : '' }}">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Nama model</label>
                        <div class="col-md-9 pr-1">
                          <input type="text" name="model" class="form-control" value="{{$c->model}}"  required>
                          @if ($errors->has('model'))
                            <span class="help-block">
                              <strong>{{ $errors->first('model') }}</strong>
                            </span>
                        @endif
                        </div>
                      </div>

                   <div class="form-group">
                        <div class="col-md-9 col-md-offset-3">
                          <button type="reset" class="btn btn-primary">Cancel</button>
                          <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
</div>
</div>
</main>

@endsection