<!-- The edit form to edit an item -->
@extends('layouts.master')
@section('title')
    products
@endsection
@section('content')
<div class="center">
    @if(count($errors)>0)
            <div class="alert">
                <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
                </ul>
            </div>
        @endif
    <form method="POST" enctype="multipart/form-data" action='{{url("item", $item->id)}}'>
        {{csrf_field()}}
        {{ method_field('PUT') }}
        </p><label>Name</label><br>
        <input type="text" name="itemName" value="{{$item->itemName}}"></p>
        </p><label>Company Name</label><br>
        <input type="text" name="companyName" value="{{$item->companyName}}"></p>
        </p><label>Description</label><br>
        <input type="text" name="description" value="{{$item->description}}"></p>
        <p><label>Price</label><br>
        <input type="text" name="price" value="{{$item->price}}"><br></p>
        <p><label>Image</label><br>
        <input class="but" type="file" name="image" value="{{$item->image}}"><br></p>
        </p><label>URL</label><br>
        <input type="text" name="URL" value="{{$item->URL}}"></p>
    
        <input class="but" type="submit" value="Update">
    </form>
</div>
@endsection