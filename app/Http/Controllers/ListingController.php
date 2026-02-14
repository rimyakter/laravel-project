<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpFoundation\Session\Session;

class ListingController extends Controller
{
    //show all listings
    public function index(Request $request)
    {

        return view('listings.index', [
            'listings' => Listing::latest()->filter(request(['tag', 'search']))->paginate(2)
        ]);
    }
    //show single Listing
    public function show(Listing $listing)
    {
        return view('listings.show', [
            'listing' => $listing
        ]);
    }
    //show create Form
    public function create()
    {
        return view('listings.create');
    }
    //store Listing Form
    public function store(Request $request)
    {
        
        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required', Rule::unique('listings', 'company')],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required',
        ]);

         if($request->hasFile('logo')){
            $formFields['logo'] = $request->file('logo')->store('logos','public');
        }
        Listing::create($formFields);

        return redirect('/')->with('message', 'Listing Created Successfully');
    }

    public function edit(Listing $listing){
        
        return view('listings.edit', ['listing' => $listing]);
    }

    //Update Listing Form
    public function update(Request $request, Listing $listing)
    {
        
        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required'],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required',
        ]);

         if($request->hasFile('logo')){
            $formFields['logo'] = $request->file('logo')->store('logos','public');
        }
        $listing->update($formFields);

        return back()->with('message', 'Listing Updated Successfully');
    }

    //Delete Listing

    public function destroy(Listing $listing){
        $listing->delete();
         return redirect('/')->with('message', 'Listing deleted Successfully');
    }
}
