<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Pet;
use App\Models\Adoption;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function myprofile() {
        $user = User::find(Auth::user()->id);
        //dd($user->toArray());
        return view('customer/myprofile')->with('user', $user);
    }

    public function updatemyprofile(Request $request) {
        $validation = $request->validate([
            'document' => ['required', 'numeric', 'unique:' . User::class . ',document,' . $request->id],
            'fullname' => ['required', 'string'],
            'gender' => ['required'],
            'birthdate' => ['required', 'date'],
            'phone' => ['required'],
            'email' => ['required', 'lowercase', 'email', 'unique:' . User::class . ',email,' . $request->id],
        ]);
        if ($validation) {
            //dd($request->all());
            if ($request->hasFile('photo')) {
                $photo = time() . '.' . $request->photo->extension();
                $request->photo->move(public_path('images'), $photo);
                if ($request->originphoto != 'no-photo.png' && file_exists(public_path('images/' . $request->originphoto))) {
                    unlink(public_path('images/') . $request->originphoto);
                }
            } else {
                $photo = $request->originphoto;
            }
        }
        $user = User::find($request->id);
        $user->document = $request->document;
        $user->fullname = $request->fullname;
        $user->gender = $request->gender;
        $user->birthdate = $request->birthdate;
        $user->photo = $photo;
        $user->phone = $request->phone;
        $user->email = $request->email;

        if ($user->save()) {
            return redirect('myprofile/')->with('message', 'My profile was successfully edited!.');
        }
    }

    public function myadoptions() {
        $adopts = Adoption::where('user_id', Auth::user()->id)->get();
        return view('customer/myadoptions')->with('adopts', $adopts);
    }
    public function showadoption(Request $request) {
        $adopt = Adoption::find($request->id);
        return view('customer/showadoption')->with('adopt', $adopt);
    }
    public function listpets() {
        $pets = Pet::where('status', '!=', 1)->orderBy('id', 'desc')->paginate(20);
        return view('customer/makeadoption')->with('pets', $pets);  
    }
    public function confirmadoption($id) {
        $pet = Pet::find($id);
        if (!$pet) {
            return redirect('makeadoption/')->with('error', 'Pet not found.');
        }
        return view('customer/confirmadoption')->with('pet', $pet);
    }
    public function makeadoption(Request $request, $id) {
        $pet = Pet::find($id);
        if (!$pet) {
            return redirect('makeadoption/')->with('error', 'Pet not found.');
        }

        if ($pet->status == 1) {
            return redirect('makeadoption/')->with('error', 'This pet has already been adopted.');
        }

        // create adoption record
        $adoption = new Adoption();
        $adoption->user_id = Auth::user()->id;
        $adoption->pet_id = $pet->id;
        if ($adoption->save()) {
            // mark pet as adopted
            $pet->status = 1;
            $pet->save();
            return redirect('myadoptions/')->with('message', 'Thank you! The adoption request was successful.');
        }

        return redirect('makeadoption/')->with('error', 'There was a problem processing your adoption.');
    }
    public function search(Request $request) {
        $pets = Pet::names($request->q)->where('status', '!=', 1)->orderBy('id', 'desc')->paginate(20);
        return view('pets.search')->with('pets', $pets);
    }

    public function searchMyAdoptions(Request $request) {
        $adopts = Adoption::names($request->q)->where('user_id', Auth::user()->id)->orderBy('id', 'DESC')->get();
        return view('adoptions.search')->with('adopts', $adopts);
    }

    // CUstomer
    // Route::get('myprofile/', [CustomerController::class, 'myprofile']);
    // Route::get('myprofile/{id}', [CustomerController::class, 'updateprofile']);

    // Route::get('myadoptions/', [CustomerController::class, 'myadoptions']);
    // Route::get('myadoptions/{id}', [CustomerController::class, 'showadoption']);

    // Route::get('makeadoptions/', [CustomerController::class, 'listpets']);
    // Route::get('makeadoption/{id}', [CustomerController::class, 'confirmadoption']);
    // Route::post('makeadoption/{id}', [CustomerController::class, 'makeadoption']);
    //Route::get('search/makeadoption/', [CustomerController::class, 'search']);
}
