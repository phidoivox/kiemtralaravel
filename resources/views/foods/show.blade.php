<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $food->name }} - AT10</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;700&display=swap');
        body {
            font-family: 'Roboto Condensed', sans-serif;
        }
        .nav-item {
            position: relative;
            text-transform: uppercase;
        }
        .nav-item.active::after, .nav-item:hover::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: -5px;
            width: 100%;
            height: 2px;
            background-color: #8cc63f;
        }
        .product-image-container {
            border: 1px solid #eee;
            padding: 20px;
            text-align: center;
        }
        .product-large-image {
            max-height: 400px;
            object-fit: contain;
            width: 100%;
        }
        .product-title {
            text-transform: uppercase;
            color: #333;
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 15px;
        }
        .product-price {
            color: #8cc63f;
            font-weight: bold;
            font-size: 1.5rem;
        }
        .product-old-price {
            color: #999;
            text-decoration: line-through;
            font-size: 1.1rem;
            margin-left: 10px;
        }
        .product-desc {
            color: #666;
            margin-top: 20px;
            line-height: 1.6;
        }
        .btn-add-cart {
            background-color: #8cc63f;
            color: white;
            padding: 10px 30px;
            text-transform: uppercase;
            font-weight: bold;
            border-radius: 30px;
            display: inline-block;
            margin-top: 20px;
            transition: all 0.3s;
        }
        .btn-add-cart:hover {
            background-color: #7ab332;
        }
        
        /* Styles from index for related products */
        .product-card {
            border: 1px solid #eee;
            transition: all 0.3s;
            position: relative;
            overflow: hidden;
        }
        .product-card:hover {
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        .product-image {
            height: 200px;
            object-fit: contain;
            width: 100%;
            padding: 20px;
        }
        .product-info {
            text-align: center;
            padding: 15px;
            transition: opacity 0.3s;
        }
        .product-name {
            text-transform: uppercase;
            color: #333;
            margin-bottom: 5px;
            font-weight: bold;
        }
        .product-price-small {
            color: #8cc63f;
            font-weight: bold;
        }
        .product-old-price-small {
            color: #999;
            text-decoration: line-through;
            font-size: 0.9em;
            margin-left: 5px;
        }
        /* Style when hovering on product -> show green box with details button */
        .product-hover-box {
            background-color: #8cc63f;
            text-align: center;
            padding: 15px;
            color: white;
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            opacity: 0;
            transition: opacity 0.3s;
            pointer-events: none;
        }
        .product-card:hover .product-info {
            opacity: 0;
        }
        .product-card:hover .product-hover-box {
            opacity: 1;
            pointer-events: auto;
        }
        .btn-detail {
            border: 1px solid white;
            padding: 5px 15px;
            border-radius: 20px;
            display: inline-block;
            margin-top: 5px;
            color: white;
            text-decoration: none;
        }
        .btn-detail:hover {
            background-color: white;
            color: #8cc63f;
        }
        .section-title {
            text-transform: uppercase;
            font-weight: bold;
            font-size: 1.5rem;
            border-bottom: 2px solid #8cc63f;
            display: inline-block;
            padding-bottom: 5px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body class="bg-white">

    <!-- Header / Navbar -->
    <header class="bg-black text-white px-10 py-4 flex justify-between items-center">
        <div class="flex items-center gap-2">
            <a href="{{ route('foods.index') }}" class="text-3xl font-bold italic tracking-wider">AT10</a>
        </div>
        <nav class="flex gap-6 text-sm font-bold">
            <a href="{{ route('foods.index') }}" class="nav-item hover:text-green-400">Trang chủ</a>
            <a href="#" class="nav-item hover:text-green-400">Giới thiệu</a>
            <a href="{{ route('foods.index') }}" class="nav-item active hover:text-green-400">Sản phẩm</a>
            <a href="#" class="nav-item hover:text-green-400">Liên hệ</a>
            <a href="#" class="nav-item hover:text-green-400">Hướng dẫn</a>
            <a href="#" class="hover:text-green-400"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg></a>
        </nav>
    </header>

    <main class="max-w-5xl mx-auto mt-10 px-4 mb-20">
        
        <!-- Breadcrumb -->
        <div class="mb-6 text-sm text-gray-500">
            <a href="{{ route('foods.index') }}" class="hover:text-green-600">Trang chủ</a>
            <span class="mx-2">›</span>
            <a href="{{ route('foods.index', ['category' => $food->category]) }}" class="hover:text-green-600">{{ $food->category }}</a>
            <span class="mx-2">›</span>
            <span class="text-gray-900 font-bold">{{ $food->name }}</span>
        </div>

        <!-- Product Detail -->
        <div class="flex flex-col md:flex-row gap-8 mb-16">
            <div class="w-full md:w-1/2">
                <div class="product-image-container">
                    <img src="{{ $food->image && filter_var($food->image, FILTER_VALIDATE_URL) ? $food->image : ($food->image ? asset('storage/'.$food->image) : 'https://placehold.co/400x400/png?text=No+Image') }}" 
                         alt="{{ $food->name }}" 
                         class="product-large-image">
                </div>
            </div>
            <div class="w-full md:w-1/2">
                <h1 class="product-title">{{ $food->name }}</h1>
                
                <div class="mt-4">
                    <span class="product-price">{{ number_format($food->price, 0, ',', '.') }}đ</span>
                    @if($food->old_price)
                        <span class="product-old-price">{{ number_format($food->old_price, 0, ',', '.') }}đ</span>
                    @endif
                </div>

                <div class="product-desc border-t border-b border-gray-100 py-4 mt-6">
                    <p><strong>Danh mục:</strong> {{ $food->category }}</p>
                    <p class="mt-4">{{ $food->description ?? 'Đang cập nhật mô tả cho sản phẩm này.' }}</p>
                </div>

                <button class="btn-add-cart">
                    THÊM VÀO GIỎ HÀNG
                </button>
            </div>
        </div>

        <!-- Related Products -->
        @if(isset($relatedFoods) && $relatedFoods->count() > 0)
        <div>
            <div class="text-center md:text-left">
                <h2 class="section-title">SẢN PHẨM CÙNG DANH MỤC</h2>
            </div>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6 mt-4">
                @foreach($relatedFoods as $related)
                    <div class="product-card relative bg-white">
                        <img src="{{ $related->image && filter_var($related->image, FILTER_VALIDATE_URL) ? $related->image : ($related->image ? asset('storage/'.$related->image) : 'https://placehold.co/400x400/png?text=No+Image') }}" alt="{{ $related->name }}" class="product-image">
                        
                        <div class="product-info">
                            <h3 class="product-name">{{ $related->name }}</h3>
                            <div class="product-price-small">
                                {{ number_format($related->price, 0, ',', '.') }}đ 
                                @if($related->old_price)
                                    <span class="product-old-price-small">{{ number_format($related->old_price, 0, ',', '.') }}đ</span>
                                @endif
                            </div>
                        </div>

                        <!-- Hover Box -->
                        <div class="product-hover-box">
                            <h3 class="product-name text-white">{{ $related->name }}</h3>
                            <div class="product-price-small text-white mb-2">
                                {{ number_format($related->price, 0, ',', '.') }}đ 
                                @if($related->old_price)
                                    <span class="product-old-price-small text-gray-200">{{ number_format($related->old_price, 0, ',', '.') }}đ</span>
                                @endif
                            </div>
                            <a href="{{ route('foods.show', $related) }}" class="btn-detail">CHI TIẾT</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        @endif

    </main>

</body>
</html>
