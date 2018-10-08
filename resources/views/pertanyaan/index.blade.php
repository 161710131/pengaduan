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
            <h1 class="m-0 text-dark">Data Pertanyaan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('pertanyaan.create') }}">Tambah</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

			  <div class="panel-body">
			  	<div class="table-responsive">
				  <table class="table table-bordered">
				  	<thead>
			  		<tr>
			  		  <th>No</th>
						<th>Siswa</th>
						<th>Kelas</th>
						<th>Jurusan</th>
						<th>Pertanyaan</th>
						<th>tanggal</th>
						
						
					  <th colspan="2">Action</th>
			  		</tr>
				  	</thead>
				  	<tbody>
				  		<?php $nomor = 1; ?>
				  		@php $no = 1; @endphp
				  		@foreach($pertanyaan as $data)
				  	  <tr>
							<td>{{ $no++ }}</td>
							<td>{{ $data->datasiswa->user->name }}</td>
				    	<td>{{ $data->datasiswa->kelas->nama_kelas }}</td>					
							<td>{{ $data->datasiswa->jurusan->nama_jurussan }}</td>
							<td>{{ $data->pertanyaan }}</td>
							<td>{{ $data->created_at }}</td>

<td>
	<a class="btn btn-warning" href="{{ route('pertanyaan.edit',$data->id) }}">Edit</a>
</td>
<td>
	<form method="post" action="{{ route('pertanyaan.destroy',$data->id) }}">
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