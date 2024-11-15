<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use Spatie\Permission\Models\Permission;
use Illuminate\Validation\Rules\Password;

class RegisteredUserController extends Controller
{
    public function run(): void
    {
        // pengunjung
        Permission::create(['name' => 'edit-profil']);
        Permission::create(['name' => 'print-tiket']);
        Permission::create(['name' => 'beli-tiket']);
        Permission::create(['name' => 'lihat-produk']);
        Role::create(['name' => 'pengunjung']);

        // User
        $roleUser = Role::findByName('pengunjung');
        $roleUser->givePermissionTo('edit-profil');
        $roleUser->givePermissionTo('print-tiket');
        $roleUser->givePermissionTo('beli-tiket');
        $roleUser->givePermissionTo('lihat-produk');
    }
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }


    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => [
                'required',
                'confirmed',
                Password::min(8)
                    ->letters()
                    ->mixedCase()
                    ->numbers()
                    ->symbols()
                // ->uncompromised()
            ],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $user->assignRole('pengunjung');
        // $user->givePermissionTo('edit-profil');
        // $user->givePermissionTo('print-tiket');
        // $user->givePermissionTo('beli-tiket');
        // $user->givePermissionTo('lihat-produk');

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
