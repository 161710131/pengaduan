@extends('layouts.admin')
@section('content')

<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-primary">
			<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-primary">
			<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Edit Data Kelas</h1>
          </div><!-- /.col -->
		  
	    </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
			  <div class="panel-body">
			  	<form action="{{ route('kelas.update',$a->id) }}" method="post" >
			  		<input name="_method" type="hidden" value="PATCH">
        			{{ csrf_field() }}
			  		<div class="form-group {{ $errors->has('nama_kelas') ? ' has-error' : '' }}">
			  			<label class="control-label">Nama_kelas</label>	
			  			<input type="text" name="nama_kelas" class="form-control" value="{{ $a->nama_kelas }}"  required>
			  			@if ($errors->has('nama_kelas'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nama_kelas') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group">
			  			<button type="submit" class="btn btn-primary">Edit</button>
			  		</div>
			  	</form>
			  </div>
			</div>	
		</div>
	</div>
</div>
@endsection