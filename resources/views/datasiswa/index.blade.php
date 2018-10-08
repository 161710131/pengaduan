@extends('layouts.admin')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-primary">
			<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Data siswa</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="{{ route('datasiswa.create') }}">Tambah</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

			  <div class="panel-body">
			  	<div class="table-responsive">
				  <table class="table">
				  	<thead>
			  		<tr>
			  		  <th>No</th>
						<th>NIS</th>
						<th>Nama</th>
						<th>Email</th>
						<th>Tempat Tanggal Lahir</th>
						<th>Jenis Kelamin</th>
						<th>Gambar</th>
						<th>Kelas</th>
						<th>Jurusan</th>
					  <th colspan="2">Action</th>
			  		</tr>
				  	</thead>
				  	<tbody>
				  		<?php $nomor = 1; ?>
				  		@php $no = 1; @endphp
				  		@foreach($datasiswa as $data)
				  	  <tr>
				    	<td>{{ $no++ }}</td>
							<td>{{ $data->nis }}</td>
							<td>{{ $data->user->name }}</td>
							<td>{{ $data->user->email }}</td>
							<td>{{ $data->tempat_lahir }},{{ $data->tgl_lahir }}</td>
							<td>{{ $data->jenis_kelamin }}</td>
							<td><img src="{{ asset('/backend/assets/images/fotosiswa/'.$data->gambar) }}" style="max-height:125px;max-width:125px;margin-top:7px"></td>
							<td>{{ $data->kelas->nama_kelas }}</td>
							<td>{{ $data->jurusan->nama_jurussan }}</td>
<td>
	<a class="btn btn-warning" href="{{ route('datasiswa.edit',$data->id) }}">Edit</a>
</td>
<td>
	<form method="post" action="{{ route('datasiswa.destroy',$data->id) }}">
		<input name="_token" type="hidden" value="{{ csrf_token() }}">
		<input type="hidden" name="_method" value="DELETE">

		<button type="submit" class="btn btn-danger">Delete</button>
	</form>
</td>
				      </tr>
				      @endforeach	
				  	</tbody>
				  </table>
				</div>
			  </div>
			</div>	
		</div>
	</div>
</div>
@endsection