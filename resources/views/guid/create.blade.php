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
                        <h4><em>Создание</em> Руководства</h4>
                    </div>
                    <img id="prewiew_image" class = "article_image" src="{{ asset('assets/images/noimage.jpg') }}"
                        alt="1">
                    <form action="{{ route('guid.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="imageable_type" value = "guid">
                        <input onchange="updatePreview(this, 'prewiew_image')" id = "input__file" class = "image-input"
                            name="guid_image" type="file">


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
                        <select name = "game_id"
                            style="margin:30px 0;background-color: rgb(48, 48, 48);color:rgb(186, 185, 185)"
                            class="form-control"" aria-label="Пример выбора по умолчанию">
                            <option disabled selected>Выберите игру</option>
                            @foreach ($games as $game)
                                <option {{ old('game_id') == $game->id ? 'selected' : '' }} value="{{ $game->id }}">
                                    {{ $game->title }}</option>
                            @endforeach
                            @error('game_id')
                                <p class = "text-red-600 text-danger">{{ $message }}</p>
                            @enderror
                        </select>
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
