<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cáo Phó - {{ $obituary->name }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/lightgallery@2.7.1/css/lightgallery-bundle.min.css">
    <style>
        body {
            background-color: #111;
            color: #fff;
            font-family: "Helvetica Neue", Arial, sans-serif;
        }

        .obituary-card {
            max-width: 700px;
            border-radius: 10px;
            padding: 30px 30px 100px 30px;
            text-align: center;
            display: flex;
            justify-content: center;
            flex-direction: column;
            align-content: center;
            align-items: stretch;

        }

        .obituary-card img {
            border-radius: 6px;
            max-width: 500px;
            margin-top: 20px;
            width: 100%;
        }

        .condolences {
            text-align: left;
            border: 1px solid #666257;
            color: #fff;
            border-radius: 5px;

        }

        .divider {
            border-top: 1px solid #555;
            margin: 20px 0;
        }

        .gold-text {
            color: #e0b54b;
            font-weight: 600;
        }

        .footer-note {
            font-style: italic;
            margin-top: 40px;
            font-size: 14px;
        }

        h1 {
            padding: 20px;
            color: #ffd239;
            font-size: 2.4rem;
        }

        .button-wrap {
            display: flex;
            flex-direction: column;
            position: fixed;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 100%;
            max-width: 525px;
            z-index: 999;
            background-color: #aa8410;
        }

        .button-wrap a {
            color: aliceblue;
            text-decoration-line: none;
        }

        .button-wrap .btn {
            color: aliceblue;
            border: 1px solid #aaa5b4;

        }
    </style>

</head>

<body>
    <div class="container d-flex justify-content-center">
        <div class="obituary-card">
            @if ($obituary->avatar)
                <div id="lightgallery">
                    <a href="{{ RvMedia::getImageUrl($obituary->avatar) }}" alt="{{ $obituary->name }}">
                        <img src="{{ RvMedia::getImageUrl($obituary->avatar) }}" alt="{{ $obituary->name }}">
                    </a>
                </div>
            @endif
            <div class="bank-info mt-4">
                <h5 class="text-warning mb-3">THÔNG TIN TÀI KHOẢN PHÚNG ĐIẾU</h5>
                @if ($obituary->account_holder)
                    <p><strong>Chủ tài khoản:</strong> {{ $obituary->account_holder }}</p>
                @endif
                @if ($obituary->bank_name)
                    <p><strong>Ngân hàng:</strong> {{ $obituary->bank_name }}</p>
                @endif
                @if ($obituary->account_number)
                    <p><strong>Số tài khoản:</strong> <span
                            id="account-number">{{ $obituary->account_number }}</span>

                        <button id="copy-account-btn" class="btn btn-sm btn-outline-light ms-2"
                            onclick="copyAccountNumber()">
                            Copy
                        </button>
                    </p>
                @endif
            </div>
            <div class="main">
                <h3 class="mt-5 mb-5">LỜI CHIA BUỒN</h3>

                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <form method="POST" action="{{ route('obituary.condolence.store') }}">
                    @csrf
                    <input type="hidden" name="obituary_id" value="{{ $obituary->id }}">


                    <input type="text" name="name" class="form-control mb-3"
                        placeholder="Vui lòng nhập tên của bạn">
                    <textarea name="message" rows="4" class="form-control mb-3" placeholder="Vui lòng nhập nội dung chia buồn"></textarea>

                    <button type="submit" class="btn btn-dark w-100">Gửi Lời Chia Buồn</button>
                </form>

                <hr>

                @foreach ($obituary->condolences()->latest()->get() as $condolence)
                    <div class="condolences p-2 mb-3">
                        <strong>{{ $condolence->name }}</strong>
                        <small class="ps-2"
                            style="color:#aaa5b4;">{{ $condolence->created_at->format('Y-m-d H:i') }}</small>
                        <p class="condolences-content">{{ $condolence->message }}</p>
                    </div>
                @endforeach
            </div>
            <div class="button-wrap">
                <div class="btn-group btn-group-obituary">
                    <button type="button" class="btn">Phúng Điếu</button>
                    <a href=" {{ $obituary->wreath }}" class="btn ">Vòng Hoa</a>
                    <button type="button" class="btn" id="btnShare">Chia Sẻ</button>
                </div>
                <a href="" class="">MAI TÁNG ( TRẠI HÒM ) VẠN PHƯỚC</a>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/lightgallery@2.7.1/lightgallery.umd.min.js"></script>
    <script>
        lightGallery(document.getElementById('lightgallery'), {
            selector: 'a',
            download: false,
            zoom: true,
        });
    </script>
    <script>
        document.getElementById('btnShare').addEventListener('click', function() {
            if (navigator.share) {
                navigator.share({
                        title: document.title,
                        text: 'Mời bạn xem cáo phó của {{ $obituary->name }}',
                        url: window.location.href
                    })
                    .then(() => console.log('Đã chia sẻ thành công'))
                    .catch(err => console.log('Người dùng hủy chia sẻ:', err));
            } else {
                // fallback khi không hỗ trợ Web Share
                const link = window.location.href;
                navigator.clipboard.writeText(link);
                alert('Trình duyệt không hỗ trợ chia sẻ. Link đã được sao chép!');
            }
        });
    </script>
    <script>
        function copyAccountNumber() {
            const accountNumber = document.getElementById('account-number').textContent.trim();
            navigator.clipboard.writeText(accountNumber).then(() => {
                const btn = document.getElementById('copy-account-btn');
                btn.textContent = 'Đã sao chép!';
                btn.classList.remove('btn-outline-light');
                btn.classList.add('btn-success');
                setTimeout(() => {
                    btn.textContent = 'Copy';
                    btn.classList.remove('btn-success');
                    btn.classList.add('btn-outline-light');
                }, 2000);
            }).catch(() => alert('Không thể sao chép!'));
        }
    </script>
</body>

</html>
