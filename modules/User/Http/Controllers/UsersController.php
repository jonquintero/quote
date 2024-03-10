<?php

namespace Modules\User\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request as FacadeRequest;
use Inertia\Inertia;
use Modules\User\Actions\UpsertUserAccountAction;
use Modules\User\DataTransferObjects\UserAccountData;
use Modules\User\Http\Requests\UpsertUserEditRequest;
use Modules\User\Http\Requests\UpsertUserRequest;
use Modules\User\Models\User;

class UsersController extends Controller
{
    public function __construct(
        private readonly UpsertUserAccountAction $upsertUserAccountAction,
    )
    {

    }
    public function index(): \Inertia\Response
    {
        return Inertia::render('Users/Index', [
            'filters' => FacadeRequest::all('search', 'role', 'trashed'),
            'users' => User::query()
                ->orderByName()
                ->filter(FacadeRequest::only('search', 'trashed'))
                ->get()
                ->transform(fn ($user) => [
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                    'deleted_at' => $user->deleted_at,
                ]),
        ]);
    }

    public function create(): \Inertia\Response
    {
        return Inertia::render('Users/Create');
    }

    public function store(UpsertUserRequest $request): \Illuminate\Http\RedirectResponse
    {
        $this->upsert($request, new User());

        return redirect()->route('users.index')
            ->with('success', 'User created!');
    }


    public function edit(User $user): \Inertia\Response
    {
        return Inertia::render('Users/Edit', [
            'user' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'deleted_at' => $user->deleted_at,
            ],
        ]);
    }

    public function update(UpsertUserEditRequest $request, User $user): \Illuminate\Http\RedirectResponse
    {
        $this->upsert($request, $user);

        return redirect()->route('users.index')
            ->with('success', 'User updated!');
    }

    public function upsert($request, User $user): void
    {
        $userAccountData = new UserAccountData(...$request->validated());

        $this->upsertUserAccountAction->execute($user, $userAccountData);
    }

    public function destroy(User $user): \Illuminate\Http\RedirectResponse
    {

        $user->delete();

        return Redirect::back()->with('success', 'User deleted.');
    }

    public function restore(User $user): \Illuminate\Http\RedirectResponse
    {
        $user->restore();

        return Redirect::back()->with('success', 'User restored.');
    }
}
