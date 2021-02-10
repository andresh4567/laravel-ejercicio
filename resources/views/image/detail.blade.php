@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            @include('includes.message')
            <div class="card pub_image pub_image_detail">
                <div class="card-header">
                    @if($image->user->image)
                    <div class="container-avatar">
                        <img class="avatar" src="{{route('user.avatar', ['filename'=>$image->user->image])}}"
                            alt="Avatar">
                    </div>
                    @endif
                    <div class="data-user">
                        <span class="nickname">{{'@'.$image->user->nick.' - '}}</span>
                        <span class="name">{{$image->user->name.' '.$image->user->surname}}</span>
                    </div>
                </div>
                <div class="card-body">
                    <div class="image-container">
                        <img src="{{route('image.file', ['filename'=>$image->image_path])}}"
                            alt="Post Laravel Instagram">
                    </div>
                    <div class="description">
                        <span class="nickname">{{'@'.$image->user->nick}}</span>
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
                        <img class="btn-like" src="{{asset('img/corazon-rojo.png')}}" data-id="{{$image->id}}"
                            alt="Corazon Rojo">
                        @else
                        <img class="btn-dislike" src="{{asset('img/corazon-gris.png')}}" data-id="{{$image->id}}"
                            alt="Corazon Gris">
                        @endif
                        <span class="number-likes">{{count($image->likes)}}</span>
                    </div>
                    <div class="clearfix"></div>
                    <div class="comments">
                        <h2>Comentarios({{count($image->comments)}})</h2>
                        <hr>
                        <form action="{{route('comments.save')}}" method="POST">
                            @csrf
                            <input type="hidden" name="image_id" value="{{$image->id}}">
                            <p>
                                <textarea name="content" cols="30" rows="10" class="form-control" required>
                                    {{$errors->has('content') ? 'is-invalid' : ''}}
                                </textarea>
                                @if($errors->has('content'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$errors->first('content')}}</strong>
                                </span>
                                @endif
                            </p>
                            <button type="submit" class="btn btn-success">Enviar</button>
                        </form>
                        <hr>
                        @foreach($image->comments as $comment)
                        <div class="comment">
                            <span class="nickname">{{'@'.$comment->user->nick}}</span>
                            <span
                                class="nickname date">{{' | '.\FormatTime::LongTimeFilter($comment->created_at)}}</span>
                            <p>
                                {{$comment->content}}<br>

                                @if(Auth::check() && ($comment->user->id == Auth::user()->id || $comment->image->user_id
                                == Auth::user()->id))
                                <a href="{{route('comments.delete', ['id'=>$comment->id])}}"
                                    class="btn btn-sm btn-danger">
                                    Eliminar
                                </a>
                                @endif
                            </p>

                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection