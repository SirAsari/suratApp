<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    
    public function loginAuth(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $user = $request->only(['email', 'password']);
        if (Auth::attempt($user)) {
            return redirect()->route('user.index');
        } else {
            return redirect()->back()->with('failed', 'Proses login gagal, silahkan login kembali dengan data yang benar');
        }
    }
    
    public function Index()
    {
        return view('user.dashboard');
    }
    public function tataUsahaIndex(Request $request)
{
    $pagination = $request->input('pagination', 5); // Default pagination size is 5
    $search = $request->input('search');

    $query = User::where('role', 'staff')
        ->orderBy('name', 'ASC');

    if ($search) {
        $query->where(function ($q) use ($search) {
            $q->where('name', 'LIKE', '%' . $search . '%')
                ->orWhere('email', 'LIKE', '%' . $search . '%');
        });
    }

    $Users = $query->paginate($pagination);

    return view('user.tataUsaha.index', compact('Users'));
}

    public function tataUsahaEdit($id)
    {
        $User = User::find($id);
        // atau $User = User::where('id', $id)->first();

        return view('User.tataUsaha.edit', compact('User'));
    }
    public function tataUsahaUpdate(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required',
            'role' => 'required',
        ], [
            'name.required' => 'Nama obat harus diisi.',
            'email.required' => 'Email wajib diisi.',
            'role.required' => 'Jenis role harus dipilih'
        ]);

        $user = User::find($id);

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;

        $user->save();

        return redirect()->route('user.tataUsaha.index')->with('success', 'Data berhasil diubah');
    }

    public function guruIndex(Request $request)
{
    $pagination = $request->input('pagination', 5); 
    $search = $request->input('search');

    $query = User::where('role', 'guru')
        ->orderBy('name', 'ASC');

    if ($search) {
        $query->where(function ($q) use ($search) {
            $q->where('name', 'LIKE', '%' . $search . '%')
                ->orWhere('email', 'LIKE', '%' . $search . '%');
        });
    }

    $Users = $query->paginate($pagination);

    return view('user.guru.index', compact('Users'));
}
    public function tataUsahaCreate()
    {
        return view('User.tataUsaha.create');
    }
    public function guruCreate()
    {
        return view('User.guru.create');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|min:3',
        'email' => 'required|unique:Users,email',
        'role' => 'required',
    ], [
        'name.required' => 'Nama harus diisi.',
        'email.required' => 'Email wajib diisi.',
        'email.unique' => 'Email sudah digunakan.',
        'role.required' => 'Jenis role harus dipilih'
    ]);

    $username = strtolower(substr($request->name, 0, 3)); 

    $generatedPassword = Hash::make($username);

    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => $generatedPassword,
        'role' => $request->role
    ]);

    return redirect()->back()->with('success', 'Data berhasil ditambahkan');
}
    public function show(Request $request)
    {
        //
    }
    public function edit(Request $request)
    {
        //
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $User)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        User::where('id', $id)->delete();

        return redirect()->back()->with('deleted', 'Data berhasil dihapus');
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('logout', 'Anda telah logout!');
    }
}
