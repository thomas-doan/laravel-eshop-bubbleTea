<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminUserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('layoutAdmin.AdminUser', [
            'users' => $users
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|unique:users,name,' . $id,
            'email' => 'required|email|unique:users,email,' . $id,
            'telephone' => 'nullable|string|regex:/^([0-9\s\-\+\(\)]*)$/|min:10,telephone' . $id,
            'is_admin' => 'required|integer|in:0,1',
            'adresse' => 'nullable|string|min:2,adresse',
            'ville' => 'nullable|string|min:2,ville',
            'code_postal' => 'nullable|integer|regex:/^([0-9\s\-\+\(\)]*)$/|min:2,code_postal',
            'pays' => 'nullable|string|min:2,pays',
        ]);

        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->telephone = $request->input('telephone');
        $user->is_admin = $request->input('is_admin');
        $user->adresse = $request->input('adresse');
        $user->ville = $request->input('ville');
        $user->code_postal = $request->input('code_postal');
        $user->pays =  $request->input('pays');
        $user->save();

        return redirect()->route('adminUser')->with('success', 'User updated successfully');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->route('adminUser')->with('success', 'User deleted successfully');
    }
}
