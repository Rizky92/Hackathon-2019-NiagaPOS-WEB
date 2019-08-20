<?php
/**
 * Created by PhpStorm.
 * User: rifanrifan
 * Date: 02/02/19
 * Time: 16.48
 */

namespace App\Http\Controllers;


use App\Models\Berita;

class FrontWebController
{
    public function show_berita() {
        $beritas = Berita::orderBy('id','asc')->paginate(5);
        return view ('home',compact('beritas'));
    }
}