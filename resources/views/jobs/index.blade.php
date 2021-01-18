@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3>Posts</h3></div>
                    
                        @can('Publish Post')
                        <div class="panel-heading">Page {{ $posts->currentPage() }} of {{ $posts->lastPage() }}</div>
                        @foreach ($posts as $post)
                            <div class="panel-body">
                                <li style="list-style-type:disc">
                                    <a href="{{ route('posts.show', $post->id ) }}"><b>{{ $post->title }}</b><br>
                                        <p class="teaser">
                                           {{  Str::limit($post->body, 100) }} {{-- Limit teaser to 100 characters --}}
                                        </p>
                                        @if($post->is_boolean == '0')
                                        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-info" role="button">Publish Post</a>
                                        @endif
                                    </a>
                                </li>
                            </div>
                            @endforeach
                            </div>
                            @endcan
                        

                        @canany(['Not Publish','Show Post'])
                        <div class="panel-heading">Page {{ $posts->currentPage() }} of {{ $posts->lastPage() }}</div>
                        @foreach ($posts as $post)
                        @if($post->is_boolean == '1')
                            <div class="panel-body">
                                <li style="list-style-type:disc">
                                    <a href="{{ route('posts.show', $post->id ) }}"><b>{{ $post->title }}</b><br>
                                        <p class="teaser">
                                           {{  Str::limit($post->body, 100) }} {{-- Limit teaser to 100 characters --}}
                                        </p>
                                    </a>
                                </li>
                            </div>
                            @endif
                        @endforeach
                        </div>
                        @endcanany

                        <!-- @can('Show Post')
                        <div class="panel-heading">Page {{ $posts->currentPage() }} of {{ $posts->lastPage() }}</div>
                        @foreach ($posts as $post)
                        @if($post->is_boolean == '1')
                            <div class="panel-body">
                                <li style="list-style-type:disc">
                                    <a href="{{ route('posts.show', $post->id ) }}"><b>{{ $post->title }}</b><br>
                                        <p class="teaser">
                                           {{  Str::limit($post->body, 100) }} {{-- Limit teaser to 100 characters --}}
                                        </p>
                                    </a>
                                </li>
                            </div>
                            @endif
                        @endforeach
                        </div>
                        @endcan -->
                    
                    </div>
                    <div class="text-center">
                        {!! $posts->links() !!}
                    </div>
                </div>
            </div>
        </div>
@endsection