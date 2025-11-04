<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ODOR;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;



class UPTController extends Controller
{
    public function dashboard(){
        return view('upt.dashboard');
    }
    
    public function odor(){
       $odorsQuery = Odor::where('id_user', Auth::id()) // Filter by current user's ID
       ->orderBy('created_at', 'desc');
       
       if (request('keyword')) {
        $odorsQuery->where('jenis', 'LIKE', '%' . request('keyword') . '%');  // Assuming 'jenis' is the column; adjust if needed
        }
        $odors = $odorsQuery->paginate(30)->withQueryString();  // Paginate after applying filters

        return view('upt.odor',['odors'=>$odors]);
    }

    public function create(){
        return view('upt.create');
    }

    public function store(Request $request)
    {
        ODOR::create(
            [
                'jenis' => $request->jenis,
                'stakeholder' => $request->stakeholder,
                'id_user' => Auth::user()->id,
                'room' => $request->room,
                'HP' => $request->HP,
                'SAJAM' => $request->SAJAM,
                'BARANGELEKTRONIK' => $request->BARANGELEKTRONIK,
                'NARKOBA' => $request->NARKOBA,
                'BA' => $request->BA,
                'dokumentasi' => $request->dok
            ]
            );

            return redirect('/upt/odor');
    }

    public function destroy(ODOR $odor)
    {
        $odor->delete();
        return redirect('/upt/odor');
    }

    public function edit(ODOR $odor)
    {
       return view('upt.edit',['odor'=>$odor]);
    }

    public function update(Request $request, Odor $odor)
    {
        $odor->update(
            [
                'jenis' => $request->jenis,
                'stakeholder' => $request->stakeholder,
                'room' => $request->room,
                'HP' => $request->HP,
                'SAJAM' => $request->SAJAM,
                'BARANGELEKTRONIK' => $request->BARANGELEKTRONIK,
                'NARKOBA' => $request->NARKOBA,
                'BA' => $request->BA,
                'dokumentasi' => $request->dok
            ]
            );

            return redirect('/upt/odor');
    }


    public function show(Odor $odor){
        return view('upt.show',['odor'=>$odor]);
    }
}
