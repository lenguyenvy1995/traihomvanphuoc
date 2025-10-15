<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cáo Phó - {{ $item->name }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #111;
            color: #fff;
            font-family: "Helvetica Neue", Arial, sans-serif;
        }
        .obituary-card {
            max-width: 700px;
            margin: 60px auto;
            background: #000;
            border: 2px solid #444;
            border-radius: 10px;
            padding: 30px;
            text-align: center;
        }
        .obituary-card img {
            border-radius: 6px;
            max-width: 220px;
            margin-bottom: 20px;
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
    </style>
</head>
<body>
<div class="container">
    <div class="obituary-card">
        @if($item->photo)
            <img src="{{ RvMedia::getImageUrl($item->photo) }}" alt="{{ $item->name }}">
        @endif
        <h2 class="fw-bold">CÁO PHÓ</h2>
        <p class="text-muted small">Gia đình chúng tôi vô cùng đau buồn, kính báo tin cùng thân bằng quyến thuộc, bạn hữu và quý vị khán giả mộ điệu gần xa.</p>

        <h3 class="gold-text text-uppercase mt-4">{{ $item->name }}</h3>

        <p><strong>Pháp danh:</strong> {{ $item->religious_name ?? '---' }}</p>
        <p><strong>Sinh ngày:</strong> {{ $item->date_of_birth }} tại {{ $item->birth_place }}</p>
        <p><strong>Vãng sanh lúc:</strong> {{ $item->date_of_death }} tại {{ $item->place }}</p>
        <p><strong>Hưởng thọ:</strong> {{ $item->age }} tuổi</p>

        <div class="divider"></div>
        <p class="footer-note">TANG GIA ĐỒNG KÍNH BÁO</p>
    </div>
</div>
</body>
</html>