<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Sản Phẩm - AT10</title>
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
        .tab-item {
            text-transform: uppercase;
            color: #666;
            cursor: pointer;
            padding-bottom: 5px;
            font-weight: 700;
        }
        .tab-item.active {
            color: #8cc63f;
            border-bottom: 2px solid #8cc63f;
        }
        
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
        }
        .product-price {
            color: #8cc63f;
            font-weight: bold;
        }
        .product-old-price {
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
    </style>
</head>
<body class="bg-white">

    <!-- Header / Navbar -->
    <header class="bg-black text-white px-10 py-4 flex justify-between items-center">
        <div class="flex items-center gap-2">
            <span class="text-3xl font-bold italic tracking-wider">AT10</span>
        </div>
        <nav class="flex gap-6 text-sm font-bold">
            <a href="#" class="nav-item hover:text-green-400">Trang chủ</a>
            <a href="#" class="nav-item hover:text-green-400">Giới thiệu</a>
            <a href="#" class="nav-item hover:text-green-400">Sản phẩm</a>
            <a href="#" class="nav-item hover:text-green-400">Liên hệ</a>
            <a href="#" class="nav-item hover:text-green-400">Hướng dẫn</a>
            <a href="#" class="hover:text-green-400"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg></a>
        </nav>
    </header>

    <main class="max-w-5xl mx-auto mt-10 px-4">
        


        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                {{ session('success') }}
            </div>
        @endif

        <!-- Category Tabs -->
        <div class="flex justify-center gap-8 mb-8 border-b pb-2">
            @php
                $activeCategory = request('category_id', $categories->first()->id ?? null);
            @endphp
            @foreach($categories as $category)
                <a href="?category_id={{ $category->id }}" class="tab-item {{ $activeCategory == $category->id ? 'active' : '' }}">{{ $category->name }}</a>
            @endforeach
        </div>

        <!-- Product Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
            @php
                // Filter foods by active category
                $filteredFoods = $foods->filter(function($food) use ($activeCategory) {
                    return $food->category_id == $activeCategory;
                });
            @endphp

            @forelse ($filteredFoods as $food)
                <div class="product-card relative bg-white">
                    <img src="{{ $food->image && filter_var($food->image, FILTER_VALIDATE_URL) ? $food->image : ($food->image ? asset('storage/'.$food->image) : 'https://placehold.co/400x400/png?text=No+Image') }}" alt="{{ $food->name }}" class="product-image">
                    
                    <div class="product-info">
                        <h3 class="product-name">{{ $food->name }}</h3>
                        <div class="product-price">
                            {{ number_format($food->price, 0, ',', '.') }}đ 
                            @if($food->old_price)
                                <span class="product-old-price">{{ number_format($food->old_price, 0, ',', '.') }}đ</span>
                            @endif
                        </div>
                    </div>

                    <!-- Hover Box -->
                    <div class="product-hover-box">
                        <h3 class="product-name text-white">{{ $food->name }}</h3>
                        <div class="product-price text-white mb-2">
                            {{ number_format($food->price, 0, ',', '.') }}đ 
                            @if($food->old_price)
                                <span class="product-old-price text-gray-200">{{ number_format($food->old_price, 0, ',', '.') }}đ</span>
                            @endif
                        </div>
                        <a href="{{ route('foods.show', $food) }}" class="btn-detail">CHI TIẾT</a>
                    </div>
                </div>
            @empty
                <div class="col-span-4 text-center text-gray-500 py-10">
                    Không có sản phẩm nào trong danh mục này.
                </div>
            @endforelse
        </div>
    </main>

</body>
</html>
