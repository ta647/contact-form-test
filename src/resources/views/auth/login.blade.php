<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>FashionablyLate - ログイン</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}" />
</head>

<body>
    <header class="header">
        <div class="header__inner">
            <a class="header__logo" href="/">FashionablyLate</a>
            <a class="header__nav-link" href="/register">register</a>
        </div>
    </header>

    <main>
        <div class="auth__content">
            <h2 class="auth__heading">Login</h2>
            <form class="auth__form auth__form--login" action="/login" method="POST">
                @csrf
                <div class="auth__form-group">
                    <div class="auth__label-wrap">
                        <span class="auth__label">メールアドレス</span>
                    </div>
                    <div class="auth__input-wrap">
                        <input class="auth__input" type="email" name="email" value="{{ old('email') }}" placeholder="例: test@example.com">
                        <p class="auth__error">@error('email'){{ $message }}@enderror</p>
                    </div>
                </div>
                <div class="auth__form-group">
                    <div class="auth__label-wrap">
                        <span class="auth__label">パスワード</span>
                    </div>
                    <div class="auth__input-wrap">
                        <input class="auth__input" type="password" name="password" placeholder="例: coachtech1106">
                        <p class="auth__error">@error('password'){{ $message }}@enderror</p>
                    </div>
                </div>
                <div class="auth__button-wrap">
                    <button type="submit" class="auth__button auth__button--login">ログイン</button>
                </div>
            </form>
        </div>
    </main>
</body>

</html>
