@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Kategori Pengumuman</div>

                <div class="card-body">
                	<a href="{!! route('kategori_pengumuman.create') !!}" class="btn btn-primary">Tambah Data</a>
                   <table border="1">
		<tr>
			<td><center> ID </center></td>
			<td><center> Nama </center></td>
			<td><center> Users Id </center></td>
			<td><center>Create</center></td>
			<td><center>Update</center></td>
			<td><center>Aksi</center></td>
		</tr>

		@foreach($listKategoriPengumuman as $item)

		<tr>
			<td>{!! $item->id !!}</td>
			<td>{!! $item->nama !!}</td>
			<td>{!! $item->users_id !!}</td> 
			<td>{!! $item->created_at->format('d/m/Y H:i:s') !!}</td>
			<td>{!! $item->updated_at->format('d/m/Y H:i:s') !!}</td>
			<td>
			<a href="{!! route('kategori_pengumuman.show',[$item->id]) !!}" class="btn btn-primary">Lihat</a>

			<a href="{!! route('kategori_pengumuman.edit',[$item->id]) !!}" class="btn btn-success">Ubah</a>

		{!! Form::open(['route' => ['kategori_pengumuman.destroy', $item->id], 'method' => 'delete']) !!}

			{!! Form::submit('Hapus',['class'=>'btn btn-sm btn-danger']); !!}

			{!! Form::close() !!}
		</tr>

		@endforeach
	</table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

