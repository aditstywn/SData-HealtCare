<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PasienController extends Controller
{
    public function create(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }
    public function find(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }
    public function get(Request $request): RedirectResponse
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }
    public function info(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }
}
