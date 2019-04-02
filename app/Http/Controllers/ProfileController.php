<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Storage;
class ProfileController extends Controller
{
    public function edit()
    {
        return view('user.edit');
    }

    public function update(Request $request)
    {
        //melakukan pengecekan
        if ($request->user()->avatar) {
            //untuk menghapus file dengan path yang sesuai filed didalam user yang sedang aktif
            Storage::delete($request->user()->avatar);
        }
        //untuk melihan file request yang kita kirim
        // dd($request->file('avatar'));

        $avatar = $request->file('avatar')->store('avatars');// untuk dipindah kan kedalam projek kita
        //memasukkan value kedalam database
        $request->user()->update([
            'avatar' => $avatar
        ]);

        return redirect()->back();
    }
    public function destroy(Request $request)
    {
        //melakukan pengecekan
        if ($request->user()->avatar) {
        //untuk menghapus file dengan path yang sesuai filed didalam user yang sedang aktif
        Storage::delete($request->user()->avatar);
        }
        $request->user()->update([
            'avatar' => null
        ]); 
        return redirect()->back();

    }

}
