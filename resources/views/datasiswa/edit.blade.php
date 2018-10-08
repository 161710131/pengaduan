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
			  	<form action="{{ route('datasiswa.update',$datasiswa->id) }}" method="post" >
			  		<input name="_method" type="hidden" value="PATCH">
        			{{ csrf_field() }}
			  		<div class="form-group {{ $errors->has('nis') ? ' has-error' : '' }}">
			  			<label class="control-label">NIS</label>	
			  			<input type="text" name="nis" class="form-control" value="{{ $datasiswa->nis }}"  required>
			  			@if ($errors->has('nis'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nis') }}</strong>
                            </span>
                        @endif
			  		</div>
						<div class="form-group {{ $errors->has('tempat_lahir') ? ' has-error' : '' }}">
			  			<label class="control-label">Tempat Lahir</label>	
			  			<input type="text" name="tempat_lahir" class="form-control" value="{{ $datasiswa->tempat_lahir }}"  required>
			  			@if ($errors->has('tempat_lahir'))
                            <span class="help-block">
                                <strong>{{ $errors->first('tempat_lahir') }}</strong>
                            </span>
                        @endif
			  		</div>
						<div class="form-group {{ $errors->has('tgl_lahir') ? ' has-error' : '' }}">
			  			<label class="control-label">Tanggal Lahir</label>	
			  			<input type="text" name="tgl_lahir" class="form-control" value="{{ $datasiswa->tgl_lahir }}"  required>
			  			@if ($errors->has('tgl_lahir'))
                            <span class="help-block">
                                <strong>{{ $errors->first('tgl_lahir') }}</strong>
                            </span>
                        @endif
			  		</div>
						<div class="form-group {{ $errors->has('jenis_kelamin') ? 'has-error' : '' }}">
						<label class="control-label">Jenis Kelamin</label><br>
						<label class="radio-inline">
							<input type="radio" class="flat" name="jenis_kelamin" value="laki-laki" 
							{{ $datasiswa->jenis_kelamin == 'laki-laki' ? 'checked':''}}>laki-laki</label>
						<label class="radio-inline">
							<input type="radio" class="flat" name="jenis_kelamin" value="perempuan" 
							{{ $datasiswa->jenis_kelamin == 'perempuan' ? 'checked':''}}>perempuan</label>
						@if ($errors->has('jenis_kelamin'))
							<span class="help-block">
								<strong>{{ $errors->first ('jenis_kelamin') }}</strong>
							</span>
						@endif
					</div>
					<div class="form-group {{ $errors->has('agama') ? 'has-error' : '' }}">
						<label class="control-label">Agama</label><br>
						<label class="radio-inline">
							<input type="radio" class="flat" name="agama" value="islam" 
							{{ $datasiswa->agama == 'islam' ? 'checked':''}}>islam</label>
						<label class="radio-inline">
							<input type="radio" class="flat" name="agama" value="Kristen" 
							{{ $datasiswa->agama == 'Kristen' ? 'checked':''}}>Kristen</label>
						<label class="radio-inline">
							<input type="radio" class="flat" name="agama" value="Budha" 
							{{ $datasiswa->agama == 'Budha' ? 'checked':''}}>Budha</label>
						<label class="radio-inline">
							<input type="radio" class="flat" name="agama" value="Hindu" 
							{{ $datasiswa->agama == 'Hindu' ? 'checked':''}}>Hindu</label>
						@if ($errors->has('agama'))
							<span class="help-block">
								<strong>{{ $errors->first ('agama') }}</strong>
							</span>
						@endif
					</div>
					<div class="form-group {{ $errors->has('alamat') ? ' has-error' : '' }}">
			  			<label class="control-label">Alamat</label>	
			  			<input type="text" name="alamat" class="form-control" value="{{ $datasiswa->alamat }}"  required>
			  			@if ($errors->has('alamat'))
                            <span class="help-block">
                                <strong>{{ $errors->first('alamat') }}</strong>
                            </span>
                        @endif
			  		</div>
						<div class="form-group {{ $errors->has('no_hp') ? ' has-error' : '' }}">
			  			<label class="control-label">Nomor Hp</label>	
			  			<input type="text" name="no_hp" class="form-control" value="{{ $datasiswa->no_hp }}"  required>
			  			@if ($errors->has('no_hp'))
                            <span class="help-block">
                                <strong>{{ $errors->first('no_hp') }}</strong>
                            </span>
                        @endif
			  		</div>
						<div class="form-group {{ $errors->has('gambar') ? ' has-error' : '' }}">
			  			<label class="control-label">gambar</label>	
			  			<input type="text" name="gambar" class="form-control" value="{{ $datasiswa->gambar }}"  required>
			  			@if ($errors->has('gambar'))
                            <span class="help-block">
                                <strong>{{ $errors->first('gambar') }}</strong>
                            </span>
                        @endif
						<div class="form-group {{ $errors->has('id_kelas') ? 'has-error' : '' }}">
								<label class="control-label">kelas</label>
								<select class="form-control" name="id_kelas" required>
									<option>---</option>
										@foreach($kelas as $data)
										<option value="{{ $data->id }}">
											{{ $data->nama_kelas }}
										</option>
										@endforeach
									</option>
								</select>
								@if ($errors->has('id_kelas'))
									<span class="help-block">
										<strong>{{ $errors->first('id_kelas') }}</strong>
									</span>
								@endif
							</div>
							<div class="form-group {{ $errors->has('id_jurusan') ? 'has-error' : '' }}">
								<label class="control-label">jurusan</label>
								<select class="form-control" name="id_jurusan" required>
									<option>---</option>
										@foreach($jurusan as $data)
										<option value="{{ $data->id }}">
											{{ $data->nama_jurussan }}
										</option>
										@endforeach
									</option>
								</select>
								@if ($errors->has('id_jurusan'))
									<span class="help-block">
										<strong>{{ $errors->first('id_jurusan') }}</strong>
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