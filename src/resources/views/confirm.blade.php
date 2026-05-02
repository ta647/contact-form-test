<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>FashionablyLate</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/confirm.css') }}" />
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
        <div class="confirm-form__content">
            <div class="confirm-form__heading">
                <h2>Confirm</h2>
            </div>
            <div class="confirm">
                @php
                    $genders = [1 => '男性', 2 => '女性', 3 => 'その他'];
                @endphp
                <table class="confirm__table">
                    <tr>
                        <th>お名前</th>
                        <td>{{ $contact['first_name'] }} {{ $contact['last_name'] }}</td>
                    </tr>
                    <tr>
                        <th>性別</th>
                        <td>{{ $genders[$contact['gender']] ?? '' }}</td>
                    </tr>
                    <tr>
                        <th>メールアドレス</th>
                        <td>{{ $contact['email'] }}</td>
                    </tr>
                    <tr>
                        <th>電話番号</th>
                        <td>{{ $contact['tel'] }}</td>
                    </tr>
                    <tr>
                        <th>住所</th>
                        <td>{{ $contact['address'] }}</td>
                    </tr>
                    <tr>
                        <th>建物名</th>
                        <td>{{ $contact['building'] ?? '' }}</td>
                    </tr>
                    <tr>
                        <th>お問い合わせの種類</th>
                        <td>{{ $category->content }}</td>
                    </tr>
                    <tr>
                        <th>お問い合わせ内容</th>
                        <td>{{ $contact['detail'] }}</td>
                    </tr>
                </table>

                <div class="confirm__buttons">

                    <form action="/contacts" method="POST">
                        @csrf
                        <input type="hidden" name="first_name" value="{{ $contact['first_name'] }}">
                        <input type="hidden" name="last_name" value="{{ $contact['last_name'] }}">
                        <input type="hidden" name="gender" value="{{ $contact['gender'] }}">
                        <input type="hidden" name="email" value="{{ $contact['email'] }}">
                        <input type="hidden" name="tel" value="{{ $contact['tel'] }}">
                        <input type="hidden" name="address" value="{{ $contact['address'] }}">
                        <input type="hidden" name="building" value="{{ $contact['building'] ?? '' }}">
                        <input type="hidden" name="category_id" value="{{ $contact['category_id'] }}">
                        <input type="hidden" name="detail" value="{{ $contact['detail'] }}">
                        <button type="submit" class="form__button-submit">送信</button>
                    </form>

                    <form action="/back" method="POST">
                        @csrf
                        <input type="hidden" name="first_name" value="{{ $contact['first_name'] }}">
                        <input type="hidden" name="last_name" value="{{ $contact['last_name'] }}">
                        <input type="hidden" name="gender" value="{{ $contact['gender'] }}">
                        <input type="hidden" name="email" value="{{ $contact['email'] }}">
                        <input type="hidden" name="tel1" value="{{ $contact['tel1'] }}">
                        <input type="hidden" name="tel2" value="{{ $contact['tel2'] }}">
                        <input type="hidden" name="tel3" value="{{ $contact['tel3'] }}">
                        <input type="hidden" name="address" value="{{ $contact['address'] }}">
                        <input type="hidden" name="building" value="{{ $contact['building'] ?? '' }}">
                        <input type="hidden" name="category_id" value="{{ $contact['category_id'] }}">
                        <input type="hidden" name="detail" value="{{ $contact['detail'] }}">
                        <button type="submit" class="form__button-back">修正</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>

</html>
