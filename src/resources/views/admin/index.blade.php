<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>FashionablyLate - 管理画面</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}" />
</head>

<body>
    <header class="header">
        <div class="header__inner">
            <a class="header__logo" href="/">FashionablyLate</a>
            <form action="/logout" method="POST">
                @csrf
                <button type="submit" class="header__logout">logout</button>
            </form>
        </div>
    </header>

    <main>
        <div class="admin__content">
            <div class="admin__heading">
                <h2>Admin</h2>
            </div>

            {{-- 検索フォーム --}}
            <form class="search__form" action="/search" method="GET">
                <div class="search__fields">
                    <div class="search__field">
                        <input type="text" name="keyword" class="search__input--keyword" value="{{ request('keyword') }}" placeholder="名前やメールアドレスを入力してください">
                    </div>
                    <div class="search__field">
                        <div class="select-wrap">
                            <select name="gender" class="select--short">
                                <option value="" {{ !request()->filled('gender') ? 'selected' : '' }}>性別</option>
                                <option value="0" {{ request('gender') === '0' ? 'selected' : '' }}>全て</option>
                                <option value="1" {{ request('gender') === '1' ? 'selected' : '' }}>男性</option>
                                <option value="2" {{ request('gender') === '2' ? 'selected' : '' }}>女性</option>
                                <option value="3" {{ request('gender') === '3' ? 'selected' : '' }}>その他</option>
                            </select>
                        </div>
                    </div>
                    <div class="search__field">
                        <div class="select-wrap">
                            <select name="category_id">
                                <option value="">お問い合わせの種類</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                                        {{ $category->content }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="search__field">
                        <div class="select-wrap">
                            <input type="date" name="date" value="{{ request('date') }}" placeholder="年/月/日" autocomplete="off">
                        </div>
                    </div>
                    <div class="search__actions">
                        <button type="submit" class="btn-search">検索</button>
                        <a href="/admin" class="btn-reset">リセット</a>
                    </div>
                </div>
            </form>

            {{-- エクスポートボタン + ページネーション --}}
            <div class="admin__toolbar">
                <a href="/export?{{ http_build_query(request()->query()) }}" class="btn-export">エクスポート</a>
                {{ $contacts->onEachSide(2)->links('vendor.pagination.custom') }}
            </div>

            {{-- お問い合わせ一覧テーブル --}}
            @php $genders = [1 => '男性', 2 => '女性', 3 => 'その他']; @endphp
            <table class="admin__table">
                <thead>
                    <tr>
                        <th>お名前</th>
                        <th>性別</th>
                        <th>メールアドレス</th>
                        <th>お問い合わせの種類</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($contacts as $contact)
                    <tr>
                        <td>{{ $contact->first_name }} {{ $contact->last_name }}</td>
                        <td>{{ $genders[$contact->gender] ?? '' }}</td>
                        <td>{{ $contact->email }}</td>
                        <td>{{ $contact->category->content ?? '' }}</td>
                        <td class="td-action">
                            <button class="btn-detail"
                                data-id="{{ $contact->id }}"
                                data-name="{{ $contact->first_name }} {{ $contact->last_name }}"
                                data-gender="{{ $genders[$contact->gender] ?? '' }}"
                                data-email="{{ $contact->email }}"
                                data-tel="{{ $contact->tel }}"
                                data-address="{{ $contact->address }}"
                                data-building="{{ $contact->building ?? '' }}"
                                data-category="{{ $contact->category->content ?? '' }}"
                                data-detail="{{ $contact->detail }}"
                            >詳細</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>


        </div>
    </main>

    {{-- 詳細モーダル --}}
    <div id="modal" class="modal-overlay">
        <div class="modal__inner">
            <button id="modal-close" class="modal__close">×</button>
            <table class="modal__table">
                <tr><th>お名前</th><td id="modal-name"></td></tr>
                <tr><th>性別</th><td id="modal-gender"></td></tr>
                <tr><th>メールアドレス</th><td id="modal-email"></td></tr>
                <tr><th>電話番号</th><td id="modal-tel"></td></tr>
                <tr><th>住所</th><td id="modal-address"></td></tr>
                <tr><th>建物名</th><td id="modal-building"></td></tr>
                <tr><th>お問い合わせの種類</th><td id="modal-category"></td></tr>
                <tr><th>お問い合わせ内容</th><td id="modal-detail"></td></tr>
            </table>
            <div class="modal__footer">
                <form id="modal-delete-form" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-delete">削除</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        const modal = document.getElementById('modal');

        document.querySelectorAll('.btn-detail').forEach(function (btn) {
            btn.addEventListener('click', function () {
                document.getElementById('modal-name').textContent     = this.dataset.name;
                document.getElementById('modal-gender').textContent   = this.dataset.gender;
                document.getElementById('modal-email').textContent    = this.dataset.email;
                document.getElementById('modal-tel').textContent      = this.dataset.tel;
                document.getElementById('modal-address').textContent  = this.dataset.address;
                document.getElementById('modal-building').textContent = this.dataset.building;
                document.getElementById('modal-category').textContent = this.dataset.category;
                document.getElementById('modal-detail').textContent   = this.dataset.detail;
                document.getElementById('modal-delete-form').action   = '/delete/' + this.dataset.id;
                modal.classList.add('is-open');
            });
        });

        document.getElementById('modal-close').addEventListener('click', function () {
            modal.classList.remove('is-open');
        });

        modal.addEventListener('click', function (e) {
            if (e.target === modal) {
                modal.classList.remove('is-open');
            }
        });
    </script>
    <script>
        document.querySelector('input[name="date"]').addEventListener('click', function () {
            try { this.showPicker(); } catch (e) {}
        });
    </script>
</body>

</html>
