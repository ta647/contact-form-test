<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>FashionablyLate</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/index.css') }}" />
</head>

<body>
    <header class="header">
        <div class="header__inner">
            <a class="header__logo" href="/">
                FashionablyLate
            </a>
        </div>
    </header>

    <main>
        <div class="contact-form__content">
            <div class="contact-form__heading">
                <h2>Contact</h2>
            </div>
            <form class="form" action="/confirm" method="POST">
                @csrf
                <div class="form__group">
                    <div class="form__group-title">
                        <span class="form__label--item">お名前</span>
                        <span class="form__label--required">※</span>
                    </div>
                    <div class="form__group-content">
                        <div class="form__input--text__name">
                            <div class="form__input--name-item">
                                <input type="text" name="first_name" placeholder="例:山田" value="{{ old('first_name') }}" />
                                <div class="form__error">
                                    @error('first_name')
                                        <p>{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form__input--name-item">
                                <input type="text" name="last_name" placeholder="例:太郎" value="{{ old('last_name') }}" />
                                <div class="form__error">
                                    @error('last_name')
                                        <p>{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form__group">
                    <div class="form__group-title">
                        <span class="form__label--item">性別</span>
                        <span class="form__label--required">※</span>
                    </div>
                    <div class="form__group-content">
                        <div class="form__input--text__gender">
                            <label class="gender__item">
                                <input type="radio" name="gender" value="1" {{ old('gender') == '1' ? 'checked' : '' }}>
                                <span>男性</span>
                            </label>
                            <label class="gender__item">
                                <input type="radio" name="gender" value="2" {{ old('gender') == '2' ? 'checked' : '' }}>
                                <span>女性</span>
                            </label>
                            <label class="gender__item">
                                <input type="radio" name="gender" value="3" {{ old('gender') == '3' ? 'checked' : '' }}>
                                <span>その他</span>
                            </label>
                        </div>
                        <div class="form__error">
                            @error('gender')
                                <p>{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form__group">
                    <div class="form__group-title">
                        <span class="form__label--item">メールアドレス</span>
                        <span class="form__label--required">※</span>
                    </div>
                    <div class="form__group-content">
                        <div class="form__input--text">
                            <input type="email" name="email" placeholder="例:test@example.com" value="{{ old('email') }}" />
                        </div>
                        <div class="form__error">
                            @error('email')
                                <p>{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form__group">
                    <div class="form__group-title">
                        <span class="form__label--item">電話番号</span>
                        <span class="form__label--required">※</span>
                    </div>
                    <div class="form__group-content">
                        <div class="form__input--text__tel">
                            <input type="text" name="tel1" maxlength="3" placeholder="090" value="{{ old('tel1') }}">
                            <span class="form__tel-hyphen">-</span>
                            <input type="text" name="tel2" maxlength="4" placeholder="1234" value="{{ old('tel2') }}">
                            <span class="form__tel-hyphen">-</span>
                            <input type="text" name="tel3" maxlength="4" placeholder="5678" value="{{ old('tel3') }}">
                        </div>
                        <div class="form__error">
                            @if ($errors->has('tel1') || $errors->has('tel2') || $errors->has('tel3'))
                                <p>{{ $errors->first('tel1') ?: $errors->first('tel2') ?: $errors->first('tel3') }}</p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form__group">
                    <div class="form__group-title">
                        <span class="form__label--item">住所</span>
                        <span class="form__label--required">※</span>
                    </div>
                    <div class="form__group-content">
                        <div class="form__input--text">
                            <input type="text" name="address" placeholder="例:東京都渋谷区千駄ヶ谷1-2-3" value="{{ old('address') }}" />
                        </div>
                        <div class="form__error">
                            @error('address')
                                <p>{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form__group">
                    <div class="form__group-title">
                        <span class="form__label--item">建物名</span>
                    </div>
                    <div class="form__group-content">
                        <div class="form__input--text">
                            <input type="text" name="building" placeholder="例:千駄ヶ谷マンション101" value="{{ old('building') }}" />
                        </div>
                    </div>
                </div>
                <div class="form__group">
                    <div class="form__group-title">
                        <span class="form__label--item">お問い合わせの種類</span>
                        <span class="form__label--required">※</span>
                    </div>
                    <div class="form__group-content">
                        <div class="form__input--select">
                            <select name="category_id" id="category-select">
                                <option value="" selected disabled>選択してください</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                        {{ $category->content }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form__error">
                            @error('category_id')
                                <p>{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form__group">
                    <div class="form__group-title">
                        <span class="form__label--item">お問い合わせ内容</span>
                        <span class="form__label--required">※</span>
                    </div>
                    <div class="form__group-content">
                        <div class="form__input--textarea">
                            <textarea name="detail" placeholder="お問い合わせ内容をご記載ください">{{ old('detail') }}</textarea>
                        </div>
                        <div class="form__error">
                            @error('detail')
                                <p>{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form__button">
                    <button class="form__button-submit" type="submit">確認画面</button>
                </div>
            </form>
        </div>
    </main>
    <script>
        const select = document.getElementById('category-select');
        function updateSelectStyle() {
            if (select.value === '') {
                select.classList.add('is-placeholder');
            } else {
                select.classList.remove('is-placeholder');
            }
        }
        select.addEventListener('change', updateSelectStyle);
        updateSelectStyle();
    </script>
</body>

</html>
