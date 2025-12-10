
<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PetController;
use App\Http\Controllers\AdoptionController;
use App\Http\Controllers\CustomerController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('hello', function () {
    return "<h1>Hello folks, Have a nice day 😍</h1";
});

Route::get('hello/{name}', function () {
    return "<h1>Hello: " . request()->name . "</h1";
});

Route::get('show/pets', function () {
    $pets = App\Models\Pet::all();
    dd($pets->toArray()); // Dump & Die
});

Route::get('show/pet/{id}', function () {
    $pet = App\Models\Pet::find(request()->id);
    dd($pet->toArray());
});

Route::get('challenge', function () {
    $users = App\Models\User::take(20)->get();
    $stylesTH = "style='background: gray; color: white; padding: 0.4rem'";
    $stylesTD = "style='border: 1px solid gray; padding: 0.4rem'";
    //dd($users->toArray());
    $code = "<table style='border-collapse: collapse; margin: 2rem auto; font-family: Arial'>
                <tr>
                    <th $stylesTH>Id</th>
                    <th $stylesTH'>Photo</th>
                    <th $stylesTH'>Fullname</th>
                    <th $stylesTH'>Age</th>
                    <th $stylesTH'>Created At</th>
                </tr>";
    foreach ($users as $user) {
        $code .= ($user->id % 2 == 0) ? "<tr style='background: #ddd'>" : "<tr>";
        $code .=    "<td $stylesTD>" . $user->id . "</td>";
        $code .=    "<td $stylesTD><img src='" . asset('images/' . $user->photo) . "' width='40px'></td>";
        $code .=    "<td $stylesTD>" . $user->fullname . "</td>";
        $code .=    "<td $stylesTD>" . Carbon\Carbon::parse($user->birthdate)->age . " years old</td>";
        $code .=    "<td $stylesTD>" . $user->created_at->diffForHumans() . "</td>";
        $code .= "</tr>";
    }
    return $code . "</table>";
});

Route::get('view/pets', function () {
    $pets = App\Models\Pet::all();
    return view('view-pets')->with('pets', $pets);
});

Route::get('view/pet/{id}', function () {
    $pet = App\Models\Pet::find(request()->id);
    return view('view-pet')->with('pet', $pet);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::group(['middleware' => 'admin'], function () {
        Route::resources([
            'users' => UserController::class,
            'pets' => PetController::class,
        ]);

        // Adoption 
        Route::get('adoptions', [AdoptionController::class, 'index']);
        Route::get('adoptions/{id}', [AdoptionController::class, 'show']);
        Route::post('search/adoptions', [AdoptionController::class, 'search']);
        Route::get('export/adoptions/pdf', [AdoptionController::class, 'pdf']);
        Route::get('export/adoptions/excel', [AdoptionController::class, 'excel']);

        // Search
        Route::post('search/users', [UserController::class, 'search']);
        Route::post('search/pets', [PetController::class, 'search']);

        // Export
        Route::get('export/users/pdf', [UserController::class, 'pdf']);
        Route::get('export/users/excel', [UserController::class, 'excel']);
        // Pets export
        Route::get('export/pets/pdf', [PetController::class, 'pdf']);
        Route::get('export/pets/excel', [PetController::class, 'excel']);

        // Imports
        Route::get('import/users', [UserController::class, 'import']);
        // Pets import (form posts to this URL)
        Route::post('import/pets', [PetController::class, 'import']);
    });
    // CUstomer
    Route::get('myprofile/', [CustomerController::class, 'myprofile']);
    Route::post('myprofile/{id}', [CustomerController::class, 'updatemyprofile']);

    Route::get('myadoptions/', [CustomerController::class, 'myadoptions']);
    Route::get('myadoptions/{id}', [CustomerController::class, 'showadoption']);

    Route::get('makeadoption/', [CustomerController::class, 'listpets']);
    Route::get('makeadoption/{id}', [CustomerController::class, 'confirmadoption']);
    Route::post('makeadoption/{id}', [CustomerController::class, 'makeadoption']);
    Route::get('search/makeadoption/', [CustomerController::class, 'search']);
    // AJAX search endpoints for customers
    Route::post('search/makeadoption', [CustomerController::class, 'search']);
    Route::post('search/myadoptions', [CustomerController::class, 'searchMyAdoptions']);
});

require __DIR__ . '/auth.php';
