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

  public function validateAnswer(Request $request, $slug){
    $form = Form::where('slug', $slug)->first();
    $data = $form->data;
    $data = json_decode($form->data);
    $answerArray = array();
    $count_ans = 1;
    $ans = 'answer'.$count_ans;
    if($request->$ans!=null){
      foreach ($data as $section_key => $section) {
        if ($section->type == 'multiple') {
          $corrects = $section->answers->corrects;
          $i = 0;
          $cant_request = count($request->$ans);
          if($cant_request == $corrects){
            foreach ($section->answers->values as $values) {
              if ($values->is_answer && $cant_request!=0) {
                if($values->answer == $request->$ans[$i]){
                  $corrects--;
                  $cant_request--;
                }
                $i++;
              }
            }
          }
          if ($corrects == 0) {
            array_push($answerArray, 1);
          }else {
            array_push($answerArray, 0);
          }
        }else {
          foreach ($section->answers->values as $values) {
            if ($values->is_answer) {
              if($values->answer == $request->$ans){
                array_push($answerArray, 1);
              }else{
                array_push($answerArray, 0);
              }
            }
          }
        }
        $count_ans++;
        $ans = 'answer'.$count_ans;
      }
      $num_ans = $this->numCorrectAnswers($answerArray);
      if($num_ans == 0){
        \Session::flash('succes_message', 'Ha respondido correctamente.');
      }else{
        if($num_ans == 1){
          \Session::flash('wrong_message', 'Se ha equivocado en <strong>'.$num_ans.' pregunta.</strong>');
        }else {
          \Session::flash('wrong_message', 'Se ha equivocado en <strong>'.$num_ans.' preguntas.</strong>');
        }
      }
    }else{
      // \Session::flash('wrong_message', 'No ha respondido ninguna pregunta');
    }
    return redirect('/form');
  }

  public function numCorrectAnswers($answer_array){
    $count = count($answer_array);
    $count_correct = 0;
    for ($i=0; $i < $count; $i++) {
      if($answer_array[$i]==1){
        $count_correct++;
      }
    }
    if($count_correct == $count){
      // return true;
      return 0;
    }else {
      // return false;
      return $count-$count_correct;
    }
  }
}
