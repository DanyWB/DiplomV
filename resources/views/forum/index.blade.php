@extends('layouts.app')
@section('content')
    @php
        use Illuminate\Support\Carbon;
        $department_id = $_GET['department_id'] ?? '';
        $category_id = $_GET['category_id'] ?? '';
    @endphp

    <script>
        function postFormGenerate() {
            let commentForm = document.getElementById(`postForm`);
            let commentButton = document.getElementById(`postCreateButton`);
            if (commentForm.style.display === 'none') {
                commentForm.style.display = 'block';
                commentButton.innerHTML = 'Отменить';
            } else {
                commentForm.style.display = 'none';
                commentButton.innerHTML = 'Создать тему';
            }


        }
    </script>
    <div class="container">
        <div class="page-content">
            <div class="row">
                <div class="col-lg-12 ">
                    <div class="heading-section">
                        <div style = "margin-bottom: 50px; justify-content: space-between"" class="row">
                            <div class = "col-lg-3 departnent-title {{ $department_id == 1 ? 'active' : '' }}"><a
                                    href="{{ route('forum.index', ['department_id' => '1']) }}">
                                    О форуме</a>
                                <img src="{{ asset('assets/images/1.jpg') }}" alt="">
                            </div>
                            <div class = "col-lg-3 departnent-title {{ $department_id == 2 ? 'active' : '' }}"><a
                                    href="{{ route('forum.index', ['department_id' => '2']) }}">
                                    Игры</a><img src="{{ asset('assets/images/2.jpg') }}" alt="">
                            </div>
                            <div class = "col-lg-3 departnent-title {{ $department_id == 3 ? 'active' : '' }}"><a
                                    href="{{ route('forum.index', ['department_id' => '3']) }}">
                                    Разное</a><img src="{{ asset('assets/images/3.jpg') }}" alt="">
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="row">

                <div class="col-lg-9">
                    @if ($department_id == 2)
                        <div class = "nav-list">
                            <div class="nav-list-ul">
                                <li @if ($category_id == 1) style="background-color:rgb(64, 64, 64);" @endif
                                    class = "nav-list-li">
                                    <a href="{{ route('forum.index', ['department_id' => '2', 'category_id' => '1']) }}"
                                        class="nav-list-a">Общие
                                        вопросы</a>
                                </li>
                                <li @if ($category_id == 2) style="background-color:rgb(64, 64, 64);" @endif
                                    class = "nav-list-li">
                                    <a href="{{ route('forum.index', ['department_id' => '2', 'category_id' => '2']) }}"
                                        class="nav-list-a">Тех.
                                        проблемы</a>
                                </li>
                                <li @if ($category_id == 3) style="background-color:rgb(64, 64, 64);" @endif
                                    class = "nav-list-li">
                                    <a href="{{ route('forum.index', ['department_id' => '2', 'category_id' => '3']) }}"
                                        class="nav-list-a">Вопросы по
                                        прохождению</a>
                                </li>
                            </div>
                        </div>
                    @endif
                    <div class="gaming-library">
                        <div>
                            <div style="display: flex;justify-content:space-between" class="heading-section">
                                <h4><em></em> Темы</h4>
                                @if (!empty($department_id))
                                    <button onclick="postFormGenerate()" onmouseover="this.style.color='#999';"
                                        onmouseout="this.style.color='white';" id="postCreateButton"
                                        style = "color: white;">Создать тему</button>
                                @endif
                            </div>
                            <form style="display: none" id='postForm' action="{{ route('forum.store') }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-12" data-aos="fade-up">

                                        <label for="title" class="sr-only">Загаловок</label>
                                        <textarea style = "height:20px;margin-bottom:15px;color: white;background-color:rgb(51, 51, 51)" name="title"
                                            id="title" class="form-control" placeholder="Заголовок" rows="2"></textarea>
                                        @error('title')
                                            <p class = "text-danger flex justify-center">
                                                {{ $message }}</p>
                                        @enderror
                                        <label for="comment" class="sr-only">Комментарий</label>
                                        <textarea style = "height:100px;margin-bottom:15px;color: white;background-color:rgb(51, 51, 51)" name="content"
                                            id="comment" class="form-control" placeholder="Пост" rows="4"></textarea>
                                        @error('content')
                                            <p class = "text-danger flex justify-center">
                                                {{ $message }}</p>
                                        @enderror
                                    </div>
                                    <input type="hidden" name="department_id" value = "{{ $department_id }}">
                                    <input type="hidden" name="category_id" value = "{{ $category_id }}">
                                    <div class="col-12" data-aos="fade-up">
                                        <button type="submit" class="btn"
                                            style = "color: white;background-color:rgb(64, 64, 64)">Создать пост</button>
                                    </div>
                                </div>
                            </form>
                            @if (!empty($department_id))
                                <form class = "form-guid" method="get" autocomplete="off"
                                    action="{{ route('forum.index') }}">
                                    <div class="" style="width:300px;">
                                        <input class= "input-guid" id="post_content" type="text" name="post_content"
                                            placeholder="Ищу...">
                                        <input type="hidden" name="department_id" value="{{ $department_id }}">
                                        <input type="hidden" name="category_id" value="{{ $category_id }}">
                                    </div>
                                    <input class = "search-guid" type="submit" value="Найти">
                                </form>
                            @endif

                            @foreach ($posts as $post)
                                <div class="item">
                                    <ul style="position: relative">
                                        <li>

                                            @if ($post->user->getMedia('avatar')->first())
                                                <div class = "post-preview-user">
                                                    {{ $post->user->getMedia('avatar')->first() }}</div>
                                            @else
                                                <div class = "post-preview-user">
                                                    <img src="{{ asset('assets/images/default.png') }}" alt="">
                                                </div>
                                            @endif
                                            <span></span>
                                        </li>
                                        <li class = "title-card">
                                            <h4>{{ $post->title }}</h4>
                                            <span>{{ Carbon::parse($post->created_at)->toDateString() }}</span>
                                            <form style="display:inline" method="post"
                                                action="{{ route('like.store') }}">
                                                @csrf
                                                <input type="hidden" name="likeable_id" value = "{{ $post->id }}">
                                                <input type="hidden" name="likeable_type" value = "post">

                                                <button
                                                    style="{{ $post->is_liked_count > 0 ? 'color: #ec6090;' : 'color: #666;' }}font-size: 14px;position: absolute;right: 0;bottom: 5px;"
                                                    type="submit" class="fa fa-heart heart">{{ $post->likes_count }}
                                                </button>
                                            </form>


                                        </li>


                                        <li>
                                            <div class="main-border-button"><a style="margin-bottom: 15px;"
                                                    href="{{ route('forum.show', $post->id) }}">Обсуждать</a></div>
                                        </li>
                                    </ul>
                                </div>
                            @endforeach
                            @if ($posts->count() < 1)
                                <div style="font-size:26px; text-align: center;color:rgb(130, 130, 130)">
                                    Посты не найдены(
                                </div>
                            @endif

                            <div>
                                {{ $posts->withQueryStrings()->links() }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="top-downloaded">
                        <div class="heading-section">
                            <h4 style = "font-size:20px;" class = "col-lg-4">Популярные <em>Обсуждения </em></h4>
                        </div>
                        <ul>
                            @foreach ($relatedPosts as $post)
                                <li>
                                    @if ($post->user->getMedia('avatar')->first())
                                        <div class = "post-preview-user-min">
                                            {{ $post->user->getMedia('avatar')->first() }}</div>
                                    @else
                                        <img src="{{ asset('assets/images/default.png') }}" alt=""
                                            class="templatemo-item">
                                    @endif

                                    <h4>{{ $post->title }}</h4>
                                    <h6 style="font-size:12px">{{ Carbon::parse($post->created_at)->toDateString() }}</h6>
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
