<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Data_tes;
class AdminDataTes extends Controller
{
    //
	public function dashboard(){
		$data_tes = Data_tes::get();
		return view('users/admin/dashboard/index', compact('data_tes'));
	}

	public function add(){
		return view('users/admin/dashboard/add');
	}

	public function change($id){
		$data_tes = Data_tes::where('id', $id)->first();
		return view('users/admin/dashboard/change', compact('data_tes'));
	}

	public function store(Request $request){
		$db = new Data_tes;
		$db->nama = $request->nama;
		$db->save();
		$notification = array(
			'kode-notif' => 'berhasil',
			'message' => 'Data berhasil ditambah',
			'color' => "#28a745",
			'icon' => "fas fa-check-circle",
			'header' => "Berhasil"
		); 
		return redirect('/admin/dashboard')->with($notification); 
	}

	public function update(Request $request){
		$db = Data_tes::where('id', $request->id)->first();
		$db->nama = $request->nama;
		$db->save();
		$notification = array(
			'kode-notif' => 'berhasil',
			'message' => 'Data berhasil diubah',
			'color' => "#28a745",
			'icon' => "fas fa-check-circle",
			'header' => "Berhasil"
		); 
		return redirect('/admin/dashboard')->with($notification); 
	}

	public function delete(Request $request){
		Data_tes::where('id', $request->id)->delete();
		$notification = array(
			'kode-notif' => 'berhasil',
			'message' => 'Data berhasil dihapus',
			'color' => "#28a745",
			'icon' => "fas fa-check-circle",
			'header' => "Berhasil"
		); 
		return redirect('/admin/dashboard')->with($notification); 
	}

}
