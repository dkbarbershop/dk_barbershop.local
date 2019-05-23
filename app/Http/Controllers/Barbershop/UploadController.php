<?php

namespace App\Http\Controllers\Barbershop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UploadController extends Controller
{
	public function upload(Request $request)
	{
		dd($request->file());
	    foreach ($request->file() as $file) {
	        foreach ($file as $f) {
	            $f->move(storage_path('images'), time().'_'.$f->getClientOriginalName());
	        }
	    }
	    return $request->file();
	}

	public function upload_files($up_file)
	{
/*	    foreach ($up_file as $file) {
	        foreach ($file as $f) {
	            $f->move(storage_path('images'), time().'_'.$f->getClientOriginalName());
	        }
	    }*/
	    return "Успех";
	   /* echo 'qqq';
*/	}
}
