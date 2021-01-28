<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Band;

class AdminController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
      $this->middleware('auth');
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function showbands()
  {
      $bands = Band::all();
      return view('dashboard.show', compact('bands'));
  }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bands = Band::all();
        return view('bands.index', compact('bands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('bands.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function video()
    {
      $bands = Band::all();
      return view('dashboard.video', compact('bands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // Validate the inputs
      $request->validate([
          'name' => 'required',
            'describe' => 'required',
      ]);

      // ensure the request has a file before we attempt anything else.
      if ($request->hasFile('file')) {

          $request->validate([
              'image' => 'mimes:jpeg,bmp,png' // Only allow .jpg, .bmp and .png file types.
          ]);

          // Save the file locally in the storage/public/ folder under a new folder named /product
          $request->file->store('images', 'public');

          // Store the record, using the new file hashname which will be it's new filename identity.
          $bands = new Band([
              "name" => $request->get('name'),
              "describe" => $request->get('describe'),
              "url" => $request->get('url'),
              "file_path" => $request->file->hashName()
          ]);
          $bands->save(); // Finally, save the record.
      }

		return redirect()->route('bands.index')->with('success', 'Het band is toegevoegd');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $band = Band::find($id);
        return view ('bands.show', compact("band"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Band $band)
    {
         return view('bands.edit', compact('band'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Band $band)
    {
      $request->validate([
      'name'=>'required',
      'describe'=>'required',


        ]);
        $band->update($request->all());
        return redirect('/bands')
          ->with('success', 'Band is aangepast!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Band $band)
    {
          $band->delete();
          return redirect('/bands')
          ->with('success', 'band is verwijderd!');
    }
}
