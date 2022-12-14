<x-app-layout>
    <div class="container py-8">
        <div class="grid grid-cols-1 gap-4 md:grid-cols-2 md:gap-6">
            <div>
                <div class="flexslider">
                    <ul class="slides">
                        @foreach ($product->images as $image)
                            <li data-thumb=" {{ Storage::url($image->url) }}">
                                <img src=" {{ Storage::url($image->url) }}" />
                            </li>
                        @endforeach

                    </ul>
                </div>

                <div class="-mt-10 text-gray-700">
                    <h2 class="text-lg font-bold">Descripción</h2>
                    {!! $product->description !!}
                </div>


                <div class="mt-4 text-gray-700">
                    <h2 class="font.bold text-lg">Escribir una reseña</h2>
                    <form action="">
                        <textarea name="" id="editor" ></textarea>
                        <div class="flex items-center mt-2" x-data="{rating: 5}">
                            <p class="mr-3 font-semibold">Clasificacion</p>
                            <ul class="flex space-x-2">
                                <li x-bind:class="rating >= 1 ? 'text-yellow-500':''">
                                    <button type="button" class="focus:outline-none" x-on:click="rating = 1">
                                        <i class="fas fa-star"></i>
                                    </button>
                                </li>
                                <li x-bind:class="rating >= 2 ? 'text-yellow-500':''">
                                    <button type="button" class="focus:outline-none" x-on:click="rating = 2">
                                        <i class="fas fa-star"></i>
                                    </button>
                                </li>
                                <li x-bind:class="rating >= 3 ? 'text-yellow-500':''">
                                    <button type="button" class="focus:outline-none" x-on:click="rating = 3">
                                        <i class="fas fa-star"></i>
                                    </button>
                                </li>
                                <li x-bind:class="rating >= 4 ? 'text-yellow-500':''">
                                    <button type="button" class="focus:outline-none" x-on:click="rating = 4 ">
                                        <i class="fas fa-star"></i>
                                    </button>
                                </li>
                                <li x-bind:class="rating >=  5 ? 'text-yellow-500':''">
                                    <button type="button" class="focus:outline-none" x-on:click="rating = 5">
                                        <i class="fas fa-star"></i>
                                    </button>
                                </li>
                            </ul>

                            <input class="hidden" type="number" x-model="rating">

                            <x-jet-button class="ml-auto">
                                Agrerar reseña
                            </x-jet-button>
                        </div>

                    </form>
                </div>
            </div>

            <div>
                <h1 class="text-xl font-bold text-trueGray-700">{{ $product->name }}</h1>

                <div class="flex">
                    <p class="text-trueGray-700">Marca: <a class="underline capitalize hover:text-orange-500"
                            href="">{{ $product->brand->name }}</a></p>
                    <p class="mx-6 text-trueGray-700">5 <i class="text-sm text-yellow-400 fas fa-star"></i></p>
                    <a class="text-orange-500 underline hover:text-orange-600" href="">39 reseñas</a>
                </div>

                <p class="my-4 text-2xl font-semibold text-trueGray-700">COP{{ $product->price }}</p>

                <div class="mb-6 bg-white rounded-lg shadow-lg">
                    <div class="flex items-center p-4">
                        <span class="flex items-center justify-center w-10 h-10 rounded-full bg-greenLime-600">
                            <i class="text-sm text-white fas fa-truck"></i>
                        </span>

                        <div class="ml-4">
                            <p class="text-lg font-semibold text-greenLime-600">Se hace envíos a toda Colombia</p>
                            <p>Recibelo el {{ Date::now()->addDay(7)->locale('es')->format('l j F') }}</p>
                        </div>
                    </div>
                </div>

                @if ($product->subcategory->size)
                    @livewire('add-cart-item-size', ['product' => $product])
                @elseif($product->subcategory->color)
                    @livewire('add-cart-item-color', ['product' => $product])
                @else
                    @livewire('add-cart-item', ['product' => $product])
                @endif
            </div>
        </div>
    </div>

    @push('script')
        <script src="https://cdn.ckeditor.com/ckeditor5/35.3.0/classic/ckeditor.js"></script>
        <script>
            ClassicEditor
                .create(document.querySelector('#editor'), {
                    toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote'],

                })
                .catch(error => {
                    console.log(error);
                });
        </script>
        <script>
            $(document).ready(function() {
                $('.flexslider').flexslider({
                    animation: "slide",
                    controlNav: "thumbnails"
                });
            });
        </script>
    @endpush
</x-app-layout>
