<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\select;
use App\Models\User;
use App\Http\Controllers\Profile\AvatarController;
use OpenAI\Laravel\Facades\OpenAI;
use Laravel\Socialite\Facades\Socialite;

Route::get('/', function () {
    return view('welcome');
    // ftch all users
    // $users = DB:: select("select * from users");
   // dd($users);

    // Create new user
   // $user = DB:: insert("insert into users (name, email, password) values (?, ?, ?)",
   // ['Dickay', 'Dickay@gmail.com', 'Password2']);

   // Updating database
    // $user = DB:: update("update users set email = 'dantee@gmail.com' where id = 2");
    // using binding
   // $user = DB:: update("update users set email =? where id =?", ['dickay@gmail.com', 2]);

   // deleting a user
   // $user = DB:: delete("delete from users where id = 2");

   // Using Query builder
   // $users = DB:: table('users')->where('id',2)->get();
   // $users = DB:: table('users')->get();
   // $user = DB:: table('users')->insert(['name' => 'Dickay1', 'email' => 'dickay1@gmail.com', 'password' => 'Password2']);
   // $user = DB:: table('users')->where('id', 3)->update(['email'=>'dantee@gmail.com']);
   // $user = DB:: table('users')->where('id',3)->delete();

   // Using Eloquent(ORM) using Models
   // $users = User::get();
   // Creating a new user
   // $user = User:: create(['name'=>'Steven',
   // 'email' => 'dkay@gmail.com', 'password' => 'Password4']);

   //$user = User:: find(7);
   // $user->update(['email' => 'mue@gmail.com']);
   // $user->delete();
   //dd($user->name);
});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::patch('/profile/avatar', [AvatarController::class, 'update'])->name('profile.avatar');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



// Open AI
Route:: get('/openai', function(){
    $result = OpenAI::chat()->create([
        'model' => 'gpt-3.5-turbo',
        'messages' => [
            ['role' => 'user', 'content' => 'Hello!'],
        ],
    ]);

    echo $result->choices[0]->message->content; // Hello! How can I assist you today?

});




require __DIR__.'/auth.php';
