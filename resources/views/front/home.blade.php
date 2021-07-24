@extends('front/layout.layout')

@section('page_title','Manage Post')

@section('page_name','MY FIRST POST')

@section('container')


@foreach($result as $list)
                    <div class="post-preview">
                        <a href="{{url('/post/'.$list->slug)}}">
                            <h2 class="post-title">{{$list->title}}</h2>
                            <h3 class="post-subtitle">{{$list->short_desc}}</h3>
                        </a>
                        <p class="post-meta">
                            Posted on {{$list->post_date}}
                        </p>
                    </div>
                    <hr />   
@endforeach   
                                            
@endsection