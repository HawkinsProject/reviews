<!-- From to edit user reviews on items -->
@extends('layouts.master')
@section('title')
    products
@endsection
@section('content')

<div class="center2">
<h1> Edit Review</h1>
    @if(count($errors)>0)
        <div class="alert">
            <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
            </ul>
        </div>
    @endif
<form method="POST" action= '{{url("review/$review->id")}}'>
    {{csrf_field()}}
    {{ method_field('PUT') }}
    
    <input type="hidden" name="itemId" value="{{$review->itemId}}"></p>
    
    <input type="hidden" name="userId" value="{{$review->userId}}"></p>
    </p><label>Rating</label><br>
    <input type="text" name="rating" value="{{$review->rating}}"></p>
    <p><label>Comment</label><br>
    <input type="text" name="reviewComment" value="{{$review->reviewComment}}"><br></p>
 
    <input class="but" type="submit" value="Update">
</form>
</div>
@endsection