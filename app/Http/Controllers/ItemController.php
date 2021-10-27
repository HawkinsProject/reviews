<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Review;
use App\Models\Upload;
use App\Models\User;
use App\Models\Like;
use App\Models\Follow;


class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct() {
        $this->middleware('auth', ['except'=>['index', 'show']]);
    }
        
    public function index()
    {
        $follows = Follow::all();
        $users = User::all();
        $items = Item::paginate(3);
        $i = 0;
        return view('items.index')->with('items', $items)->with('follows', $follows)
        ->with('users', $users)->with('$i', $i);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('items.create_form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'itemName'=>'required|max:255',
            'companyName'=>'required|max:255',
            'description'=>'required|max:255',
            'price'=>'required|numeric|min:0.01|not_in:0',
            'URL'=>'required|max:255',
  
        ]);
        $image_store = request()->file('image')->store('product_images', 'public');
        $item = new Item();
        $item->itemName = $request->itemName;
        $item->companyName = $request->companyName;
        $item->description = $request->description;
        $item->price = $request->price;
        $item->image = $image_store;
        $item->URL = $request->URL;
        
        $item->save();
        return redirect("item/$item->id/1");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, $page)
    {
        $totalRev = Review::whereRaw('itemId= ?', array("$id"))->count();
        $pageTotal = ceil($totalRev/5);
        $current = $page;
        $next = $page + 1;
        $prev = $page - 1;
        $offset=((int)$page-1)*5;
        $reviews = DB::table('reviews')
        ->where('reviews.itemId', '=', $id)->offset($offset)->limit(5)->get();
       
        $item = Item::find($id);
                //dd($reviews);
        $uploads = DB::table('uploads')
        ->where('uploads.itemId', '=', $id)->get();

        $users = User::all();

        $likes = Like::all();

        $likeCounter = 0;
        $dislikeCounter = 0;
 
        $follows = Follow::all();
        $currentValue = 0;
        return view('items.show')->with('item', $item)->with('reviews', $reviews)
        ->with('current', $current)->with('next', $next)->with('prev', $prev)->with('pageTotal', $pageTotal)
        ->with('uploads', $uploads)->with('users', $users)->with('likes', $likes)
        ->with('likeCounter', $likeCounter)->with('dislikeCounter', $dislikeCounter)
        ->with('follows', $follows)->with('currentValue', $currentValue);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Item::find($id);
        return view('items.edit_form')->with('item', $item);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $image_store = request()->file('image')->store('product_images', 'public');
        $item = Item::find($id);
        $item->itemName = $request->itemName;
        $item->companyName = $request->companyName;
        $item->description = $request->description;
        $item->price = $request->price;
        $item->image = $image_store;
        $item->URL = $request->URL;
        
        $item->save();
        return redirect("item/$item->id/1");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rev =  Review::whereRaw('itemId = ?', array("$id"))->get();
        $rev->each->delete();
        $reviews = Review::all();
        $item = Item::find($id);
        $item->delete();
      
        $items = Item::all();
        return redirect('item')->with('items', $items);
    }
}
