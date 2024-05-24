@extends('layouts.app')
@section('content')
    @php
        $guid_category_id = $_GET['guid_category_id'] ?? '';
        use Illuminate\Support\Carbon;

    @endphp

    <script>
        function autocomplete(inp, arr) {

            /* функция автозаполнения принимает два аргумента,
            элемент текстового поля и массив возможных значений автозаполнения: */
            var currentFocus;
            /* выполнение функции, когда кто-то пишет в текстовом поле: */
            inp.addEventListener("input", function(e) {
                var a, b, i, val = this.value;
                /* закрыть все уже открытые списки значений автозаполнения */
                closeAllLists();
                if (!val) {
                    return false;
                }
                currentFocus = -1;
                /* создайте элемент DIV, который будет содержать элементы (значения): */
                a = document.createElement("DIV");
                a.setAttribute("id", this.id + "autocomplete-list");
                a.setAttribute("class", "autocomplete-items");
                /* добавьте элемент DIV в качестве дочернего элемента контейнера автозаполнения: */
                this.parentNode.appendChild(a);
                /* для каждого элемента в массиве... */
                for (i = 0; i < arr.length; i++) {
                    /* проверьте, начинается ли элемент с тех же букв, что и значение текстового поля: */
                    if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
                        /* создайте элемент DIV для каждого соответствующего элемента: */
                        b = document.createElement("DIV");
                        /* сделайте соответствующие буквы жирным шрифтом: */
                        b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
                        b.innerHTML += arr[i].substr(val.length);
                        /* вставьте поле ввода, которое будет содержать значение текущего элемента массива: */
                        b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
                        /* выполнение функции, когда кто-то нажимает на значение элемента (элемент DIV): */
                        b.addEventListener("click", function(e) {
                            /* вставьте значение для текстового поля автозаполнения: */
                            inp.value = this.getElementsByTagName("input")[0].value;
                            /* закройте список значений автозаполнения,
                            (или любые другие открытые списки значений автозаполнения : */
                            closeAllLists();
                        });
                        a.appendChild(b);
                    }
                }
            });
            /* выполнение функции нажимает клавишу на клавиатуре: */
            inp.addEventListener("keydown", function(e) {
                var x = document.getElementById(this.id + "autocomplete-list");
                if (x) x = x.getElementsByTagName("div");
                if (e.keyCode == 40) {
                    /* Если нажата клавиша со стрелкой вниз,
                    увеличение текущей переменной фокуса: */
                    currentFocus++;
                    /* и сделать текущий элемент более видимым: */
                    addActive(x);
                } else if (e.keyCode == 38) { //вверх
                    /* Если нажата клавиша со стрелкой вверх,
                    уменьшите текущую переменную фокуса: */
                    currentFocus--;
                    /* и сделать текущий элемент более видимым: */
                    addActive(x);
                } else if (e.keyCode == 13) {
                    /* Если нажата клавиша ENTER, предотвратите отправку формы, */
                    e.preventDefault();
                    if (currentFocus > -1) {
                        /* и имитировать щелчок по элементу "active": */
                        if (x) x[currentFocus].click();
                    }
                }
            });

            function addActive(x) {
                /* функция для классификации элемента как "active": */
                if (!x) return false;
                /* начните с удаления "активного" класса для всех элементов: */
                removeActive(x);
                if (currentFocus >= x.length) currentFocus = 0;
                if (currentFocus < 0) currentFocus = (x.length - 1);
                /*добавить класса "autocomplete-active": */
                x[currentFocus].classList.add("autocomplete-active");
            }

            function removeActive(x) {
                /* функция для удаления "активного" класса из всех элементов автозаполнения: */
                for (var i = 0; i < x.length; i++) {
                    x[i].classList.remove("autocomplete-active");
                }
            }

            function closeAllLists(elmnt) {
                /* закройте все списки автозаполнения в документе,
                кроме того, который был передан в качестве аргумента: */
                var x = document.getElementsByClassName("autocomplete-items");
                for (var i = 0; i < x.length; i++) {
                    if (elmnt != x[i] && elmnt != inp) {
                        x[i].parentNode.removeChild(x[i]);
                    }
                }
            }
            /* выполнение функции, когда кто-то щелкает в документе: */
            document.addEventListener("click", function(e) {
                closeAllLists(e.target);
            });

        }
    </script>
    <div class="container">
        <div class="page-content">

            <!-- ***** Banner Start ***** -->
            <div class="main-banner mb-5">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="header-text">
                            <h6>Смотри <em>простые и понятные </em> руководства</h6>
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
                                <li @if ($guid_category_id == 1) style="background-color:rgb(64, 64, 64);" @endif
                                    class = "nav-list-li">
                                    <a href="{{ route('guid.index', ['guid_category_id' => '1']) }}"
                                        class="nav-list-a">Новые</a>
                                </li>
                                <li @if ($guid_category_id == 2) style="background-color:rgb(64, 64, 64);" @endif
                                    class = "nav-list-li">
                                    <a href="{{ route('guid.index', ['guid_category_id' => '2']) }}"
                                        class="nav-list-a">Популярные</a>
                                </li>
                                <li @if ($guid_category_id == 3) style="background-color:rgb(64, 64, 64);" @endif
                                    class = "nav-list-li">
                                    <a href="{{ route('guid.index', ['guid_category_id' => '3']) }}"
                                        class="nav-list-a">Обсуждаемые</a>
                                </li>
                            </div>
                        </div>
                        <div class="gaming-library">
                            <div>
                                <div style="display: flex;justify-content:space-between" class="heading-section">
                                    <h4><em></em> Руководства</h4>

                                    <a href="{{ route('guid.create') }}" onmouseover="this.style.color='#999';"
                                        onmouseout="this.style.color='white';" id="postCreateButton"
                                        style = "color: white;">Создать руководство</a>

                                </div>
                                <div>
                                    <form class = "form-guid" method="get" autocomplete="off"
                                        action="{{ route('guid.index') }}">
                                        <div class="autocomplete" style="width:300px;">
                                            <input class= "input-guid" id="game_id" type="text" name="game_id"
                                                placeholder="Название игры">
                                        </div>
                                        <input class = "search-guid" type="submit" value="Найти">
                                    </form>
                                </div>
                                @foreach ($guids as $guid)
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

                                                @if ($guid->getMedia('guid_prewiew')->first())
                                                    {{ $guid->getMedia('guid_prewiew')->first() }}
                                                @else
                                                    <img src="{{ asset('assets/images/default.png') }}" alt="">
                                                @endif

                                                <div class="article__title">{{ $guid->title }}</div>

                                            </div>

                                            <div class="article__footer">
                                                <div class="main-border-button"><a style="margin-bottom: 15px;"
                                                        href="{{ route('guid.show', $guid->id) }}">Смотреть</a>
                                                </div>

                                                <form style="" method="post" action="{{ route('like.store') }}">
                                                    @csrf
                                                    <input type="hidden" name="likeable_id" value = "{{ $guid->id }}">
                                                    <input type="hidden" name="likeable_type" value = "guid">

                                                    <button
                                                        style="{{ $guid->is_liked_count > 0 ? 'color: #ec6090;' : 'color: #666;' }}font-size: 14px;margin-left:15px"
                                                        type="submit" class="fa fa-heart heart">
                                                        {{ $guid->likes_count }}
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                @if ($guids->count() < 1)
                                    <div style="font-size:26px; text-align: center;color:rgb(130, 130, 130)">
                                        Извините, гайдов по этой игре пока нет(
                                    </div>
                                @endif
                                <div>
                                    {{ $guids->withQueryString()->links() }}
                                </div>
                                <script>
                                    fetch('http://localhost:8000/game_get')
                                        .then(response => response.json()) // Декодируем ответ в формате json
                                        .then(data => {
                                            autocomplete(document.getElementById("game_id"), data)
                                        });
                                </script>

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
                                                <div class = "post-preview-user-min">
                                                    <img src="{{ asset('assets/images/default.png') }}" alt=""
                                                        class="">
                                                </div>
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
