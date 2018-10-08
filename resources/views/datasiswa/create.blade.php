@extends('layouts.admin')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-primary">
			  <div class="panel-heading">Tambah Data Post 
			  	<div class="panel-title pull-right"><a href="{{ url()->previous() }}">Kembali</a>
			  	</div>
			  </div>
			  <div class="panel-body">
			  	<form action="{{ route('datasiswa.store') }}" method="post" enctype="multipart/form-data">
			  		{{ csrf_field() }}
			  		<div class="form-group {{ $errors->has('nis') ? ' has-error' : '' }}">
			  			<label class="control-label">NIS</label>	
			  			<input type="text" name="nis" class="form-control"  required>
			  			@if ($errors->has('nis'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nis') }}</strong>
                            </span>
                        @endif
					  </div>
					  <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                      <input type="text" class="form-control" name="name" required >

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                        </div>
					  <div class="form-group {{ $errors->has('tempat_lahir') ? ' has-error' : '' }}">
			  			<label class="control-label">Tempat Lahir</label>	
			  			<input type="text" name="tempat_lahir" class="form-control"  required>
			  			@if ($errors->has('tempat_lahir'))
                            <span class="help-block">
                                <strong>{{ $errors->first('tempat_lahir') }}</strong>
                            </span>
                        @endif
			  		</div>
					  <div class="form-group {{ $errors->has('tgl_lahir') ? 'has-error' : '' }}">
						<label class="control-label">Tanggal Lahir</label>
						<input type="date" class="form-control" name="tgl_lahir" required>
						@if ($errors->has('tgl_lahir'))
							<span class="help-block">
								<strong>{{ $errors->first ('tgl_lahir') }}</strong>
							</span>
						@endif
					</div>
					<div class="form-group {{ $errors->has('jenis_kelamin') ? 'has-error' : '' }}">
						<label class="control-label">jenis kelamin</label><br>
						<label class="radio-inline">
							<input type="radio" name="jenis_kelamin" id="inlineRadio1" value="laki-laki">laki-laki</label>
						<label class="radio-inline">
							<input type="radio" name="jenis_kelamin" id="inlineRadio2" value="perempuan">perempuan</label>
						@if ($errors->has('jenis_kelamin'))
							<span class="help-block">
								<strong>{{ $errors->first ('jenis_kelamin') }}</strong>
							</span>
						@endif
					</div>
					  <div class="form-group">
                                <label for="cc-payment" class="control-label mb-1">Foto</label>
                                <input name="gambar" type="file" required>
                            </div>
					    <div class="form-group {{ $errors->has('id_kelas') ? 'has-error' : '' }}">
								<label class="control-label">Kelas</label>
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
			  			<button type="submit" class="btn btn-primary">Tambah</button>
			  		</div>
			  	</form>
			  </div>
			</div>	
		</div>
	</div>
</div>
@endsection