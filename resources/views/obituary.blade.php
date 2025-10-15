<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cáo Phó - Nghệ Sĩ Phi Nhung</title>

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #111;
            font-family: 'Times New Roman', serif;
            color: #fff;
        }
        .obituary-card {
            background: linear-gradient(180deg, #111 0%, #000 100%);
            border: none;
            border-radius: 15px;
            max-width: 600px;
            margin: 40px auto;
            text-align: center;
            padding: 40px 30px;
            box-shadow: 0 0 15px rgba(255, 255, 255, 0.05);
        }
        .obituary-card img {
            width: 180px;
            height: 180px;
            object-fit: cover;
            border-radius: 50%;
            box-shadow: 0 0 20px rgba(255, 255, 255, 0.1);
        }
        h2.title {
            font-weight: bold;
            letter-spacing: 2px;
            margin-top: 20px;
        }
        .gold {
            color: #d6a954;
        }
        .divider {
            width: 60%;
            margin: 1.5rem auto;
            border-top: 1px solid rgba(255, 255, 255, 0.2);
        }
        p {
            margin-bottom: 6px;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="obituary-card">
            <img src="{{ asset('uploads/phi-nhung.jpg') }}" alt="Nghệ sĩ Phi Nhung">
            <h2 class="title text-uppercase mt-3">Cáo Phó</h2>
            <p class="text-secondary small mt-2">
                Gia đình chúng tôi vô cùng đau buồn, kính báo tin cùng thân bằng quyến thuộc, bạn hữu và quý vị khán giả mộ điệu gần xa.
            </p>

            <h3 class="fw-bold gold text-uppercase mt-3 mb-3">Nghệ sĩ Phi Nhung</h3>

            <div class="text-start mx-auto" style="max-width: 420px;">
                <p><strong>Thế danh:</strong> Phạm Phi Nhung</p>
                <p><strong>Pháp danh:</strong> Tịnh Bình</p>
                <p><strong>Sinh ngày:</strong> 10.04.1970 tại Gia Lai</p>
                <p><strong>Vãng sanh vào lúc:</strong> 12:15 ngày 28.09.2021</p>
                <p><strong>Tại:</strong> Bệnh viện Chợ Rẫy</p>
                <p><strong>Hưởng dương:</strong> 51 tuổi</p>
            </div>

            <div class="divider"></div>

            <p class="fw-semibold mb-1">TANG GIA ĐỒNG KÍNH BÁO</p>
            <p>Trưởng nữ: Wendy Phạm Thu</p>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>