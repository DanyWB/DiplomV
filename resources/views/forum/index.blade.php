@extends('layouts.app')
@section('content')
    @php
        use Illuminate\Support\Carbon;
        $department_id = $_GET['department_id'] ?? '';
        $category_id = $_GET['category_id'] ?? '';
    @endphp
    <div class="container">
        <div class="page-content">
            <div class="row">
                <div class="col-lg-12 ">
                    <div class="heading-section">
                        <div style = "margin-bottom: 50px;" class="row" style="flex-direction: row;">
                            <h4 @if ($department_id == 1) style="text-decoration:underline;" @endif
                                class = "col-lg-4"><a href="{{ route('forum.index', ['department_id' => '1']) }}">Обсуждение
                                    <em>Форума </em></a></h4>
                            <h4 @if ($department_id == 2) style="text-decoration:underline;" @endif
                                class = "col-lg-4"><a href="{{ route('forum.index', ['department_id' => '2']) }}">Обсуждение
                                    <em>Игр </em></a></h4>
                            <h4 @if ($department_id == 3) style="text-decoration:underline;" @endif
                                class = "col-lg-4"><a href="{{ route('forum.index', ['department_id' => '3']) }}">Обсуждение
                                    <em>Всего </em></a></h4>
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
                            <div class="heading-section">
                                <h4><em></em> Темы</h4>
                            </div>



                            @foreach ($posts as $post)
                                <div class="item">
                                    <ul style="position: relative">
                                        <li><img src="assets/images/game-02.jpg" alt=""
                                                class="templatemo-item"><span></span></li>
                                        <li class = "title-card">
                                            <h4>{{ $post->title }}</h4>
                                            <span>{{ Carbon::parse($post->created_at)->toDateString() }}</span>
                                            <form style="display:inline" method="post" action="{{ route('like.store') }}">
                                                @csrf
                                                <input type="hidden" name="likeable_id" value = "{{ $post->id }}">
                                                <input type="hidden" name="likeable_type" value = "post">
                                                <button
                                                    style="color: #666;font-size: 14px;position: absolute;right: 0;bottom: 5px;"
                                                    type="submit" class="fa fa-heart heart e">1 </button>
                                            </form>


                                        </li>


                                        <li>
                                            <div class="main-border-button"><a style="margin-bottom: 15px;"
                                                    href="{{ route('forum.show', $post->id) }}">Обсуждать</a></div>
                                        </li>
                                    </ul>
                                </div>
                            @endforeach



                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="top-downloaded">
                        <div class="heading-section">
                            <h4 class = "col-lg-4">Популярные <em>Обсуждения </em></h4>
                        </div>
                        <ul>
                            <li>
                                <img src="assets/images/game-01.jpg" alt="" class="templatemo-item"
                                    style = "width:200px !important;">
                                <h4>Lorem ipsum, dolor sit amet consectetur adipisicing.</h4>
                                <h6>22/02/23</h6>

                                <span><i class="fa fa-heart" style="color: #ec6090;"></i> 22</span>
                                <div class="download">
                                    <a href="#"><i class="fa fa-arrow-right"></i></a>
                                </div>
                            </li>
                            <li>
                                <img src="assets/images/game-01.jpg" alt="" class="templatemo-item"
                                    style = "width:200px !important;">
                                <h4>Lorem ipsum, dolor sit amet consectetur adipisicing.</h4>
                                <h6>22/02/23</h6>

                                <span><i class="fa fa-heart" style="color: #ec6090;"></i> 22</span>
                                <div class="download">
                                    <a href="#"><i class="fa fa-arrow-right"></i></a>
                                </div>
                            </li>
                            <li>
                                <img src="assets/images/game-01.jpg" alt="" class="templatemo-item"
                                    style = "width:200px !important;">
                                <h4>Lorem ipsum, dolor sit amet consectetur adipisicing.</h4>
                                <h6>22/02/23</h6>

                                <span><i class="fa fa-heart" style="color: #ec6090;"></i> 22</span>
                                <div class="download">
                                    <a href="#"><i class="fa fa-arrow-right"></i></a>
                                </div>
                            </li>
                        </ul>

                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection
