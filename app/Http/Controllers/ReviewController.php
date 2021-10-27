<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'rating'=>'required|numeric|min:1|max:5',
            'reviewComment'=>'required|max:255|min:5',
  
        ]);
        $review = new Review();
        $review->itemId = $request->itemId;
        $review->userId = $request->userId;
        $review->rating = $request->rating;
        $review->reviewComment = $request->reviewComment;
        $review->save();
        return redirect("/");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $review = Review::find($id);
        return view('items.edit_review')->with('review', $review);
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
        $this->validate($request,[
            'rating'=>'required|numeric|min:1|max:5',
            'reviewComment'=>'required|max:255|min:5',
  
        ]);
        $review = Review::find($id);
        $review->itemId = $request->itemId;
        $review->userId = $request->userId;
        $review->rating = $request->rating;
        $review->reviewComment = $request->reviewComment;
        $review->save();
        return redirect("item/$review->itemId/1");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $review = Review::find($id);
        $review->delete();
     
        return redirect('/');
    }
}
