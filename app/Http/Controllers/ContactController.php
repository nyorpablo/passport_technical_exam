<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contact = Contact::whereNull('deleted_at')->get();
        return response()->json($contact);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:contacts',
            'phone' => 'required|numeric|min:8|max:11|unique:contacts',
            'country' => 'required',
            'address' => 'required',
            'state' => 'required',
            'zip_code' => 'required',
        ]);

        $contact = Contact::create($validatedData);
        return response()->json([
            'message' => 'Successfully added contact',
            'contact' =>  $contact
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        return response()->json($contact);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contact $contact)
    {
        $contact->fill($request->post())->save();
        return response()->json([
            'message' => 'Successfully updated contact',
            'contact' => $contact
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();
        response()->json([
            'message' => 'Successfully deleted',
        ]);
    }
}
