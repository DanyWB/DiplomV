@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="page-content">
            <div class="row">
                <div class="col-lg-12 ">
                    <div class="heading-section">
                        <div style = "margin-bottom: 50px;" class="row" style="flex-direction: row;">
                            <h4 class = "col-lg-4"><a href="#">Обсуждение <em>Форума </em></a></h4>
                            <h4 class = "col-lg-4"><a href="#">Обсуждение <em>Игр </em></a></h4>
                            <h4 class = "col-lg-4"><a href="#">Обсуждение <em>Всего </em></a></h4>
                        </div>
                    </div>

                </div>
            </div>

            <div class="row">
                <div class="col-lg-8">
                    <div class = "nav-list">
                        <div class="nav-list-ul">
                            <li class = "nav-list-li">
                                <a href="#" class="nav-list-a">Общие вопросы</a>
                            </li>
                            <li class = "nav-list-li">
                                <a href="#" class="nav-list-a">Тех. проблемы</a>
                            </li>
                            <li class = "nav-list-li">
                                <a href="#" class="nav-list-a">Вопросы по прохождению</a>
                            </li>
                        </div>
                    </div>
                    <div class="gaming-library">
                        <div>
                            <div class="heading-section">
                                <h4><em></em> Темы</h4>
                            </div>

                            <div class="item">
                                <ul>
                                    <li><img src="assets/images/game-02.jpg" alt=""
                                            class="templatemo-item"><span>Name </span></li>
                                    <li class = "title-card">
                                        <h4>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dolor?</h4>
                                        <span>22/06/2036 </span>
                                        <span class="fa fa-heart heart e">15 </span>


                                    </li>


                                    <li>
                                        <div class="main-border-button"><a href="#">Обсуждать</a></div>
                                    </li>
                                </ul>
                            </div>
                            <div class="item">
                                <ul>
                                    <li><img src="assets/images/game-02.jpg" alt=""
                                            class="templatemo-item"><span>Name </span></li>
                                    <li class = "title-card">
                                        <h4>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dolor?</h4>
                                        <span>22/06/2036 </span>
                                        <span class="fa fa-heart heart e">15 </span>


                                    </li>


                                    <li>
                                        <div class="main-border-button"><a href="#">Обсуждать</a></div>
                                    </li>
                                </ul>
                            </div>
                            <div class="item">
                                <ul>
                                    <li><img src="assets/images/game-02.jpg" alt=""
                                            class="templatemo-item"><span>Name </span></li>
                                    <li class = "title-card">
                                        <h4>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dolor?</h4>
                                        <span>22/06/2036 </span>
                                        <span class="fa fa-heart heart e">15 </span>


                                    </li>


                                    <li>
                                        <div class="main-border-button"><a href="#">Обсуждать</a></div>
                                    </li>
                                </ul>
                            </div>
                            <div class="item">
                                <ul>
                                    <li><img src="assets/images/game-02.jpg" alt=""
                                            class="templatemo-item"><span>Name </span></li>
                                    <li class = "title-card">
                                        <h4>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dolor?</h4>
                                        <span>22/06/2036 </span>
                                        <span class="fa fa-heart heart e">15 </span>


                                    </li>


                                    <li>
                                        <div class="main-border-button"><a href="#">Обсуждать</a></div>
                                    </li>
                                </ul>
                            </div>
                            {{-- <div class="item last-item">
                                <ul>
                                    <li><img src="assets/images/game-03.jpg" alt="" class="templatemo-item"></li>
                                    <li>
                                        <h4>CS-GO</h4><span>Sandbox</span>
                                    </li>
                                    <li>
                                        <h4>Date Added</h4><span>21/04/2036</span>
                                    </li>
                                    <li>
                                        <h4>Hours Played</h4><span>892 H 14 Mins</span>
                                    </li>
                                    <li>
                                        <h4>Currently</h4><span>Downloaded</span>
                                    </li>
                                    <li>
                                        <div class="main-border-button border-no-active"><a href="#">Donwloaded</a>
                                        </div>
                                    </li>
                                </ul>
                            </div> --}}
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
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
