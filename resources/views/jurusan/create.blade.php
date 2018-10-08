@extends('layouts.admin')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-primary">
			  <div class="panel-heading">Tambah  
			  	<div class="panel-title pull-right"><a href="{{ url()->previous() }}">Kembali</a>
			  	</div>
			  </div>
			  <div class="panel-body">
			  	<form action="{{ route('jurusan.store') }}" method="post" >
			  		{{ csrf_field() }}
			  		<div class="form-group {{ $errors->has('nama_jurussan') ? ' has-error' : '' }}">
			  			<label class="control-label">Nama jurusan</label>	
			  			<input type="text" name="nama_jurussan" class="form-control"  required>
			  			@if ($errors->has('nama_jurussan'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nama_jurussan') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group">
			  			<button type="submit" class="btn btn-primary">Tambah</button>
			  		</div>
			  	</form>
			  </div>
			  </div>	
		</div>
	</div>
</div>
@endsection