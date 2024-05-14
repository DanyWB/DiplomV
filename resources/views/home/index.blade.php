@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-content">


                    <!-- ***** Banner Start ***** -->
                    <div class="main-banner mb-5">
                        <div class="row">
                            <div class="col-lg-7">
                                <div class="header-text">
                                    <h6>Добро пожаловать на форум</h6>
                                    <h4>задай <em>любой</em> вопрос здесь</h4><br>
                                    <div class="main-button">
                                        <a href="browse.html">Поехали!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ***** Banner End ***** -->


                    {{-- slider --}}
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="featured-games header-text">
                                <div class="heading-section">
                                    <h4><em>ПОПУЛЯРНЫЕ</em> Новости</h4>
                                </div>
                                <div class="owl-features owl-carousel">
                                    <div class="item">
                                        <div class="thumb">
                                            <img src="assets/images/featured-01.jpg" alt="">
                                            <div class="hover-effect">
                                                <h6>2.4K Streaming</h6>
                                            </div>
                                        </div>
                                        <h4>CS-GO<br><span>249K Downloads</span></h4>
                                        <ul>
                                            <li><i class="fa fa-star"></i> 4.8</li>
                                            <li><i class="fa fa-download"></i> 2.3M</li>
                                        </ul>
                                    </div>
                                    <div class="item">
                                        <div class="thumb">
                                            <img src="assets/images/featured-02.jpg" alt="">
                                            <div class="hover-effect">
                                                <h6>2.4K Streaming</h6>
                                            </div>
                                        </div>
                                        <h4>Gamezer<br><span>249K Downloads</span></h4>
                                        <ul>
                                            <li><i class="fa fa-star"></i> 4.8</li>
                                            <li><i class="fa fa-download"></i> 2.3M</li>
                                        </ul>
                                    </div>
                                    <div class="item">
                                        <div class="thumb">
                                            <img src="assets/images/featured-03.jpg" alt="">
                                            <div class="hover-effect">
                                                <h6>2.4K Streaming</h6>
                                            </div>
                                        </div>
                                        <h4>Island Rusty<br><span>249K Downloads</span></h4>
                                        <ul>
                                            <li><i class="fa fa-star"></i> 4.8</li>
                                            <li><i class="fa fa-download"></i> 2.3M</li>
                                        </ul>
                                    </div>
                                    <div class="item">
                                        <div class="thumb">
                                            <img src="assets/images/featured-01.jpg" alt="">
                                            <div class="hover-effect">
                                                <h6>2.4K Streaming</h6>
                                            </div>
                                        </div>
                                        <h4>CS-GO<br><span>249K Downloads</span></h4>
                                        <ul>
                                            <li><i class="fa fa-star"></i> 4.8</li>
                                            <li><i class="fa fa-download"></i> 2.3M</li>
                                        </ul>
                                    </div>
                                    <div class="item">
                                        <div class="thumb">
                                            <img src="assets/images/featured-02.jpg" alt="">
                                            <div class="hover-effect">
                                                <h6>2.4K Streaming</h6>
                                            </div>
                                        </div>
                                        <h4>Gamezer<br><span>249K Downloads</span></h4>
                                        <ul>
                                            <li><i class="fa fa-star"></i> 4.8</li>
                                            <li><i class="fa fa-download"></i> 2.3M</li>
                                        </ul>
                                    </div>
                                    <div class="item">
                                        <div class="thumb">
                                            <img src="assets/images/featured-03.jpg" alt="">
                                            <div class="hover-effect">
                                                <h6>2.4K Streaming</h6>
                                            </div>
                                        </div>
                                        <h4>Island Rusty<br><span>249K Downloads</span></h4>
                                        <ul>
                                            <li><i class="fa fa-star"></i> 4.8</li>
                                            <li><i class="fa fa-download"></i> 2.3M</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="top-downloaded">
                                <div class="heading-section">
                                    <h4><em>ТОП</em> Игр форума </h4>
                                </div>
                                <ul>
                                    <li>
                                        <img src="assets/images/game-01.jpg" alt="" class="templatemo-item">
                                        <h4>Fortnite</h4>
                                        <h6>Sandbox</h6>
                                        <span><i class="fa fa-star" style="color: yellow;"></i> 4.9</span>
                                        <span><i class="fa fa-download" style="color: #ec6090;"></i> 2.2M</span>
                                        <div class="download">
                                            <a href="#"><i class="fa fa-arrow-right"></i></a>
                                        </div>
                                    </li>
                                    <li>
                                        <img src="assets/images/game-01.jpg" alt="" class="templatemo-item">
                                        <h4>Fortnite</h4>
                                        <h6>Sandbox</h6>
                                        <span><i class="fa fa-star" style="color: yellow;"></i> 4.9</span>
                                        <span><i class="fa fa-download" style="color: #ec6090;"></i> 2.2M</span>
                                        <div class="download">
                                            <a href="#"><i class="fa fa-arrow-right"></i></a>
                                        </div>
                                    </li>
                                    <li>
                                        <img src="assets/images/game-01.jpg" alt="" class="templatemo-item">
                                        <h4>Fortnite</h4>
                                        <h6>Sandbox</h6>
                                        <span><i class="fa fa-star" style="color: yellow;"></i> 4.9</span>
                                        <span><i class="fa fa-download" style="color: #ec6090;"></i> 2.2M</span>
                                        <div class="download">
                                            <a href="#"><i class="fa fa-arrow-right"></i></a>
                                        </div>
                                    </li>
                                    <li>
                                        <img src="assets/images/game-01.jpg" alt="" class="templatemo-item">
                                        <h4>Fortnite</h4>
                                        <h6>Sandbox</h6>
                                        <span><i class="fa fa-star" style="color: yellow;"></i> 4.9</span>
                                        <span><i class="fa fa-download" style="color: #ec6090;"></i> 2.2M</span>
                                        <div class="download">
                                            <a href="#"><i class="fa fa-arrow-right"></i></a>
                                        </div>
                                    </li>
                                </ul>
                                <div class="text-button">
                                    <a href="profile.html">Все игры <i class="fa fa-arrow-right pl-3 "></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="start-stream">
                        <div class="col-lg-12">
                            <div class="heading-section">
                                <h4><em>Что ты можешь</em> тут найти?</h4>
                            </div>
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="item">
                                        <div class="icon">
                                            <img src="assets/images/service-01.jpg" alt=""
                                                style="max-width: 60px; border-radius: 50%;">
                                        </div>
                                        <h4>Все популярные игры</h4>
                                        <p>На нашем форуме ты найдешь абсолютно любую игру!</p>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="item">
                                        <div class="icon">
                                            <img src="assets/images/service-02.jpg" alt=""
                                                style="max-width: 60px; border-radius: 50%;">
                                        </div>
                                        <h4>Гайды от опытных игроков</h4>
                                        <p>Испытываешь трудности с прохождением? Мы не оставим тебя в
                                            беде!</p>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="item">
                                        <div class="icon">
                                            <img src="assets/images/service-03.jpg" alt=""
                                                style="max-width: 60px; border-radius: 50%;">
                                        </div>
                                        <h4>Сообщество таких же игроков</h4>
                                        <p>Здесь ты получишь не только помощь, но и друзей!</p>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="main-button">
                                        <a href="profile.html">Вперед!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ***** Most Popular Start ***** -->
                    <div class="most-popular">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="heading-section">
                                    <h4><em>Как пройти?</em> Гайды в помощь</h4>
                                </div>
                                <div class="row">
                                    <a href = "#" class="col-lg-3 col-sm-6">
                                        <div class="item">
                                            <img src="assets/images/popular-01.jpg" alt="">
                                            <h4>Fortnite<br><span>Руководство по сюжетке</span></h4>
                                            <ul>
                                                <li><i class="fa fa-heart"></i> 4.8</li>
                                                <li><i class="fa fa-comment"></i> 2.3M</li>
                                            </ul>
                                        </div>
                                    </a>
                                    <a href = "#" class="col-lg-3 col-sm-6">
                                        <div class="item">
                                            <img src="assets/images/popular-01.jpg" alt="">
                                            <h4>Fortnite<br><span>Руководство по сюжетке</span></h4>
                                            <ul>
                                                <li><i class="fa fa-heart"></i> 4.8</li>
                                                <li><i class="fa fa-comment"></i> 2.3M</li>
                                            </ul>
                                        </div>
                                    </a>
                                    <a href = "#" class="col-lg-3 col-sm-6">
                                        <div class="item">
                                            <img src="assets/images/popular-01.jpg" alt="">
                                            <h4>Fortnite<br><span>Руководство по сюжетке</span></h4>
                                            <ul>
                                                <li><i class="fa fa-heart"></i> 4.8</li>
                                                <li><i class="fa fa-comment"></i> 2.3M</li>
                                            </ul>
                                        </div>
                                    </a>
                                    <a href = "#" class="col-lg-3 col-sm-6">
                                        <div class="item">
                                            <img src="assets/images/popular-01.jpg" alt="">
                                            <h4>Fortnite<br><span>Руководство по сюжетке</span></h4>
                                            <ul>
                                                <li><i class="fa fa-heart"></i> 4.8</li>
                                                <li><i class="fa fa-comment"></i> 2.3M</li>
                                            </ul>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ***** Most Popular End ***** -->

                    <div class="faq-container">
                        <div class="heading-section">
                            <h4><em>Частые</em> вопросы</h4>
                        </div>
                        <ul class="faq-list">
                            <li class = "faq-list-li">
                                <button class="question"><span class = 'answer-pink'> Как</span>
                                    зарегестрироваться?</button>
                                <div class="answer">Для Регистрации необходимо сделать то и то.</div>

                            </li>
                            <li class = "faq-list-li">
                                <button class="question"><span class = 'answer-pink'> Как</span> создать вопрос?</button>
                                <div class="answer">Для того чтобы создать вопрос необходимо сделать то и то.</div>
                            </li>
                            <li class = "faq-list-li">
                                <button class="question"><span class = 'answer-pink'> Как</span> написать
                                    новость?</button>
                                <div class="answer">Для того чтобы создать новость необходимо сделать то и то.</div>
                            </li>
                            <li class = "faq-list-li">
                                <button class="question"><span class = 'answer-pink'> Как</span> мне оставить комментарий
                                    на
                                    руководство?</button>
                                <div class="answer">Для того чтобы оставить свой комментарий вам необходимо сделать то и
                                    то.</div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
