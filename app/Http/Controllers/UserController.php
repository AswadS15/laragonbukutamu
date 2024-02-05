<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admin = User::where('role', 'admin')->latest()->get();
        $pimpinan = User::where('role', 'pimpinan')->latest()->get();
        $kepalaDivisi = User::where('role', 'kepala divisi')->latest()->get();
        return view('users.index', compact(
            'admin',
            'pimpinan',
            'kepalaDivisi',
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $role = [
            'admin',
            'kepala divisi',
            'pimpinan',
        ];


        return view('users.create', compact('role'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:' . User::class],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Password::defaults()],
            'role' => ['required'],
        ]);

        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->role = $request->role;


        $user->save();
        Alert::success("Berhasil", "$user->name berhasil ditambahkan sebagai $request->role");
        return redirect('users');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);
        $role = [
            'admin',
            'kepala divisi',
            'pimpinan',
        ];

        return view('users.update', compact('user', 'role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $id,
            // Sesuaikan dengan kolom lain yang ingin Anda update
        ]);

        // Update data user berdasarkan ID
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        // Sesuaikan dengan kolom lain yang ingin Anda update
        $user->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // menghapus user
        $userToDelete = User::find($id);
        // Validasi sebelum menghapus
        if ($userToDelete) {
            // Periksa apakah user yang akan dihapus adalah user yang sedang login
            if ($userToDelete->id == Auth::id()) {
                return redirect()->back()->with('error', 'Tidak dapat menghapus user yang sedang login.');
            }

            // Hitung jumlah total user
            $totalPimpinan = User::where('role', 'pimpinan')->count();
            $totalAdmin = User::where('role', 'admin')->count();
            $totalKepalaDivisi = User::where('role', 'admin')->count();

            if ($totalPimpinan > 1 || $totalAdmin > 1 || $totalKepalaDivisi > 1) {
                // Hapus user jika jumlah user lebih dari satu
                $userToDelete->delete();
                return redirect()->back()->with('success', 'User berhasil dihapus.');
            } else {
                return redirect()->back()->with('error', 'Tidak dapat menghapus user terakhir.');
            }
        } else {
            return redirect()->back()->with('error', 'User tidak ditemukan.');
        }
    }

    public function profileshow(string $id)
    {
        $user = User::find($id);

        return view('users.profile', compact('user'));
    }

    public function addprofile(Request $request, string $id)
    {
        $request->validate([
            'photo' => 'required|mimes:jpeg,png,jpg,gif',
        ]);


        $file = $request->file('photo');
        $extensi = $file->Extension();
        $ubah = time() . rand(100, 999) . "." . $extensi;

        $file->move(public_path() . '/storage/img/profile', $ubah);



        // Simpan informasi file di database
        $user = User::find($id);
        $user->photo = $ubah;
        $user->save();
        Alert::success('Berhasil', 'Profile Telah Ditambahkan');

        return redirect()->back();
    }

    public function hapusprofil(string $id)
    {
        // Menghapus gambar
        $user = User::find($id);
        Storage::delete('img/profile/', $user->photo);
        // $a = Storage::putFile('img/profile/', $user->photo);
        // dd($a);

        $user->update(['photo' => null]);
        return redirect()->back()->with('success', 'File profil berhasil dihapus.');
    }
}
