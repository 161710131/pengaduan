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
			  	<form action="{{ route('jawaban.store') }}" method="post" >
			  		{{ csrf_field() }}
			 
					  <div class="form-group {{ $errors->has('jawaban') ? ' has-error' : '' }}">
			  			<label class="control-label">jawaban</label>	
			  			<input type="text" name="jawaban" class="form-control"  required>
			  			@if ($errors->has('jawaban'))
                            <span class="help-block">
                                <strong>{{ $errors->first('jawaban') }}</strong>
                            </span>
                        @endif
					  </div>
					  
					  <div class="form-group {{ $errors->has('id_pertanyaan') ? ' has-error' : '' }}">
			  			<label class="control-label">pertanyaan</label>	
			  			<select name="id_pertanyaan" class="form-control">
						  <option>---</option>
							@foreach($pertanyaan as $data)
			  				<option value="{{ $data->id }}">{{ $data->pertanyaan }}</option>
			  				@endforeach
			  			</select>
			  			@if ($errors->has('id_pertanyaan'))
                            <span class="help-block">
                                <strong>{{ $errors->first('id_pertanyaan') }}</strong>
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