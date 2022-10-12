<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function profile(Request $request)
    {
        return view('customer.auth.profile', [
            'user' => $request->user()
        ]);
    }

    public function updateProfile(Request $request)
    {
        $validated = $request->validate([
            'nama' => ['required', 'string'],
            'alamat' => ['required', 'string'],
            'telepon' => ['required', 'string'],
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
