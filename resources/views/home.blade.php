@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('includes.message')
            @foreach($images as $image)
            <div class="card pub_image">
                <div class="card-header">
                    @if($image->user->image)
                    <div class="container-avatar">
                        <img class="avatar" src="{{route('user.avatar', ['filename'=>$image->user->image])}}"
                            alt="Avatar">
                    </div>
                    @endif
                    <div class="data-user">
                        <a href="{{route('image.detail', ['id'=>$image->id])}}">
                            <span class="nickname">{{'@'.$image->user->nick.' - '}}</span>
                            <span class="name">
                            {{$image->user->name.' '.$image->user->surname
                            .' | '.\FormatTime::LongTimeFilter($image->created_at)}}</span>
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="image-container">
                        <img src="{{route('image.file', ['filename'=>$image->image_path])}}"
                            alt="Post Laravel Instagram">
                    </div>
                    <div class="description">
                        <p>{{$image->description}}</p>
                    </div>
                    <div class="likes">
                        <?php $user_like = false ?>
                        @foreach($image->likes as $like)
                            @if($like->user->id == Auth::user()->id)
                                <?php $user_like = true ?>
                            @endif
                        @endforeach

                        @if($user_like)
                        <img class="btn-like" src="{{asset('img/corazon-rojo.png')}}" data-id="{{$image->id}}" alt="Corazon Rojo">
                        @else
                        <img class="btn-dislike" src="{{asset('img/corazon-gris.png')}}" data-id="{{$image->id}}" alt="Corazon Gris">
                        @endif
                        <span class="number-likes">{{count($image->likes)}}</span>
                    </div>
                    <div class="comments">
                        <a href="" class=" btn btn-sm btn-warning btn-comments">Comentarios
                            ({{count($image->comments)}})</a>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="clearfix"></div>
            {{$images->links()}}
        </div>
    </div>
</div>
@endsection