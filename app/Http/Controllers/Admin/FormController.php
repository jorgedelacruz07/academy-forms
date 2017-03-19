<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Form;
use App\Area;

class FormController extends Controller
{
  /**
  * Create a new controller instance.
  *
  * @return void
  */
  public function __construct()
  {
    // $this->middleware('auth');
  }

  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    $forms = Form::all();
    return view('admin.form.index', ['forms' => $forms]);
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    $areas = Area::all();
    return view('admin.form.create', ['areas' => $areas]);
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request)
  {
    $form = new Form;
    $form->name = $request->name;
    $form->slug = $request->slug;
    $form->description = $request->description;
    $form->data = $request->data;
    $form->area_id = $request->area_id;
    $form->save();
    return redirect('/admin/form');
  }

  /**
  * Display the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function show($slug)
  {
    $form = Form::where('slug', $slug)->first();
    $areas = Area::all();
    return view('admin.form.show', ['form' => $form, 'areas' => $areas, 'slug' => $slug]);
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function edit($id)
  {
    $form = Form::find($id);
    $areas = Area::all();
    return view('admin.form.edit', ['form' => $form, 'areas' => $areas]);
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
    $form = Form::find($id);
    $form->name = $request->name;
    $form->slug = $request->slug;
    $form->description = $request->description;
    $form->data = $request->data;
    $form->area_id = $request->area_id;
    $form->save();
    return redirect('/admin/form');
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function destroy($id)
  {
    Form::destroy($id);
    return redirect('/admin/form');
  }

  public function validateAnswer($slug){
    $form = Form::where('slug', $slug)->first();
    
    return redirect('/form');
  }
}
