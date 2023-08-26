<?php

namespace App\Http\Controllers;

use App\Models\likes;
use App\Models\Postees;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LikesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Postees $poste)
    {
        //  return response(null, 404);
        // return abort(404, 'Something not found');

        $CHECK = $this->check(Auth::id(), $request->idPoste);
        if(!$CHECK){
            $likes = new likes();
            $likes->postees_id = $request->idPoste;
            $likes->user_id = Auth::id();
            $likes->save();
        }
        
        return Redirect('postes');


    }
    public function check($id_users, $id_postess)
    {
        $req = "select * from likes where user_id=$id_users and  postees_id=$id_postess ";
        $a = DB::select($req);
        // dd($a);
        if ($a != null) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\likes  $likes
     * @return \Illuminate\Http\Response
     */
    public function show(likes $likes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\likes  $likes
     * @return \Illuminate\Http\Response
     */
    public function edit(likes $likes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\likes  $likes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, likes $likes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\likes  $likes
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_postess,Request $request)

    {
        $id_users = Auth::id();
        DB::table('likes')->where('user_id', $id_users)->where('postees_id', $id_postess)->delete();
        // $request->user()->likes()->where('postees_id', $id_postess)->delete();

        
         return Redirect('postes');
 
        
    }
}