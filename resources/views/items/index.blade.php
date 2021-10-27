<!-- home page view that lists items and 
where users can log in or register -->
@extends('layouts.master')
@section('title')
    products
@endsection
@section('content')
    <p>
    <!-- if user is logged in then the system does the 
    next actions -->
    @if(Auth::check())
        <!-- producing a following list -->
        <h3> Following </h3>
        @foreach($follows as $follow)
            @if(Auth::user()->id==$follow->currentUserId)
                @foreach($users as $user)
                    @if($follow->followsUserId == $user->id)
                        <label>|{{$user->name}}|</label>
                    @endif
                @endforeach
            @endif
        @endforeach
        <p></p>
        <!-- producing an item list the user may like -->
        <h3>Item Reccommendations </h3>
        @foreach($follows as $follow)
            @if(Auth::user()->id==$follow->currentUserId)
                @foreach($items as $item)
                    @if($item->id != $follow->itemId)
                        <label>|{{$item->itemName}}|</label>
                    @endif
                @endforeach
            @endif
        @endforeach
            
    @endif
    <a style="text-decoration:none" class="but right" href='{{url("item/create")}}'>Add New Item</a>
    </p>
    <ul class="center">
    <!-- printing current items in database -->
    @foreach($items as $item)
        <p style="display:inline-block;">
        <div class ="row">
            <div class="column">
                <a href='{{url("item/$item->id/1")}}'>{{$item->itemName}}</a><br>
                <img src="{{url($item->image)}}" alt="item image" style="width:250px;height:300px">
            </div>
        </div>
        </p>
    @endforeach

</ul>
<!-- pagination links -->
{{$items->links()}}

@endsection