<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ODOR;
use Illuminate\Support\Facades\Auth;

class KanwilController extends Controller
{
    public function dashboard(){
        return view('kanwil.dashboard');
    }

    public function odor(){
        $userKanwil = Auth::user()->kanwil ?? null;  // Get current user's kanwil, with null check
        if (!$userKanwil) {
            // Handle case where user has no kanwil (e.g., redirect or return empty)
            return view('kanwil.odor', ['odors' => collect()]);  // Empty collection
        }
        // Build the query first
        $odorsQuery = Odor::whereHas('user', function ($query) use ($userKanwil) {
            $query->where('kanwil', $userKanwil);
        })->orderBy('created_at', 'desc'); 
        
        if (request('keyword')) {
            $odorsQuery->where('jenis', 'LIKE', '%' . request('keyword') . '%');  // Assuming 'jenis' is the column; use 'o_d_o_r_s.jenis' if table is aliased differently
        }
        $odors = $odorsQuery->paginate(30)->withQueryString();

        return view('kanwil.odor', ['odors' => $odors]);
    }

    public function create(){
        return view('kanwil.create');
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

            return redirect('/kanwil/odor');
    }

    public function destroy(ODOR $odor)
    {
        $odor->delete();
        return redirect('/kanwil/odor');
    }

    public function edit(ODOR $odor)
    {
       return view('kanwil.edit',['odor'=>$odor]);
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

            return redirect('/kanwil/odor');
    }

    public function show(Odor $odor){
        return view('upt.show',['odor'=>$odor]);
    }

}
