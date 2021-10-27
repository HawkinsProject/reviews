<!-- This view shows the items details,
an upload section for users to upload a photo
of item and review section to add reviews -->
@extends('layouts.master')
@section('title')
    Products
@endsection

@section('content')
<ul class="center2">
<!-- item details section -->
<div class="rowdet">
    <h1>{{$item->itemName}}</h1>
    <p>{{$item->companyName}}</p>
    <p>{{$item->description}}</p>
    <p>{{$item->price}}</p>
    <p><img src="{{url($item->image)}}" alt="item image" style="width:250px;height:300px"></p>
    <p>{{$item->URL}}</p>
    @if(Auth::check())
        <p><a href='{{url("item/$item->id/edit")}}'><label style="color: black;">Edit</label></a></p>
        <p>
            <form method="POST" action='{{url("item/$item->id")}}'>
                {{csrf_field()}}
                {{ method_field('DELETE') }}
                <input class="but" type="submit" value="Delete">
            </form>
        </p>
    @endif
    <p>
</div>
<p></p>
<div class="rowdet2">
    <!-- photo upload section -->
    <h3>Customer Photos of Item </h3>
    @foreach($uploads as $upload)
        @foreach($users as $user)
            @if($upload->userId == $user->id)
                <p><label>User name: {{$user->name}}</label></p>
            @endif
        @endforeach
        <p><img src="{{url($upload->photos)}}" alt="user image" style="width:125px;height:150px"></p>
    @endforeach

    @if(Auth::check())
    <form method="POST" action='{{url("upload")}}' enctype="multipart/form-data">
        {{csrf_field()}}
        <p><label>Upload an Item Image</label>
        <input type=hidden name="itemId" value="{{$item->id}}">
        <input type="hidden" name="userId" value="{{Auth::user()->id}}">
        <input class="but" type="file" name="photos"><br></p>
        <input class="but" type="submit" value="Add"> 
    </form>
    @endif
</div>
<p></p>
<!-- reviews section -->
<div class="rowdet3">
    @if(Auth::check())
        @if(count($errors)>0)
            <div class="alert">
                <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action='{{url("review")}}'>
        {{csrf_field()}}
        <input type=hidden name="itemId" value="{{$item->id}}">
        <input type="hidden" name="userId" value="{{Auth::user()->id}}">
        <p><label>Rating: </label><br><input type="text" name="rating"></p>
        <p><label>Review: </label><br><input type="text" name="reviewComment"></p>
            <input class="but" type="submit" value="Add Review"> 
        </form>
    @endif

    <h3>Customer Reviews </h3>
    @foreach($reviews as $review)
        <?php
            $likeCounter = 0;
            $dislikeCounter = 0;
        ?>
        <label>User: {{$review->userId}} Rating: {{$review->rating}}</label><br>
        <label>Review: {{$review->reviewComment}}</label><br>

        @if(Auth::check())
        <p>
            <form method="POST" action='{{url("follow")}}'>
                {{csrf_field()}}
                <input type="hidden" name="currentUserId" value="{{Auth::user()->id}}">
                <input type=hidden name="followsUserId" value="{{$review->userId}}">
                <input type=hidden name="reviewId" value="{{$review->id}}">
                <input type=hidden name="itemId" value="{{$item->id}}">
                    <input class="but left2" type="submit" value="Follow"> 
            </form>
            <?php
                $currentValue = Auth::user()->id;
            ?>
            <form method="POST" action='{{url("follow/$review->id/$currentValue")}}'>
                {{csrf_field()}}
                {{ method_field('DELETE') }}
                <input class="but right" type="submit" value="Unfollow"><br>
            </form>
        </p>
       
            @foreach($likes as $like)
                @if($like->reviewId == $review->id && $like->LikeTotal == 1)
                    <?php $likeCounter += 1?>
                @elseif($like->reviewId == $review->id && $like->disLikeTotal == 1)
                    <?php $dislikeCounter += 1?>
                @endif
            @endforeach
        <p>
            <form method="POST" action='{{url("like")}}'>
                {{csrf_field()}}
                <input type=hidden name="userId" value="{{Auth::user()->id}}">
                <input type=hidden name="reviewId" value="{{$review->id}}">
                <input type=hidden name="disLikeTotal" value="0">
                <input class="left2" type="submit" onclick="<?php $like->LikeTotal=1?>" value="&#128077 {{$likeCounter}}"> 
                <input type=hidden name="LikeTotal" value="1">
            </form>
            <form method="POST" action='{{url("like")}}'>
                {{csrf_field()}}
                <input type=hidden name="userId" value="{{Auth::user()->id}}">
                <input type=hidden name="reviewId" value="{{$review->id}}">
                <input type=hidden name="disLikeTotal" value="1">
                <input class="right" type="submit" onclick="<?php $like->disLikeTotal=1?>" value="&#x1f44e {{$dislikeCounter}}"><br> 
                <input type=hidden name="LikeTotal" value="0">
            </form>
        </p>
  
        <p>
            @if($review->userId == Auth::user()->id)
                <form method="POST" action='{{url("review/$review->id")}}'>
                    {{csrf_field()}}
                    {{ method_field('DELETE') }}
                    <input type="submit" class="left2 but" value="Delete"><label style="color: black;">
                </form>
                <a class="right" style="padding-left: 160px;" href='{{url("review/$review->id/edit")}}'><label style="color: black;">Edit</label></a>
            @endif
        </p>
        @endif
    @endforeach
    </div>
    <!-- pagination of reviews section -->
    @if(count($reviews)>0)
    <nav>
        <ul class= "pagination justify-content-center">
            @if($prev < 1)
                <li class="page-item disabled">
                    <a class="page-link">Previous</a>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href='{{url("item/$item->id/$prev")}}'>Previous</a>
                </li>
            @endif

            @for($page=1; $page <= $pageTotal; $page++)
                @if($page == $current)
                    <li class="page-item diabled"><a class="page-link">{{$page}}</a></li>
                @else
                    <li class="page-item diabled"><a class="page-link" href='{{url("item/$item->id/$page")}}'>{{$page}}</a></li>
                @endif
            @endfor

            @if($next > $pageTotal)
                <li class="page-item diabled">
                    <a class="page-link">Next</a>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href='{{url("item/$item->id/$next")}}'>Next</a>
                </li>
            @endif
        </ul>
    </nav>
    @endif
    </p>


</ul>
@endsection