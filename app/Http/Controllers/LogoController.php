<?php
namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class LogoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $name = $request->file('image')->getClientOriginalName();
        $name = 'logo-' . time() . '.' . $request->file('image')->extension();
        $path = $request->file('image')->store('icons');

        $last_icon = Image::where('images_baja', 0)
            ->orderBy('id', 'desc')
            ->first();
        if ($last_icon) {
            $last_icon->images_baja = 1;
            $last_icon->save();
        }

        $save = new Image();
        $save->name = $name;
        $save->path = $path;
        $save->save();
        return redirect('icono')->with(
            'status',
            'Image Has been uploaded successfully with validation in laravel'
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }

    public function export()
    {
    }
}
