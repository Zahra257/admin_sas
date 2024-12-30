<?php

namespace App\Http\Controllers;

use App\Http\Requests\AccountRequest;
use App\Models\Account;
use Illuminate\Support\Facades\Auth;

class AdminAcountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
          
            $user = Auth::user();
            $accounts = Account::where('organisationId', $user->organisationId)
            ->orderBy('created_at', 'DESC')
            ->get();

        return view('accounts.index', compact('accounts'));
    }  

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('accounts.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AccountRequest $request)
    {
        //
        $user = Auth::user(); 
        $organisationId = $user->organisationId; 

        $data = $request->validated();
        $data['created_by'] = Auth::id();
        $data['updated_by'] = Auth::id();
        $data['organisationId'] = $organisationId;
        $data['active'] = $request->has('active') ? 1 : 0;

        Account::create($data);

        return redirect()->route('accounts_admin')->with('success', 'Account added successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
        $account = Account::findOrFail($id);

        return view('accounts.show', compact('account'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
        $account = Account::findOrFail($id);
        $user = Auth::user();

        return view('accounts.edit', compact('account'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AccountRequest $request, string $id)
    {
        
        $user = Auth::user();
        $organisationId = $user->organisationId; 

        $data = $request->validated();
        $account = Account::findOrFail($id);
        $data['active'] = $request->has('active') ? 1 : 0;
        $data['organisationId'] = $organisationId;
        $account->update($data);
        
        return redirect()->route('accounts_admin')->with('success', 'Account updated successfully');

    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
        $account = Account::findOrFail($id);
        $account->delete();

        return redirect()->route('accounts_admin')->with('success', 'Account deleted successfully');
    }
}
