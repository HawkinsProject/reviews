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
    
    <!-- printing current items in database -->
    <?php 
        $length = sizeof($items);
    ?>
    @for($x = 0; $x < $length; $x++)
      
        <div class ="row classWithPad">
            <div class="col-md-9 classWithPad"> 
                <div>
                    <a href='{{url("items[$x]/$items[$x]->id/1")}}'>{{$items[$x]->itemName}}</a><br>
                    <img src="{{url($items[$x]->image)}}" alt="item image" style="width:250px;height:300px">
                </div>
            </div>
           
        </div>
  
    @endfor


<!-- pagination links -->


@endsection