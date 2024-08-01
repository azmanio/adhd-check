<?php

namespace App\Http\Controllers;

use App\Models\Riwayat;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProfileController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $user_id = $user->id;

        $riwayats = Riwayat::where('user_id', $user_id)->whereNotNull('kriteria_id')->get();

        return view('pages.home.profile', compact('user', 'riwayats', 'user_id'));
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'nama' => ['required', 'string'],
            'email' => ['required', 'email'],
            'password' => ['nullable', 'string', 'confirmed'],
            'no_hp' => ['required', 'numeric'],
            'image_path' => ['nullable', 'image'],
        ]);

        if (@$data['image_path']) {
            $ext = $request->file('image_path')->getClientOriginalExtension();
            // save to storage
            $data['image_path'] = $request->file('image_path')->storeAs('public/profile', time() . Str::slug($request->nama) . '.' . $ext);
            $data['image_path'] = str_replace('public/', '', $data['image_path']);
        }

        if ($data['password'] == "") {
            unset($data['password']);
        }

        $user = auth()->user();

        $user->update($data);

        return redirect()->route('profile.index');
    }
}
