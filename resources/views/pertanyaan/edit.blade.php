@extends('layouts.admin')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-primary">
			  <div class="panel-heading">Edit Data Post 
			  	<div class="panel-title pull-right"><a href="{{ url()->previous() }}">Kembali</a>
			  	</div>
			  </div>
			  <div class="form-group {{ $errors->has('id_siswa') ? ' has-error' : '' }}">
			  			<label class="control-label">datasiswa</label>	
			  			<select name="id_siswa" class="form-control" value="{{ $pertanyaan->id_siswa}}">
						  <option>---</option>
							@foreach($datasiswa as $data)
			  				<option value="{{ $data->id }}">{{ $data->nama }}</option>
			  				@endforeach
			  			</select>
			  			@if ($errors->has('id_siswa'))
                            <span class="help-block">
                                <strong>{{ $errors->first('id_siswa') }}</strong>
                            </span>
                        @endif
			  		</div>
			  <div class="panel-body">
			  	<form action="{{ route('pertanyaan.store') }}" method="post" >
			  		{{ csrf_field() }}
			  		<div class="form-group {{ $errors->has('pertanyaan') ? ' has-error' : '' }}">
			  			<label class="control-label">pertanyaan</label>	
			  			<input type="text" name="pertanyaan" class="form-control" value="{{ $pertanyaan->pertanyaan}}"  required>
			  			@if ($errors->has('pertanyaan'))
                            <span class="help-block">
                                <strong>{{ $errors->first('pertanyaan') }}</strong>
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