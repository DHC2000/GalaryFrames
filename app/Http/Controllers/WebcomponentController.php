<?php

namespace App\Http\Controllers;

use App\Models\webcomponent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use PDF;

class WebcomponentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //ORM-------------------------------------------------------------------
      //$tablescod['webcomponents'] = webcomponent::paginate(5);
      //return view('list',$tablescod);*/

      //QueryBuilder-------------------------------------------------------------------
    //  $components = DB::select('select * from webcomponents');
      //$components =DB::table('webcomponents')->get();
        //return view('list', ['components' => $components]);
        //-------------------------------------------------------------------

        return view('solid.landing');
    //dd($components);
    //return response()->json($components);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          //ORM-------------------------------------------------------------------
        //$codes = request()->except('_token'); //falta exeptuar metodo
        //webcomponent::insert($codes);
      //-------------------------------------------------------------------
        //return response()->json($codes); //SOLO DE PUREBA EL return es el final

        //QueryBuilder-------------------------------------------------------------------
        $titulo=$request->input('titulo');
        $cod_html=$request->input('cod_html');
        $cod_css=$request->input('cod_css');
        $cod_js=$request->input('cod_js');
        $user=$request->input('user_id');
        webcomponent::insert(['titulo'=>$titulo,'cod_html'=>$cod_html,'cod_css'=>$cod_css,'cod_js'=>$cod_js,'user_id'=>$user]);

        return redirect('webcomponent')->with('message','Componente creado con exito !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\webcomponent  $webcomponent
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
      //ORM
      //$components = webcomponent::all();
      //return view('list', ['components' => $components]);

      //QueryBuilder-------------------------------------------------------------------
    //  $components = DB::select('select * from webcomponents');
      $components =DB::table('webcomponents')->get();
        return view('list', ['components' => $components]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\webcomponent  $webcomponent
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //ORM-------------------------------------------------------------------
        /*$webcomponent= webcomponent::findOrFail($id);
        return view('edit',compact('webcomponent'));*/
        //-------------------------------------------------------------------

        //QueryBuilder-------------------------------------------------------------------
        $webcomponent= DB::table('webcomponents')->select('id','titulo','cod_html','cod_css','cod_js','user_id')->where('id',$id)->get();
          return view('edit',['webcomponent'=>$webcomponent]);
          //-------------------------------------------------------------------
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\webcomponent  $webcomponent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {

      //ORM-------------------------------------------------------------------
        /*$codes = request()->except(['_token','_method']);
        webcomponent::where('id','=',$id)->update($codes);*/

          //QueryBuilder-------------------------------------------------------------------
        $titulo=$request->input('titulo');
        $cod_html=$request->input('cod_html');
        $cod_css=$request->input('cod_css');
        $cod_js=$request->input('cod_js');
        $user=$request->input('user_id');
       DB::table('webcomponents')->where('id',$id)->update(['titulo'=>$titulo,'cod_html'=>$cod_html,'cod_css'=>$cod_css,'cod_js'=>$cod_js,'user_id'=>$user]);
        //DB::update('webcomponents set titulo=?,cod_html=?,cod_css=?,cod_js=?,user_id=? where id=?',[$titulo,$cod_html,$cod_css,$cod_js,$user,$id]);

        $webcomponent= webcomponent::findOrFail($id);
        return view('edit',compact('webcomponent'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\webcomponent  $webcomponent
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      //ORM-------------------------------------------------------------------
      //webcomponent::destroy($id);

      //QueryBuilder-------------------------------------------------------------------
      DB::table('webcomponents')->where('id',$id)->delete();
      return redirect('webcomponent')->with('message','Componente eliminado');

    }

    public function printPDF(){
      $components = webcomponent::all();
      $pdf = PDF::loadView('pdf.component_pdf', ['components' => $components])->setOptions(['defaultFont' => 'sans-serif']);
      return $pdf->stream('WebComponentsMX-'.date('Ymd').'.pdf');
    }
}
