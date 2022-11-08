<x-app-layout>
    <div class="container grid grid-cols-1 gap-6 py-8 lg:grid-cols-2 xl:grid-cols-5">

        <div class="order-2 lg:order-1 xl:col-span-3">
            <div class="px-6 py-4 mb-6 bg-white rounded-lg shadow-lg">
                <p class="text-gray-700 uppercase"><span class="font-semibold">Número de orden:</span>
                    Orden-{{ $order->id }}</p>
            </div>

            <div class="p-6 mb-6 bg-white rounded-lg shadow-lg">
                <div class="grid grid-cols-2 gap-6 text-gray-700">
                    <div>
                        <p class="text-lg font-semibold uppercase">Envío</p>

                        @if ($order->envio_type == 1)
                            <p class="text-sm">Los productos deben ser recogidos en tienda</p>
                            <p class="text-sm">Calle falsa 123</p>
                        @else
                            <p class="text-sm">Los productos Serán enviados a:</p>
                            <p class="text-sm">{{ $envio->address }}</p>
                            <p>{{ $envio->department }} - {{ $envio->city }} - {{ $envio->district }}
                            </p>
                        @endif


                    </div>

                    <div>
                        <p class="text-lg font-semibold uppercase">Datos de contacto</p>

                        <p class="text-sm">Persona que recibirá el producto: {{ $order->contact }}</p>
                        <p class="text-sm">Teléfono de contacto: {{ $order->phone }}</p>
                    </div>
                </div>
            </div>

            <div class="p-6 mb-6 text-gray-700 bg-white rounded-lg shadow-lg">
                <p class="mb-4 text-xl font-semibold">Resumen</p>

                <table class="w-full table-auto">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Precio</th>
                            <th>Cant</th>
                            <th>Total</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-200">
                        @foreach ($items as $item)
                            <tr>
                                <td>
                                    <div class="flex">
                                        <img class="object-cover w-20 mr-4 h-15" src="{{ $item->options->image }}"
                                            alt="">
                                        <article>
                                            <h1 class="font-bold">{{ $item->name }}</h1>
                                            <div class="flex text-xs">

                                                @isset($item->options->color)
                                                    Color: {{ __($item->options->color) }}
                                                @endisset

                                                @isset($item->options->size)
                                                    - {{ $item->options->size }}
                                                @endisset
                                            </div>
                                        </article>
                                    </div>
                                </td>

                                <td class="text-center">
                                    {{ $item->price }} COP
                                </td>

                                <td class="text-center">
                                    {{ $item->qty }}
                                </td>

                                <td class="text-center">
                                    {{ $item->price * $item->qty }} COP
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>

        <div class="order-1 lg:order-2 xl:col-span-2">
            <div class="px-6 pt-6 bg-white rounded-lg shadow-lg">
                <div class="flex items-center justify-between mb-4">
                    <img class="h-8" src="{{ asset('img/MC_VI_DI_2-1.jpg') }}" alt="">
                    <div class="text-gray-700">
                        <p class="text-sm font-semibold">
                            Subtotal: {{ $order->total - $order->shipping_cost }} COP
                        </p>
                        <p class="text-sm font-semibold">
                            Envío: {{ $order->shipping_cost }} COP
                        </p>
                        <p class="text-lg font-semibold uppercase">
                            Total: {{ $order->total }} COP
                        </p>
                    </div>
                    <div>
                        <button wire:click="payOrder()" class="btn btn-success">
                            Buy
                        </button>
                    </div>
                </div>

            </div>
        </div>

    </div>
</x-app-layout>
