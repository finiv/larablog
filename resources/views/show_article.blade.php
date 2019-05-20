@extends('layouts.app')
@section('content')
    <!-- Page Header -->
    <header class="masthead">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="post-heading">
                        <h1>{!! $article->title !!}</h1>
                        <h2 class="subheading">{!! $article->short_text !!}</h2>
                        <span class="meta"> Опубликовал
                <a href="#">{{$article->author}}</a>
                 в {!! $article->created_at->format('H:i - d/m/Y') !!}</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Post Content -->
    <article>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    {!! $article->full_text !!}
                </div>

            </div>
        </div>

        <div class="comment col-md-10 col-md-offset-2">
            {{--<style>--}}
                {{--.comment{--}}
                    {{--position: absolute;--}}
                    {{--margin-left: 100px;--}}
                {{--}--}}
            {{--</style>--}}
            @foreach($comments as $comment)
                <div class="comment"
                     style="
                     border: 1px solid #666;
                     margin: 5px;
                     padding: 5px;
                     padding-top: 5px;
                     font-family: Tahoma;
                     font-size: 16px;
                     border-radius: 4px;
                     box-shadow: 2px 2px 2px #999;
                        ">
                    <p><strong>{{_user($comment->user_id)->email}}</strong></p>
                    <p>{!! $comment->comment !!}</p>
                    <p>{{$comment->created_at->format('d-m-Y')}}</p>

                </div>
            @endforeach
            <br><br>
            <hr>
            <br>
            @if(\Auth::check())
                <form method="post" action="{!! route('comments.add') !!}">
                    {!! csrf_field() !!}
                    <input type="hidden" value="{{$article->id}}" name="article_id">
                    <p>Комментарий:<br>
                        <textarea class="form-control" name="comment"></textarea></p>
                    <br>
                    <button type="submit" class="btn btn-success" style="cursor:pointer; margin-bottom: 35px;">Добавить комментарий</button>
                    <br>
                </form>
            @endif
        </div>
    </article>

@stop