@extends('layouts.app')
@section('content')
    <script>
        function updatePreview(input, target) {
            let btn = document.getElementById('btn-for-upload');
            let file = input.files[0];
            let reader = new FileReader();

            reader.readAsDataURL(file);
            reader.onload = function() {
                let img = document.getElementById(target);
                // can also use "this.result"
                img.src = reader.result;
            }
            btn.style.display = 'block'
        }


        tinymce.init({
            selector: '#mytextarea',
            skin: 'oxide-dark',
            content_css: 'dark'

        });
    </script>


    <div class="container">
        <div class="page-content">


            <div class="row">
                <div class = "col-lg-2">

                </div>
                <div class="col-lg-8">
                    <div class="heading-section">
                        <h4><em>Создание</em> новости</h4>
                    </div>
                    <img id="prewiew_image" class = "article_image" src="{{ asset('assets/images/noimage.jpg') }}"
                        alt="1">
                    <form action="{{ route('article.store') }}" method="post" enctype="multipart/form-data">
                        @csrf


                        <input type="hidden" name="imageable_type" value = "article">
                        <input onchange="updatePreview(this, 'prewiew_image')" id = "input__file" class = "image-input"
                            name="article_image" type="file">


                        <label class = "label-image_2" for="input__file"><img class="input__file-icon"
                                src="{{ asset('assets/images/downicon.svg') }}" alt="Выбрать файл" width="45"></label>

                        <div class="row">
                            <div class="form-group col-12" data-aos="fade-up">
                                @error('title')
                                    <p class = "text-danger flex justify-center">{{ $message }}</p>
                                @enderror

                                <label for="title" class="sr-only">Заголовок</label>
                                <input name="title"
                                    style = "margin-bottom:15px;color: white;background-color:rgb(51, 51, 51)"
                                    name="content" id="title" class="form-control"
                                    placeholder="Заголовок новости"></input>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-12" data-aos="fade-up">
                                @error('content')
                                    <p class = "text-danger flex justify-center">{{ $message }}</p>
                                @enderror

                                <label for="comment" class="sr-only">Ваш коментарий...</label>
                                <textarea id="mytextarea" style = "height:100px;margin-bottom:15px;color: white;background-color:rgb(51, 51, 51)"
                                    name="content" id="comment" class="form-control" placeholder="Контентная часть" rows="10"></textarea>
                            </div>
                        </div>
                        <div class="col-12" data-aos="fade-up" style = "text-align: center">
                            <button type="submit" class="btn"
                                style = "color: white;background-color:rgb(64, 64, 64);padding:20px 65px;font-size:22px;margin-top:20px">Создать</button>
                        </div>
                    </form>
                </div>
                <div class = "col-lg-2">

                </div>
            </div>

        </div>
    </div>
@endsection
