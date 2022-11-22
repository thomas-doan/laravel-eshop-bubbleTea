<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\NumHistoryCommande;

class ProfileController extends Controller
{
    public function index()
    {
        $idUser = auth()->user()->id;
        $commandesGlobaleUser = numHistoryCommande::where('user_id', $idUser)->get();
        return view('profile', ['commandesGlobaleUser' => $commandesGlobaleUser]);
    }

    public function editProfile(Request $request, $id)
    {
        // check the input from form if it exists in the database and can be null if the user put nothing

        $request->validate([
            'name' => 'required|string|unique:users,name,' . $id,
            'email' => 'required|email|unique:users,email,' . $id,
            'telephone' => 'nullable|string|regex:/^([0-9\s\-\+\(\)]*)$/|min:10,telephone' . $id,
            'adresse' => 'nullable|string|min:2,adresse',
            'ville' => 'nullable|string|min:2,ville',
            'code_postal' => 'nullable|integer|regex:/^([0-9\s\-\+\(\)]*)$/|min:2,code_postal',
            'pays' => 'nullable|string|min:2,pays',
        ]);



        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->telephone = $request->input('telephone');
        $user->adresse = $request->input('adresse');
        $user->ville = $request->input('ville');
        $user->code_postal = $request->input('code_postal');
        $user->pays =  $request->input('pays');
        $user->save();

        return redirect()->route('profile')->with('success', 'Profile updated successfully');
    }

    public function editPassword(Request $request)
    {
        // update the password of the user
        $user = User::find(auth()->user()->id);

        // check if the password and the password confirmation are the same
        if ($request->input('password') == $request->input('password_confirmation')) {
            $user->password = bcrypt($request->input('password'));
            $user->save();
            return redirect()->route('profile')->with('Passwordsuccess', 'Password updated successfully');
        } else {
            return redirect()->route('profile')->with('Passworderror', 'Password and password confirmation are not the same');
        }
    }

    public function deleteAccount(Request $request)
    {
        $user = User::find(auth()->user()->id);

        // check if the password and the current password are the same
        if (password_verify($request->input('password'), $user->password)) {
            $user->delete();
            return redirect()->route('login')->with('Deletesuccess', 'Account deleted successfully');
        } else {
            return redirect()->route('profile')->with('DeleteFail', 'Password is not correct');
        }
    }
}
