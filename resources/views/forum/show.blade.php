@extends('layouts.app')
@section('content')
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
                                <ul>
                                    <li><img src="assets/images/game-02.jpg" alt="" class="templatemo-item"><span>Name
                                        </span></li>
                                    <li class = "title-card">
                                        <h4>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dolor?</h4>
                                        <span>22/06/2036 </span>



                                    </li>


                                    <li>
                                        <span class="fa fa-heart heart e">15 </span>
                                    </li>
                                </ul>
                                <div class="post-content" style="color: white;padding:40px 20px;">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis unde culpa, suscipit
                                    consequatur illo nam enim aut, fugit repudiandae, itaque assumenda. Provident, odio
                                    temporibus? Distinctio dignissimos illo non alias consequuntur laboriosam itaque magnam,
                                    vero et, eaque eveniet at repellat aliquid beatae vitae voluptatibus aspernatur ipsum,
                                    suscipit ipsam autem provident ex?
                                </div>
                            </div>


                        </div>

                        <form action="{{ route('comment.store', 1) }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="form-group col-12" data-aos="fade-up">
                                    <label for="comment" class="sr-only">Ваш коментарий...</label>
                                    <textarea style = "height:100px;margin-bottom:15px;color: white;background-color:rgb(51, 51, 51)" name="content"
                                        id="comment" class="form-control" placeholder="Your comment" rows="10"></textarea>
                                </div>
                            </div>
                            <input type="hidden" name="commentable_id" value = "{{ $post->id }}">
                            <input type="hidden" name="commentable_type" value = "post">
                            <div class="col-12" data-aos="fade-up">
                                <button type="submit" class="btn"
                                    style = "color: white;background-color:rgb(64, 64, 64)">Отправить</button>
                            </div>
                        </form>
                        <div class="gaming-library">
                            <div>

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

                                        </li>
                                    </ul>
                                </div>


                            </div>
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
