<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ODOR;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UKEController extends Controller
{
    public function dashboard(){
        return view('uke.dashboard');
    }

    public function odor(){

        $odorsQuery = Odor::join('users', 'o_d_o_r_s.id_user', '=', 'users.id')  // Join on id_user
                  ->orderBy('users.kanwil', 'asc')  // Order by user's kanwil
                  ->select('o_d_o_r_s.*');  // Select only Odor fields
                  
        if (request('keyword')) {
            $odorsQuery->where('o_d_o_r_s.jenis', 'LIKE', '%' . request('keyword') . '%');
        }
        $odors = $odorsQuery->paginate(30)->withQueryString();

        return view('uke.odor',['odors'=>$odors]);
    }

    public function show(Odor $odor){
        return view('uke.show',['odor'=>$odor]);
    }

    public function users(){
        $usersQuery = User::query();  // Perbaikan: Gunakan query builder
                
        if (request('keyword')) {
            $usersQuery->where('name', 'LIKE', '%' . request('keyword') . '%');  // Ganti 'users.name' ke 'name'
        }
        
        $users = $usersQuery->paginate(30)->withQueryString();
        return view('uke.users', ['users' => $users]);
    }

     public function createuser(){
        return view('uke.usercreate');
    }

    public function store(Request $request)
    {
        USER::create(
            [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'kanwil' => $request->kanwil,
            ]
            );

            return redirect('/uke/users');
    }
    


}