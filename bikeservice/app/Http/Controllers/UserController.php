<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        // Retrieve paginated list of users with their roles
        $users = User::with('roles:id,name')->paginate(10);

        // Render the users index view with the retrieved users data
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        // Retrieve all roles
        $roles = Role::all();

        // Render the create user form view with the roles data
        return view('users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UserStoreRequest $request
     * @return Application|Redirector|RedirectResponse
     */
    public function store(UserStoreRequest $request)
    {
        // Create a new user in the database
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make('password123'), // Hash the password
        ]);

        // Assign role to the user
        $user->assignRole([$request->role_id]);

        // Redirect back to the users index page with a success message
        return redirect()->route('user.index')->with('success','User created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param User $user
     * @return Application|Factory|View
     */
    public function show(User $user)
    {
        // Render the user show view with the specified user data
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return Application|Factory|View
     */
    public function edit(User $user)
    {
        // Retrieve all roles
        $roles = Role::all();

        // Render the edit user form view with the specified user and roles data
        return view('users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UserUpdateRequest $request
     * @param User $user
     * @return Application|Redirector|RedirectResponse
     */
    public function update(UserUpdateRequest $request, User $user)
    {
        // Update the user details in the database
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make('password123'), // Hash the password
        ]);

        // Sync user roles
        $user->syncRoles([$request->role_id]);

        // Redirect back to the users index page with a success message
        return redirect()->route('user.index')->with('success','User updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return Application|Redirector|RedirectResponse
     */
    public function destroy(User $user)
    {
        // Delete the user from the database
        $user->delete();

        // Redirect back to the users index page with a success message
        return redirect()->route('user.index')->with('success','User deleted successfully!');
    }
}
