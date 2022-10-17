<?php

namespace App\Http\Controllers;

use App\Models\Ongkir;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function profile(Request $request)
    {
        $cities = Ongkir::get();
        return view('customer.auth.profile', [
            'user' => $request->user(),
            'cities' => $cities
        ]);
    }

    public function updateProfile(Request $request)
    {
        $validated = $request->validate([
            'nama' => ['required', 'string'],
            'alamat' => ['required', 'string'],
            'telepon' => ['required', 'string'],
            'id_ongkir' => ['required', 'exists:ongkir,id_ongkir']
        ]);

        $user = $request->user();

        $old_password = $request->input('old_password');
        $new_password = $request->input('new_password');

        // If old_password equal current password and new password exist then update password as new password.
        if (isset($old_password)) {
            // Check if password equal current password
            if (Hash::check($old_password, $user->password)) {
                if (isset($new_password)) {
                    $validated['password'] = bcrypt($new_password);
                } else {
                    return back()->withErrors([
                        'Kolom Password Baru perlu diisi.'
                    ]);
                }
            } else {
                return back()->withErrors([
                    'Password tidak sesuai dengan password lama.'
                ]);
            }
        }


        $user->update($validated);

        return back()->with('success', 'Update Data Berhasil');
    }
}
