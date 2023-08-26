<?php

namespace App\Http\Controllers;

use App\Models\Postees;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;


class PosteesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $postes = Postees::paginate(1);
        $postes = Postees::orderBy('id', 'desc')->paginate(4);

            // dd($postes);
        return view('postes.poste',['data'=>$postes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
        // $a =  Postees::find(5)->user->name;
        // echo($a);
        
        $this->validate(
            $request,
                ["body"=>"required"]
        );
        $poste = new Postees();
        $poste->body = $request->body;
        $poste->user_id = Auth::id();
        $poste->save();
        return Redirect('postes');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Postees  $postees
     * @return \Illuminate\Http\Response
     */
    public function show(Postees $postees)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Postees  $postees
     * @return \Illuminate\Http\Response
     */
    public function edit(Postees $postees)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Postees  $postees
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Postees $postees)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Postees  $postees
     * @return \Illuminate\Http\Response
     */
    public function destroy( $postees)
    {
         
       
        $poste = Postees::find($postees);
        $poste->delete();
        
        
        return Redirect('postes');


    
    }
}
