<?php

namespace App\Http\Controllers;

use App\Models\DataMahasiswa;
use App\Models\Skripsi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ManageUserController extends Controller
{
    public function index()
    {
        return view('main.data-mahasiswa', [
            'data' => User::orderBy('level')->get(),
        ]);
    }

    public function create()
    {
        return view('main.form-tambah-user');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users|email:dns',
            'user_type' => 'required',
            'id' => 'required|unique:users',
            'password' => 'required|min:6|confirmed'
        ]);

        User::create([
            'username' => $request->id,
            'nama' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'level' => $request->user_type,
        ]);
        return back()->with('success', '<strong>Berhasil!</strong> User baru telah ditambahkan.');
    }

    public function edit(User $user)
    {
        return view('main.form-edit-user', [
            'user' => $user,
        ]);
    }

    public function update(Request $request, User $user)
    {
        $user->update([
            'nama' => $request->nama,
            'level' => $request->level,
            'email' => $request->email,
            'username' => $request->username,
        ]);
        return redirect('data-mahasiswa')->with('success', '<strong>Berhasil!</strong> Data user berhasil diubah.');
    }

    public function destroy(User $user)
    {
        $biodata = $user->biodata_mhs;
        if ($biodata) $biodata->delete();

        $skripsi = Skripsi::where('mhs_id', $user->id)->get()->first();
        if ($skripsi) $skripsi->delete();

        $name = $user->name;
        $user->delete();
        return back()->with('success', "User <i><b>\"$name\"</b></i> berhasil dihapus.");
    }

    public function resetPassword(User $user)
    {
        $user->update([
            'password' => Hash::make(strtolower($user->username)),
        ]);
        $ket = $user->level == 'dosen' ? 'NIP' : 'NIM (huruf kecil)';
        return redirect('data-mahasiswa')->with('success', "<strong>Berhasil!</strong> Password user telah direset ke $ket.");
    }

    public function editBiodata()
    {
        $data = User::with('biodata_mhs')->find(auth()->user()->id);
        return view('main.form-biodata', [
            'data' => $data,
        ]);
    }

    public function updateBiodata(Request $request, User $user)
    {
        $user->update([
            'nama' => $request->nama,
            'email' => $request->email,
        ]);

        $user->biodata_mhs->update([
            'gender' => $request->gender,
            'angkatan' => $request->angkatan,
            'tgl_lahir' => $request->tgl_lahir,
        ]);

        return back()->with('success', 'Data berhasil diupdate.');
    }
}
