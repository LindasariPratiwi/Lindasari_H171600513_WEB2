<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KategoriPengumuman;

class KategoriPengumumanController extends Controller
{
	public function index(){
    //Eloquent => ORM (Object Relational Mapping)
    $listKategoriPengumuman=KategoriPengumuman::all(); //select*from kategori_pengumuman

    //blade
    return view('kategori_pengumuman.index', compact('listKategoriPengumuman'));
    //return view(view: 'kategori_pengumuman.index')->with('data',$listKategoriPengumuman);
	}

	public function show($id) {
	//Eloquent
	//$KategoriPengumuman=KategoriPengumuman::('id','$id')->first(); // select * from Kategori pengumuman where id=$id limit 1
	$KategoriPengumuman=KategoriPengumuman::find($id);

			if(empty($KategoriPengumuman)){
			return redirect(route('kategori_pengumuman.index'));
	}	

	return view ( 'kategori_pengumuman.show',compact( 'KategoriPengumuman'));
	}

	public function create(){
	return view( 'kategori_pengumuman.create');
	}

	public function store(Request $request){
	$input= $request->all();
	KategoriPengumuman::create($input);

	return redirect(route('kategori_pengumuman.index'));

	}
	public function edit($id){
	$KategoriPengumuman=KategoriPengumuman::find($id);

	

	if(empty($KategoriPengumuman)){
	return redirect(route('kategori_pengumuman.index'));
	}

		return view('kategori_pengumuman.edit', compact('KategoriPengumuman'));
	}
	public function update($id, Request $request){
		$KategoriPengumuman=KategoriPengumuman::find($id);
		$input= $request->all();

	if(empty($KategoriPengumuman)){
	return redirect(route('kategori_pengumuman.index'));
	}

	$KategoriPengumuman->update($input);

	return redirect(route ('kategori_pengumuman.index'));

	}
	public function destroy($id){
	$KategoriPengumuman=KategoriPengumuman::find($id);

	
	if(empty($KategoriPengumuman)){
	return redirect(route('kategori_pengumuman.index'));
	}
	$KategoriPengumuman->delete();
	return redirect(route('kategori_pengumuman.index'));
}

}