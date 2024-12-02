<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Tiket;
use App\Models\Transaksi;
// use Image;
use Illuminate\Http\Request;
// use Intervention\Image\Image;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Intervention\Image\Laravel\Facades\Image;



class AdminController extends Controller
{
    // Role & permission 
    public function run(): void
    {
        // Permission
        // admin
        Permission::create(['name' => 'tambah-user']);
        Permission::create(['name' => 'edit-user']);
        Permission::create(['name' => 'hapus-user']);
        Permission::create(['name' => 'lihat-user']);

        Permission::create(['name' => 'tambah-tiket']);
        Permission::create(['name' => 'edit-tiket']);
        Permission::create(['name' => 'hapus-tiket']);
        Permission::create(['name' => 'lihat-tiket']);

        // client
        Permission::create(['name' => 'lihat-penjualan']);
        Permission::create(['name' => 'print-HasilPenjualan']);

        // pengunjung
        Permission::create(['name' => 'edit-profil']);
        Permission::create(['name' => 'print-tiket']);
        Permission::create(['name' => 'beli-tiket']);
        Permission::create(['name' => 'lihat-produk']);

        // role
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'client']);
        Role::create(['name' => 'pengunjung']);

        // set-up Role
        $roleAdmin = Role::findByName('admin');
        // user
        $roleAdmin->givePermissionTo('tambah-user');
        $roleAdmin->givePermissionTo('edit-user');
        $roleAdmin->givePermissionTo('hapus-user');
        $roleAdmin->givePermissionTo('lihat-user');
        // tiket
        $roleAdmin->givePermissionTo('tambah-tiket');
        $roleAdmin->givePermissionTo('edit-tiket');
        $roleAdmin->givePermissionTo('hapus-tiket');
        $roleAdmin->givePermissionTo('lihat-tiket');

        // User
        $rolePengunjung = Role::findByName('pengunjung');
        $rolePengunjung->givePermissionTo('edit-profil');
        $rolePengunjung->givePermissionTo('print-tiket');
        $rolePengunjung->givePermissionTo('beli-tiket');
        $rolePengunjung->givePermissionTo('lihat-produk');

        $roleClient = Role::findByName('client');
        $roleClient->givePermissionTo('lihat-penjualan');
        $roleClient->givePermissionTo('print-HasilPenjualan');
    }
    // TIKET
    public function view_tiket()
    {

        $tiket = Tiket::get();

        return view('ademin.tiket.htiket ', compact('tiket'));
    }
    public function detail_tiket(Request $request, $id)
    {

        $tiket = Tiket::find($id);

        return view('ademin.crud.detail_tiket', compact('tiket'));
    }

    // public function tambah_view()
    // {
    //     $pengunjung = User::role('client')->get();
    //     return view('ademin.crud.tambah', compact('pengunjung'));
    // }
    //  view tiket
    public function tambah_view()
    {
        $modelIds = DB::table('model_has_roles')
            ->join('roles', 'model_has_roles.role_id', '=', 'roles.id')
            ->where('roles.id', '2')
            ->pluck('model_has_roles.model_id');


        $users = User::whereIn('id', $modelIds)->get();

        return view('ademin.crud.tambah', compact('users'));
    }




    // menambahkan tiket
    public function store_tiket(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_tiket' => 'required',
            'name' => 'required',
            'harga' => 'required',
            'deskripsi' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg|max:2048',
            'user_id' => 'required',
        ]);

        // if ($validator->failed()) return redirect()->withInput()->withErrors($validator);
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }
        $photo = $request->file('image');
        $filename = date('y-m-d') . $photo->getClientOriginalName();
        $path = 'image-tiket/' . $filename;


        Storage::disk('public')->put($path, file_get_contents($photo));

        $tiket['id_tiket'] = $request->id_tiket;
        $tiket['name'] = $request->name;
        $tiket['harga'] = $request->harga;
        $tiket['deskripsi'] = $request->deskripsi;
        $tiket['image'] = $filename;
        $tiket['user_id'] = $request->user_id;


        Tiket::create($tiket);

        return redirect()->route('tiket-view');
    }
    // megd=edit dan update tiket
    public function edit_tiket(Request $request, $id)
    {
        $tiket = Tiket::find($id);

        return view('ademin.crud.edit', compact('tiket'));
    }

    public function update_tiket(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'id_tiket' => 'required',
            'name' => 'required',
            'harga' => 'required',
            'deskripsi' => 'required',
            'image' => 'nullable|mimes:png,jpg,jpeg|max:2048',
        ]);

        // if ($validator->failed()) return redirect()->withInput()->withErrors($validator);
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }
        $find = Tiket::find($id);

        $tiket['id_tiket'] = $request->id_tiket;
        $tiket['name'] = $request->name;
        $tiket['harga'] = $request->harga;
        $tiket['deskripsi'] = $request->deskripsi;


        $photo = $request->file('image');
        if ($photo) {
            $filename = date('y-m-d') . $photo->getClientOriginalName();
            $path = 'image-tiket/' . $filename;
            if ($photo) {
                Storage::disk('public')->delete('image-tiket/' . $find->image);
            }
            Storage::disk('public')->put($path, file_get_contents($photo));
            $tiket['image'] = $filename;
        }
        // if ($photo) {
        //     $filename = date('y-m-d') . $photo->getClientOriginalName();
        //     $path = 'image-tiket/' . $filename;

        //     if ($find->image) {
        //         Storage::disk('public')->delete('image-tiket/' . $find->image);
        //     }
        //     Storage::disk('public')->put($path, file_get_contents($photo));
        //     $tiket['image'] = $filename;
        // }

        // Tiket::whereId($id)->update($tiket);
        $find->update($tiket);

        return redirect()->route('tiket-view');
    }


    // DELETE TIKET

    public function delete_tiket(Request $request, $id)
    {
        $tiket = Tiket::find($id);

        // if ($tiket) {
        //     $tiket->delete();
        // }
        if ($tiket) {
            $imagePath = $tiket->image;
            if ($imagePath) {
                Storage::disk('public')->delete('image-tiket/' . $tiket->image);
            }
            $tiket->delete();
        }

        return redirect()->route('tiket-view');
    }


    // user
    public function user_view()
    {
        $data = User::get();

        return view('ademin.userr.userr', compact('data'));
    }
    // view user
    public function view_tambah_user()
    {

        return view('ademin.userr.crud.tambah');
    }
    // tambah user
    public function store_user(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' =>
            [
                'required',
                'confirmed',
                Password::min(8)
                    ->letters()
                    ->mixedCase()
                    ->numbers()
                    ->symbols()
                // ->uncompromised()
            ],
            'role' => 'required',
        ]);
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }

        $userData = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ];
        $userr = User::create($userData);

        // $userr['name'] = $request->name;
        // $userr['email'] = $request->email;
        // $userr['password'] = Hash::make($request->password);
        // User::create($userr);

        $role = $request->role;
        if ($role) {
            $userr->assignRole($role);
        };
        return redirect()->route('user-view')->with('success', 'User created and role assigned successfully!');
    }
    // delete
    public function delete_user(Request $request, $id)
    {

        $userr = User::find($id);

        if ($userr) {
            $userr->delete();
        }

        return redirect()->route('user-view');
    }
    // edit 
    public function edit_user($id)
    {
        $data = User::with('roles')->find($id);
        $roles = Role::all();
        return view('ademin.userr.crud.edit', compact('data', 'roles'));

        // return view('ademin.userr.crud.edit', compact('data'));
    }

    public function update_user(Request $request, $id)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'email' => 'required|string|email|max:255',
                'password' =>
                [
                    'nullable',
                    'confirmed',
                    Password::min(8)
                        ->letters()
                        ->mixedCase()
                        ->numbers()
                        ->symbols()
                    // ->uncompromised()
                ],
            ]
        );

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }

        $data['email'] = $request->email;
        $data['name'] = $request->name;

        if ($request->password) {
            $data['password'] = Hash::make($request->password);
        }

        User::whereId($id)->update($data);

        return redirect()->route('user-view');
    }



    // clienrt
    public function client_view()
    {
        // Fetch tiket_desc records along with user details 
        $tiketDescs = DB::table('tiket_desc')
            ->join('users', 'tiket_desc.user_id', '=', 'users.id')
            ->select('tiket_desc.*', 'users.name as user_name')
            ->get();
        return view('ademin.klien.klien', compact('tiketDescs'));
    }


    public function transaksi_view()
    {
        $transaksidecs = DB::table('transaksis')
            ->join('users', 'transaksis.user_id', '=', 'users.id')
            ->join('tiket_desc', 'transaksis.produk_id', '=', 'tiket_desc.id')
            ->select('transaksis.*', 'users.name as user_name', 'tiket_desc.name as tiket_name')
            ->get();

        return view('ademin.transaksi.transaksi', compact('transaksidecs'));
    }

    public function ganti_status(Request $request, $id)
    {
        $request->validate(['status' => 'required|string|in:pending,success,failed',]);
        $transaction = Transaksi::findOrFail($id);
        $transaction->status = $request->input('status');
        $transaction->save();
        return redirect()->back()->with('success', 'Status updated successfully.');
    }
}
