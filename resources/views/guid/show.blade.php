@extends('layouts.app')
@section('content')
    @php
        use Illuminate\Support\Carbon;

    @endphp

    @if ($comments->lastPage() < $comments->currentPage())
        <script>
            window.location = "/guid/{{ $guid->id }}?page={{ $comments->lastPage() }}";
        </script>
        @php
            exit();
        @endphp
    @endif
    <script>
        function commentFormGenerate(id) {
            let commentForm = document.getElementById(`comment${id}`);
            let commentButton = document.getElementById(`commentButton${id}`);
            if (commentForm.style.display === 'none') {
                commentForm.style.display = 'block';
                commentButton.innerHTML = 'Отменить';
            } else {
                commentForm.style.display = 'none';
                commentButton.innerHTML = 'Оветить';
            }


        }
    </script>
    <div class="container">
        <div class="page-content">


            <div class="row">
                <div class="col-lg-8">

                    <div class="gaming-library">
                        <div>
                            <div class="heading-section">
                                <h4><em></em> Обсуждение</h4>
                            </div>

                            <div class="item">
                                <div class = "article" style="position: relative">

                                    <div class="article__top">
                                        <div class="article__top-date">
                                            {{ Carbon::parse($guid->created_at)->format('d.m.Y') }}
                                        </div>
                                        <div class="article__autor">Автор: <em> {{ $guid->user->name }}</em>
                                        </div>
                                    </div>

                                    <div class="article__image">


                                        {{ $guid->getMedia('guid_prewiew')->first() }}

                                        <div class="article__title">{{ $guid->title }}</div>

                                    </div>

                                    <div class="article__footer" style="margin-bottom: 20px">


                                        <form style="display:inline" method="post" action="{{ route('like.store') }}">
                                            @csrf
                                            <input type="hidden" name="likeable_id" value = "{{ $guid->id }}">
                                            <input type="hidden" name="likeable_type" value = "guid">

                                            <button
                                                style="{{ $guid->is_liked_count > 0 ? 'color: #ec6090;' : 'color: #666;' }}font-size: 14px;position: absolute;right: 0;bottom: 15px;"
                                                type="submit" class="fa fa-heart heart">
                                                {{ $guid->likes_count }}
                                            </button>
                                        </form>
                                    </div>
                                </div>
                                <div class="post-content" style="color: white;padding:40px 20px;font-size:18px">
                                    {!! $guid->content !!}
                                </div>
                            </div>


                        </div>

                        <form action="{{ route('comment.store', $guid->id) }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="form-group col-12" data-aos="fade-up">
                                    @error('content')
                                        <p class = "text-danger flex justify-center">{{ $message }}</p>
                                    @enderror

                                    <label for="comment" class="sr-only">Ваш коментарий...</label>
                                    <textarea style = "height:100px;margin-bottom:15px;color: white;background-color:rgb(51, 51, 51)" name="content"
                                        id="comment" class="form-control" placeholder="Your comment" rows="10"></textarea>
                                </div>
                            </div>
                            <input type="hidden" name="commentable_id" value = "{{ $guid->id }}">
                            <input type="hidden" name="commentable_type" value = "guid">
                            <div class="col-12" data-aos="fade-up">
                                <button type="submit" class="btn"
                                    style = "color: white;background-color:rgb(64, 64, 64)">Отправить</button>
                            </div>
                        </form>

                        {{-- WARNING! WARNING! СТРАШНАЯ ФИГНЯ НЕ СМОТРЕТЬ!! ОПАСНО ДЛЯ ГЛАЗ! --}}
                        <div class="gaming-library">
                            <div>
                                @foreach ($comments as $comment)
                                    <div class="item">
                                        <ul>
                                            <li>
                                                @if ($comment->user->getMedia('avatar')->first())
                                                    <div class = "post-preview-user">
                                                        {{ $comment->user->getMedia('avatar')->first() }}</div>
                                                @else
                                                    <img src="{{ asset('assets/images/default.png') }}" alt=""
                                                        class="templatemo-item">
                                                @endif

                                                <span>{{ $comment->user->name }}
                                                </span>
                                            </li>
                                            <li class = "title-card">
                                                <h4>{{ $comment->content }}</h4>
                                                <span> {{ Carbon::parse($comment->created_at)->diffForHumans() }}
                                                </span>
                                            </li>


                                            <li style="position: relative">
                                                <button onclick="commentFormGenerate({{ $comment->id }})"
                                                    onmouseover="this.style.color='#999';"
                                                    onmouseout="this.style.color='white';"
                                                    id="commentButton{{ $comment->id }}"
                                                    style = "color: white;">Ответить</button>
                                                <form style="display:inline" method="post"
                                                    action="{{ route('like.store') }}">
                                                    @csrf
                                                    <input type="hidden" name="likeable_id" value = "{{ $comment->id }}">
                                                    <input type="hidden" name="likeable_type" value = "comment">

                                                    <button
                                                        style="{{ $comment->is_liked_count > 0 ? 'color: #ec6090;' : 'color: #666;' }}font-size: 14px;position: absolute;right: 0;bottom: 5px;"
                                                        type="submit"
                                                        class="fa fa-heart heart">{{ $comment->likes_count }}
                                                    </button>
                                                </form>
                                            </li>
                                        </ul>
                                        <form style="display: none" id='comment{{ $comment->id }}'
                                            action="{{ route('comment.store', $comment->id) }}" method="post">
                                            @csrf
                                            <div class="row">
                                                <div class="form-group col-12" data-aos="fade-up">
                                                    @error('content')
                                                        <p class = "text-danger flex justify-center">
                                                            {{ $message }}</p>
                                                    @enderror

                                                    <label for="comment" class="sr-only">Ваш коментарий...</label>
                                                    <textarea style = "height:100px;margin-bottom:15px;color: white;background-color:rgb(51, 51, 51)" name="content"
                                                        id="comment" class="form-control" placeholder="Your comment" rows="10"></textarea>
                                                </div>
                                            </div>
                                            <input type="hidden" name="commentable_id" value = "{{ $comment->id }}">
                                            <input type="hidden" name="commentable_type" value = "comment">
                                            <div class="col-12" data-aos="fade-up">
                                                <button type="submit" class="btn"
                                                    style = "color: white;background-color:rgb(64, 64, 64)">Ответить</button>
                                            </div>
                                        </form>
                                    </div>
                                    @if ($comment->comments->count() > 0)
                                        @foreach ($comment->comments as $comment)
                                            <div style="padding-left:20px;border-left:1px solid white" class="item">
                                                <ul>
                                                    <li class = "post-preview-user">
                                                        @if ($comment->user->getMedia('avatar')->first())
                                                            <div class = "post-preview-user">
                                                                {{ $comment->user->getMedia('avatar')->first() }}</div>
                                                        @else
                                                            <img src="{{ asset('assets/images/default.png') }}"
                                                                alt="" class="">
                                                        @endif

                                                        <span>{{ $comment->user->name }}
                                                        </span>
                                                    </li>
                                                    <li class = "title-card">
                                                        <h4>{{ $comment->content }}</h4>
                                                        <span>
                                                            {{ Carbon::parse($comment->created_at)->diffForHumans() }}
                                                        </span>

                                                    </li>


                                                    <li style="position: relative">
                                                        <button onclick="commentFormGenerate({{ $comment->id }})"
                                                            onmouseover="this.style.color='#999';"
                                                            onmouseout="this.style.color='white';"
                                                            id="commentButton{{ $comment->id }}"
                                                            style = "color: white;">Ответить</button>
                                                        <form style="display:inline" method="post"
                                                            action="{{ route('like.store') }}">
                                                            @csrf
                                                            <input type="hidden" name="likeable_id"
                                                                value = "{{ $comment->id }}">
                                                            <input type="hidden" name="likeable_type" value = "comment">

                                                            <button
                                                                style="{{ $comment->is_liked_count > 0 ? 'color: #ec6090;' : 'color: #666;' }}font-size: 14px;position: absolute;right: 0;bottom: 5px;"
                                                                type="submit"
                                                                class="fa fa-heart heart">{{ $comment->likes_count }}
                                                            </button>
                                                        </form>
                                                    </li>
                                                </ul>
                                                <form style="display: none" id='comment{{ $comment->id }}'
                                                    action="{{ route('comment.store', $comment->id) }}" method="post">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="form-group col-12" data-aos="fade-up">
                                                            @error('content')
                                                                <p class = "text-danger flex justify-center">
                                                                    {{ $message }}</p>
                                                            @enderror

                                                            <label for="comment" class="sr-only">Ваш
                                                                коментарий...</label>
                                                            <textarea style = "height:100px;margin-bottom:15px;color: white;background-color:rgb(51, 51, 51)" name="content"
                                                                id="comment" class="form-control" placeholder="Your comment" rows="10"></textarea>
                                                        </div>
                                                    </div>
                                                    <input type="hidden" name="commentable_id"
                                                        value = "{{ $comment->id }}">
                                                    <input type="hidden" name="commentable_type" value = "comment">
                                                    <div class="col-12" data-aos="fade-up">
                                                        <button type="submit" class="btn"
                                                            style = "color: white;background-color:rgb(64, 64, 64)">Ответить</button>
                                                    </div>
                                                </form>
                                            </div>
                                            @if ($comment->comments->count() > 0)
                                                @foreach ($comment->comments as $comment)
                                                    <div style="padding-left:20px;margin-left:20px;border-left:1px solid white"
                                                        class="item">
                                                        <ul>
                                                            <li style="width:100px" class = "post-preview-user">
                                                                @if ($comment->user->getMedia('avatar')->first())
                                                                    <div class = "post-preview-user">
                                                                        {{ $comment->user->getMedia('avatar')->first() }}
                                                                    </div>
                                                                @else
                                                                    <img src="{{ asset('assets/images/default.png') }}"
                                                                        alt="" class="">
                                                                @endif
                                                                <span>{{ $comment->user->name }}
                                                                </span>
                                                            </li>
                                                            <li class = "title-card">
                                                                <h4>{{ $comment->content }}</h4>
                                                                <span>
                                                                    {{ Carbon::parse($comment->created_at)->diffForHumans() }}
                                                                </span>

                                                            </li>


                                                            <li style="position: relative">

                                                                <form style="display:inline" method="post"
                                                                    action="{{ route('like.store') }}">
                                                                    @csrf
                                                                    <input type="hidden" name="likeable_id"
                                                                        value = "{{ $comment->id }}">
                                                                    <input type="hidden" name="likeable_type"
                                                                        value = "comment">

                                                                    <button
                                                                        style="{{ $comment->is_liked_count > 0 ? 'color: #ec6090;' : 'color: #666;' }}font-size: 14px;position: absolute;right: 0;bottom: 5px;"
                                                                        type="submit"
                                                                        class="fa fa-heart heart">{{ $comment->likes_count }}
                                                                    </button>
                                                                </form>
                                                            </li>
                                                        </ul>

                                                    </div>
                                                @endforeach
                                            @endif
                                        @endforeach
                                    @endif
                                @endforeach
                                <div>
                                    {{ $comments->withPath("{$guid->id}")->links() }}
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-lg-4">
                    <div class="top-downloaded">
                        <div class="heading-section">
                            <h4 class = "col-lg-4">Смотрите <em>Также </em></h4>
                        </div>
                        <ul>
                            @foreach ($relatedPosts as $article)
                                <a href="{{ route('article.show', $article->id) }}" class = "article"
                                    style="position: relative">

                                    <div class="article__top">
                                        <div class="article__top-date" style = "font-size:14px">
                                            {{ Carbon::parse($article->created_at)->format('d.m.Y') }}
                                        </div>
                                        <div style = "font-size:14px" class="article__autor">Автор: <em>
                                                {{ $article->user->name }}</em>
                                        </div>
                                    </div>

                                    <div class="article__image" style = "max-height: 200px">


                                        {{ $article->getMedia('article_prewiew')->first() }}

                                        <div class="article__title" style = "font-size:14px;max-width:350px">
                                            {{ $article->title }}</div>

                                    </div>

                                    <div class="article__footer">


                                    </div>
                                </a>
                            @endforeach

                        </ul>

                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection
