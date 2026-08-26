<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;
use App\Models\User;

class AddressController extends Controller
{


    public function index(Request $request)
    {

        $user = $request->user();


        $addresses = $user->addresses()->get();


        return view('addresses.index', compact('addresses'));
    }



    public function create()
    {

        return view('addresses.create');
    }




    public function store(Request $request)
    {


        $request->validate([
            'street' => 'required|string',
            'city' => 'required|string',
            'area' => 'required|string',
            'building' => 'nullable|string',
            'floor' => 'nullable|string',
            'phone' => 'required|string',
            'is_default' => 'boolean',
        ]);



        $user = $request->user();


        if ($request->boolean('is_default')) {


            $user->addresses()->update(['is_default' => 0]);
        }



        $user->addresses()->create($request->all());



        return redirect()
            ->route('addresses.index')
            ->with('success', 'Address created successfully!');
    }




    public function edit(Address $address)
    {


        $this->authorize('update', $address); 


        return view('addresses.edit', compact('address'));
    }




    public function update(Request $request, Address $address)
    {

        $this->authorize('update', $address);


        $request->validate([
            'street' => 'required|string',
            'city' => 'required|string',
            'area' => 'required|string',
            'building' => 'nullable|string',
            'floor' => 'nullable|string',
            'phone' => 'required|string',
            'is_default' => 'boolean',
        ]);


        $user = $request->user();



        if ($request->boolean('is_default')) {


            $user->addresses()->update(['is_default' => 0]);
        }


        $address->update($request->all());

        return redirect()
            ->route('addresses.index')
            ->with('success', 'Address updated successfully!');
    }




    public function destroy(Address $address)
    {


        $this->authorize('delete', $address);


        $address->delete();


        return redirect()
            ->route('addresses.index')
            ->with('success', 'Address deleted successfully!');
    }
}
