<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Thực Phẩm</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-2xl mx-auto bg-white p-6 rounded shadow">
        <h1 class="text-2xl font-bold mb-4">Thêm Sản Phẩm Mới</h1>

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                <strong>Có lỗi xảy ra:</strong>
                <ul class="list-disc ml-5 mt-2">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('foods.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Tên sản phẩm (*)</label>
                <input type="text" name="name" value="{{ old('name') }}" class="shadow appearance-none border @error('name') border-red-500 @enderror rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @error('name') <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Danh mục (*)</label>
                <select name="category" class="shadow border @error('category') border-red-500 @enderror rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    <option value="">-- Chọn danh mục --</option>
                    <option value="Hoa quả" {{ old('category') == 'Hoa quả' ? 'selected' : '' }}>Hoa quả</option>
                    <option value="Thực phẩm khô" {{ old('category') == 'Thực phẩm khô' ? 'selected' : '' }}>Thực phẩm khô</option>
                    <option value="Thực phẩm hữu cơ" {{ old('category') == 'Thực phẩm hữu cơ' ? 'selected' : '' }}>Thực phẩm hữu cơ</option>
                    <option value="Sản phẩm nổi bật" {{ old('category') == 'Sản phẩm nổi bật' ? 'selected' : '' }}>Sản phẩm nổi bật</option>
                </select>
                @error('category') <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4 flex gap-4">
                <div class="w-1/2">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Giá mới (*)</label>
                    <input type="number" name="price" value="{{ old('price') }}" class="shadow appearance-none border @error('price') border-red-500 @enderror rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    @error('price') <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p> @enderror
                </div>
                <div class="w-1/2">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Giá cũ</label>
                    <input type="number" name="old_price" value="{{ old('old_price') }}" class="shadow appearance-none border @error('old_price') border-red-500 @enderror rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    @error('old_price') <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Hình ảnh</label>
                <input type="file" name="image" class="shadow border @error('image') border-red-500 @enderror rounded w-full py-2 px-3 text-gray-700 leading-tight">
                @error('image') <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Mô tả</label>
                <textarea name="description" rows="3" class="shadow appearance-none border @error('description') border-red-500 @enderror rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ old('description') }}</textarea>
                @error('description') <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="flex items-center justify-between">
                <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Lưu
                </button>
                <a href="{{ route('foods.index') }}" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">
                    Hủy / Quay về danh sách
                </a>
            </div>
        </form>
    </div>
</body>
</html>
