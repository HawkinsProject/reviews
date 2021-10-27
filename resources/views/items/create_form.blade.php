<!-- The create form to create a new item -->
@extends('layouts.master')
@section('title')
    products
@endsection
@section('content')

<div class="center2">
        @if(count($errors)>0)
            <div class="alert">
                <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
                </ul>
            </div>
        @endif
   
    <form method="POST" action='{{url("item")}}' enctype="multipart/form-data">
        {{csrf_field()}}
        <p><label>Name: </label><br><input type="text" name="itemName" value="{{old('itemName')}}"></p>
        <p><label>Company: </label><br><input type="text" name="companyName"value="{{old('companyName')}}" ></p>
        <p><label>Description: </label><br><input type="text" name="description" value="{{old('description')}}"></p>
        <p><label>Price: </label><br><input type="text" name="price" value="{{old('price')}}"></p>
        <p><label>Image: </label><br><input class="but" type="file" name="image"></p>
        <p><label>Website: </label><br><input type="text" name="URL" value="{{old('URL')}}"></p>
    
        <input class='but' type="submit" value="Add Item"> 
    </form>
    
</div>
@endsection