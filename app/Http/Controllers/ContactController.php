<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function getContacts()
    {
        $contacts = Contact::all();
        return $contacts;
    }
    public function saveContacts(Request $request)
    {
        $contact = $request->all();
        if($request->has('image') && !empty($request->image))
        {
            $imageName = time(). '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('images/gallery'),$imageName);
            $path = ('public/images/gallery'.$imageName);
            $contact->image = $path;
        }

        if (Contact::create($contact))
        {
            return response()->json(['status'=> true, 'message'=> 'Contact Added!']);
        }
        else
        {
            return response()->json(['status'=> false, 'message'=> 'Error!']);
        }


    }
}
