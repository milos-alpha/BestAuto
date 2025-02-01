@extends('dashboard_layout')
@section('title', 'Create Product')

@section('content')
    <form action="{{ route('product.store') }}" method="post" class="mx-auto w-full md:min-w-[50%] md:max-w-[90%] lg:max-w-[90%] flex flex-col sm:flex-row items-start justify-center h-auto gap-4 p-2 md:py-4 border" enctype="multipart/form-data">
        @csrf <!-- CSRF Token for security -->
        <div class="flex w-full sm:min-w-[400px] sm:w-auto flex-col gap-4 items-center">
            <h1 class="text-xl font-extrabold text-orange-500">Create Product</h1>

            <input type="text" name="name" placeholder="Product name" required class="border-2 w-full border-border_clr outline-none p-2 focus:border-accent transition-all bg-none ease-in-out duration-600" />

            <textarea name="description" placeholder="Product description" rows="4" cols="30" class="border-2 w-full border-border_clr outline-none p-2 focus:border-accent transition-all bg-none ease-in-out duration-600"></textarea>

            <input type="number" name="price" placeholder="Product price: 0.00" step="0.01" required class="border-2 w-full border-border_clr outline-none p-2 focus:border-accent transition-all bg-none ease-in-out duration-600" />

            <input type="number" name="stock" placeholder="Product stock" class="border-2 w-full border-border_clr outline-none p-2 focus:border-accent transition-all bg-none ease-in-out duration-600" />

            <div class="w-full flex flex-col">
                <select name="category" class="border-2 border-border_clr outline-none p-2 focus:border-accent transition-all bg-none ease-in-out duration-600">
                    <option value="car">Car</option>
                    <option value="bike">Bike</option>
                </select>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="w-full my-2 bg-primary p-3 font-bold hover:text-white">Add Product</button>
        </div>

        <!-- Image Upload Section -->
        <div class="w-[300px] h-[200px] sm:mt-12 flex items-center justify-center p-3">
            <label for="input-file" id="drop-area" class="w-full h-full flex items-center justify-center flex-col">
                <input type="file" accept="image/*" name="image" id="input-file" hidden>
                <div class="border h-full flex flex-col gap-2 items-center justify-center w-full border-2-dashed border-border_clr bg-success rounded-sm bg-no-repeat bg-cover bg-center" id="img-view">
                    <i class="fas fa-cloud-upload text-success-bg text-3xl font-semibold"></i>
                    <p class="text-center text-sm text-secondary">Drag and drop or click here <br/> to upload a Product image</p>
                </div>
                @error('image')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </label>
        </div>
    </form>

    <!-- JavaScript for Image Preview -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const inputFile = document.getElementById('input-file');
            const imgView = document.getElementById('img-view');

            inputFile.addEventListener('change', function (event) {
                const file = event.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        imgView.style.backgroundImage = `url(${e.target.result})`;
                        imgView.innerHTML = ''; // Clear the default content
                    };
                    reader.readAsDataURL(file);
                }
            });

            // Drag and Drop functionality
            const dropArea = document.getElementById('drop-area');
            dropArea.addEventListener('dragover', function (e) {
                e.preventDefault();
                dropArea.classList.add('dragover');
            });

            dropArea.addEventListener('dragleave', function () {
                dropArea.classList.remove('dragover');
            });

            dropArea.addEventListener('drop', function (e) {
                e.preventDefault();
                dropArea.classList.remove('dragover');
                const file = e.dataTransfer.files[0];
                if (file) {
                    inputFile.files = e.dataTransfer.files;
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        imgView.style.backgroundImage = `url(${e.target.result})`;
                        imgView.innerHTML = ''; // Clear the default content
                    };
                    reader.readAsDataURL(file);
                }
            });
        });
    </script>
@endsection