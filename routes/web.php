<?php
use App\Post;
use App\User;
use App\contry;
use App\Photo;
use App\Tag;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
   return view('welcome');
  
});

// Route::get('/about', function () {
//    return "hii about page";
   
//  });

//  Route::get('/contact', function () {
//     return "hii this is contact page";
//  });
 
//  Route::get('/post/{id}/{name}',function($id,$name){
//      return "this is post no.".$id." ".$name;

//  });

// Route::get('/admin/posts/example',array('as'=>'admin.home' , function(){

//     $url = route('admin.home');

//     return "url is ".$url;
// }));

// Route::get('/post/{id}','PostController@index');

// Route::resource('posts','PostController');

// Route::get('/contact','PostController@contact');

// route::get('post/{id}/{name}/{password}','PostController@show_post');

// /*-------------------------------------------------------------------------------
//       Database Raw SQL Queries
// --------------------------------------------------------------------------------*/

//  Route::get('/insert',function(){
//     DB::insert('insert into posts(user_id,title, content,is_admin) values(?,?,?, ?)', ['2','Laravel is awesome with edwin ', 'Laravel','2']);
//  });

// Route::get('/read',function(){
//    $result = DB::select('select * from posts where id = ?', [1]);
//    foreach($result as $post)
//       return $post -> title;
// });

// Route::get('/update',function(){
//    $update = DB::update('update posts set title = "update title" where id = ?', [1]);

//    return $update;
// });

// Route::get('/delete',function(){
//    $delete = DB::delete('delete from posts where id = ? ',[1]);
//    return $delete;
// });



/*--------------------------------------------------------------------------------
   ELOQUENT
--------------------------------------------------------------------------------*/

// Route::get('/read1',function(){

//    $posts=Post::all();

//    //echo $posts;
   
//    foreach($posts as $post){

//       return $post->title;

//    }

// });

// Route::get('/read2',function(){

//       $posts=Post::find(2);

//       //echo $posts;
//       return $posts -> title;
//       // foreach($posts as $post){

//       //    return $post->title;

//       // }  

// });

// Route::get('/findwhere',function(){
//    $posts = Post::where('id',3)->orderBy('id','desc')->take(1)->get();
//    return $posts;
// });
 
// Route::get('/findmore',function(){
//    $posts = Post::findOrFail(1);
//    return $posts;
// });

// Route::get('/basicinsert',function(){
//    $posts = new Post;

//    $posts->title = "new eloquent title insert";
//    $posts->content = "eloquent is really cool";
//    $posts->save();
// });

// Route::get('/basicinsert2',function(){
//    $posts = Post::find(2);

//    $posts->title = "new eloquent title insert 2";
//    $posts->content = "eloquent is really cool 2";
//    $posts->save();
// });

// Route::get('/create',function(){
//    Post::create(['title'=>'the create method','content'=>'i am learing alot with edwin']);
// });

// Route::get('/update',function(){

//       Post::where('id',2)->where('is_admin',0)->update(['title'=>'NEW PHP TITLE','content'=>'NEW PHP CONTENT']);

// });

// Route::get('/delete',function(){
//    $post= Post::find(10);
//    $post->delete();
// });

// Route::get('/delete1',function(){

//    Post::destroy([4,5]);

// });

// Route::get('/softdelete',function(){

//    Post::find(8)->delete();

// });

// Route::get('/readsoftdelete',function(){

// //   $post = Post::find(6);
// //   return $post;

//       // $post=Post::withTrashed()->where('id',6)->get();
//       // return $post;

//       $post=Post::onlyTrashed()->where('is_admin',6)->get();
//       return $post;

// });

// Route::get('/restore',function(){
//    Post::withTrashed()->where('is_admin',0)->restore();
// });

// Route::get('/forcedelete',function(){
//    Post::onlyTrashed()->where('is_admin',0)->forceDelete();
// });


/*-------------------------------------------------------------------------------
   ELOQUENT RELATIONSHIP
--------------------------------------------------------------------------------*/


// //one to one relationship
// Route::get('/user/{id}/post',function($id){

//       return User::find($id)->post;

// });

// Route::get('/posts/{id}/user',function($id){

//    return Post::find($id)->user->name;
// });

// //one to many relationship
// Route::get('/posts',function(){

//    $user = User::find(1);

//    foreach($user->posts as $post ){

//       echo $post->title."</br>";

//    }

// });

// //many to many relationship

// Route::get('/user/{id}/role',function($id){

//       // $user = User::find($id)->roles()->orderBy('id','desc')->get();
//       //    return $user;
//       $user = User::find($id);
//       foreach($user->roles as $role)
//       {
//          return $role->name;
//       }
// });

// //Accessing intermediat table / pivot

// Route::get('users/pivot',function(){

//       $user = User::find(1);

//       foreach($user->roles as $role)
//       {
//          echo $role->pivot->created_at;
//       }

// });

// //Hashmany

// Route::get('user/country',function(){

//    $country = contry::find(2);
 
//    foreach($country->posts as $post)
//    {
//       return $post->title;
//    }


// });

// //Polymorphic Relations
// Route::get('/user/photos',function(){

//    $user = User::find(1);
//    foreach($user->photos as $photo)
//    {
//          return $photo->path;
//    }
// });

// Route::get('/post2/{id}/photos',function($id){

//    $post = Post::find($id);
//    foreach($post->photos as $photo)
//    {
//          echo $photo->path."<br>";
//    }
// });

// Route::get('/photo/{id}/post', function($id){
//   $photo = Photo::findOrFail($id);
//   return $photo->imageable;
// });

// //Polymorphic many to many
// Route::get('/post3/tag',function(){

//    $post = Post::find(1);
//    foreach($post->tag as $tag){
      
//       echo $tag->name;

//    }

// });

// Route::get('/tag/post/{id}',function($id){
//    $tag = Tag::find($id);
//    //return $tag->posts;
//    foreach($tag->posts as $post){
//       echo $post->title;
//    }

// }); 


/*
|--------------------------------------------------------------------------
| Crud Application
|--------------------------------------------------------------------------
*/



Route::group(['middleware' => 'web'], function () {

   Route::resource('/post','PostController');

   Route::get('/date',function(){
      $date = new DateTime('+1 week');

      echo $date->format('m-d-Y');

      echo '<br>';

      echo Carbon::now()->addDays(10)->diffForHumans();

      echo '<br>';

      echo Carbon::now()->subMonth(5)->diffForHumans();

      echo '<br>';

      echo Carbon::now()->yesterday();

      echo '<br>';
   });
    
});