@extends('layouts.app')
@section('content')
    @php
        $article_category_id = $_GET['article_category_id'] ?? '';
        use Illuminate\Support\Carbon;
    @endphp

    <div class="container">
        <div class="page-content">

            <!-- ***** Banner Start ***** -->
            <div class="main-banner mb-5">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="header-text">
                            <h6>Смотри <em>самые свежие</em> новости</h6>
                            <h4>Прямо тут ↓</h4><br>
                            <div class="main-button">
                                < </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ***** Banner End ***** -->
                <div class="row">

                    <div class="col-lg-9">
                        <div class = "nav-list">
                            <div class="nav-list-ul">
                                <li @if ($article_category_id == 1) style="background-color:rgb(64, 64, 64);" @endif
                                    class = "nav-list-li">
                                    <a href="{{ route('article.index', ['article_category_id' => '1']) }}"
                                        class="nav-list-a">Новые</a>
                                </li>
                                <li @if ($article_category_id == 2) style="background-color:rgb(64, 64, 64);" @endif
                                    class = "nav-list-li">
                                    <a href="{{ route('article.index', ['article_category_id' => '2']) }}"
                                        class="nav-list-a">Популярные</a>
                                </li>
                                <li @if ($article_category_id == 3) style="background-color:rgb(64, 64, 64);" @endif
                                    class = "nav-list-li">
                                    <a href="{{ route('article.index', ['article_category_id' => '3']) }}"
                                        class="nav-list-a">Обсуждаемые</a>
                                </li>
                            </div>
                        </div>
                        <div class="gaming-library">
                            <div>
                                <div style="display: flex;justify-content:space-between" class="heading-section">
                                    <h4><em></em> Новости</h4>

                                    <a href="{{ route('article.create') }}" onmouseover="this.style.color='#999';"
                                        onmouseout="this.style.color='white';" id="postCreateButton"
                                        style = "color: white;">Создать новость</a>

                                </div>
                                <div>
                                    <form class = "form-guid" method="get" autocomplete="off"
                                        action="{{ route('article.index') }}">
                                        <div class="" style="width:300px;">
                                            <input class= "input-guid" id="article_content" type="text"
                                                name="article_content" placeholder="Ищу...">
                                        </div>
                                        <input class = "search-guid" type="submit" value="Найти">
                                    </form>
                                </div>
                                @foreach ($articles as $article)
                                    <div class="item">
                                        <div class = "article" style="position: relative">

                                            <div class="article__top">
                                                <div class="article__top-date">
                                                    {{ Carbon::parse($article->created_at)->format('d.m.Y') }}
                                                </div>
                                                <div class="article__autor">Автор: <em> {{ $article->user->name }}</em>
                                                </div>
                                            </div>

                                            <div class="article__image">


                                                {{ $article->getMedia('article_prewiew')->first() }}

                                                <div class="article__title">{{ $article->title }}</div>

                                            </div>

                                            <div class="article__footer">
                                                <div class="main-border-button"><a style="margin-bottom: 15px;"
                                                        href="{{ route('article.show', $article->id) }}">Смотреть</a>
                                                </div>

                                                <form style="" method="post" action="{{ route('like.store') }}">
                                                    @csrf
                                                    <input type="hidden" name="likeable_id" value = "{{ $article->id }}">
                                                    <input type="hidden" name="likeable_type" value = "article">

                                                    <button
                                                        style="{{ $article->is_liked_count > 0 ? 'color: #ec6090;' : 'color: #666;' }}font-size: 14px;margin-left:15px"
                                                        type="submit" class="fa fa-heart heart">
                                                        {{ $article->likes_count }}
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                @if ($articles->count() < 1)
                                    <div style="font-size:26px; text-align: center;color:rgb(130, 130, 130)">
                                        <p>Новостей нет</p>
                                    </div>
                                @endif
                                <div>
                                    {{ $articles->withQueryString()->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="top-downloaded">
                            <div class="heading-section">
                                <h4 style = "font-size:20px;" class = "col-lg-4">Новые <em>Обсуждения </em></h4>
                            </div>
                            <ul>
                                @foreach ($relatedPosts as $post)
                                    <li>
                                        <div style = "display: flex;justify-content:space-between;align-items:center">
                                            @if ($post->user->getMedia('avatar')->first())
                                                <div class = "post-preview-user-min">
                                                    {{ $post->user->getMedia('avatar')->first() }}</div>
                                            @else
                                                <img src="{{ asset('assets/images/default.png') }}" alt=""
                                                    class="templatemo-item">
                                            @endif
                                            <span style="margin-right:15px;color:rgb(219, 219, 219)">
                                                {{ $post->user->name }}
                                            </span>
                                        </div>
                                        <h4>{{ $post->title }}</h4>
                                        <h6 style="font-size:12px">{{ Carbon::parse($post->created_at)->toDateString() }}
                                        </h6>
                                        <span><i class="fa fa-heart" style="color: #ec6090;"></i>
                                            {{ $post->likes_count }}</span>
                                        <div class="download">
                                            <a href="{{ route('forum.show', $post->id) }}"><i
                                                    class="fa fa-arrow-right"></i></a>
                                        </div>
                                    </li>
                                @endforeach


                            </ul>

                        </div>
                    </div>

                </div>

            </div>
        </div>
    @endsection
