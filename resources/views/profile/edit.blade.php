@extends('layouts.app')
@section('content')
    <div class="page-content">
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
        </script>


        <div class="row profile-top" style = "margin-bottom:70px">
            <div class="col-lg-4">
                <div class="profile-preview">
                    <img id="prewiew_image" style = "border-radius:25px;height:300px;" src="assets/images/game-02.jpg"
                        alt="1">
                    <div class="profile-name">
                        Name
                        <form class = "input-form" action="{{ route('image.store') }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="imageable_id" value = "{{ auth()->user()->id }}">
                            <input type="hidden" name="imageable_type" value = "user">
                            <input onchange="updatePreview(this, 'prewiew_image')" id = "input__file" class = "image-input"
                                name="user_profile_image" type="file">
                            <button style="display: none" id = "btn-for-upload" class = "image-btn"
                                type="submit">Обновить</button>
                            <label class = "label-image" for="input__file"><img class="input__file-icon"
                                    src="{{ asset('assets/images/downicon.svg') }}" alt="Выбрать файл"
                                    width="25"></label>

                        </form>
                    </div>


                </div>
            </div>
            <div class="col-lg-8">
                <h2 class = "profile-static-main-title">
                    Статистика
                </h2>
                <div class="profile-static-flex">
                    <div class="profile-static-item">
                        <div class="profile-static-title">
                            Всего Постов:
                        </div>
                        <div class="profile-static-info">
                            54
                        </div>
                    </div>
                    <div class="profile-static-item">
                        <div class="profile-static-title">
                            Оставлено коментариев:
                        </div>
                        <div class="profile-static-info">
                            21
                        </div>
                    </div>
                    <div class="profile-static-item">
                        <div class="profile-static-title">
                            Всего понравилось:
                        </div>
                        <div class="profile-static-info">
                            54
                        </div>
                    </div>
                    <div class="profile-static-item">
                        <div class="profile-static-title">
                            На форуме:
                        </div>
                        <div class="profile-static-info">
                            356 дней
                        </div>
                    </div>
                </div>
            </div>


        </div>
        <div class="row form-update-block" style = "margin-bottom:70px">
            <div class="col-lg-6">


                <form method="post" action="{{ route('password.update') }}" class="pass-form">
                    @csrf
                    @method('put')
                    <div>
                        <h2 class="pass-title">
                            {{ __('Обновление пароля') }}
                        </h2>

                    </div>

                    <div style="position: relative">
                        <label for="update_password_current_password" class= "pass-label" />{{ __('Текущий пароль') }}<br>
                        <input id="update_password_current_password" name="current_password" type="password"
                            class="pass-input" autocomplete="current-password" />
                        <x-input-error style="position: absolute;right:0;color:rgb(255, 65, 65);font-size:12px;bottom:0;"
                            :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
                    </div>


                    <div style="position: relative">
                        <label for="update_password_password" class= "pass-label" />{{ __('Новый пароль') }} <br>
                        <input id="update_password_password" name="password" type="password" class="pass-input"
                            autocomplete="new-password" />
                        <x-input-error style="position: absolute;right:0;color:rgb(255, 65, 65);font-size:12px;bottom:0;"
                            :messages="$errors->updatePassword->get('password')" class="mt-2" />
                    </div>

                    <div style="position: relative">
                        <label for="update_password_password_confirmation"
                            class= "pass-label" />{{ __(' Повторите  пароль') }}<br>
                        <input id="update_password_password_confirmation" name="password_confirmation" type="password"
                            class="pass-input"autocomplete="new-password" />
                        <x-input-error style="position: absolute;right:0;color:rgb(255, 65, 65);font-size:12px;bottom:0;"
                            :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
                    </div>

                    <div class="flex items-center gap-4">
                        <button type="submit" class="pass-btn">{{ __('Сохранить') }}</button>

                        @if (session('status') === 'password-updated')
                            <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                                class="text-sm text-gray-600">{{ __('Успешно!') }}</p>
                        @endif
                    </div>
                </form>
            </div>
            <div class="col-lg-6 update-two">
                <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                    @csrf
                </form>

                <form method="post" action="{{ route('profile.update') }}" class="info-form">
                    @csrf
                    @method('patch')
                    <div>
                        <h2 class="info-title">
                            {{ __('Обновление данных профиля') }}
                        </h2>

                    </div>

                    <div style="position: relative">
                        <label for="name" class= "info-label" />{{ __('Имя') }}
                        <input id="name" class="info-input" name="name" type="text"
                            value="{{ old('name', $user->name) }}" required autofocus autocomplete="Имя"
                            class="info-input" />
                        <x-input-error style="position: absolute;right:0;color:rgb(255, 65, 65);font-size:12px;bottom:0;"
                            class="mt-2" :messages="$errors->get('name')" />
                    </div>


                    <div style="position: relative">
                        <label class="info-label" for="email" /> {{ __('Почта') }}
                        <input id="email" class="info-input" name="email" type="email"
                            value="{{ old('email', $user->email) }}" required autocomplete="Почта" />
                        <x-input-error class="mt-2" :messages="$errors->get('email')" />

                        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                            <div>
                                <p class="text-sm mt-2 text-gray-400">
                                    {{ __('Ваша почта не верефицирована') }}

                                    <button form="send-verification"
                                        class="underline text-sm text-gray-400 hover:text-gray-200 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        {{ __('Отправить письмо еще раз') }}
                                    </button>
                                </p>

                                @if (session('status') === 'verification-link-sent')
                                    <p class="mt-2 font-medium text-sm text-green-300">
                                        {{ __('Новая ссылка отправлена на почту') }}
                                    </p>
                                @endif
                            </div>
                        @endif
                    </div>

                    <div class="flex items-center gap-4 btn-wrap">
                        <button type="submit" class="info-btn">{{ __('Сохранить') }}</button>

                        @if (session('status') === 'profile-updated')
                            <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                                style = "color:green" class="text-sm ">{{ __('Успешно') }}</p>
                        @endif
                    </div>
                </form>
            </div>
        </div>

        <div class="row" style = "margin-bottom:70px">
            <div class="col-lg-12">
                Мои посты
            </div>



        </div>


    </div>
@endsection
