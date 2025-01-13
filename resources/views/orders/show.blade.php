<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation - Promacnuts ltd</title>

    <!-- SEO Meta Tags -->
    <meta name="description"
        content="Order confirmation page for Promacnuts ltd. View your order details, products ordered, and total amount to pay.">
    <meta name="keywords"
        content="order confirmation, Promacnuts ltd, promacnuts, macadamia, macadamia nuts, macadamia seedlings">
    <meta name="author" content="Promacnuts ltd">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://www.shop.promacnuts.rw/order-confirmation">
    <meta property="og:title" content="Order Confirmation - Promacnuts ltd">
    <meta property="og:description"
        content="View your order details from Promacnuts ltd. Fresh, organic fruits and vegetables delivered to your doorstep.">
    <meta property="og:image" content="https://www.shop.promacnuts.rw/assets/Logo.png">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://www.shop.promacnuts.rw/order-confirmation">
    <meta property="twitter:title" content="Order Confirmation - Promacnuts Ltd">
    <meta property="twitter:description"
        content="View your order details from Promacnuts ltd. Fresh, organic fruits and vegetables delivered to your doorstep.">
    <meta property="twitter:image" content="https://www.shop.promacnuts.rw/assets/Logo.png">

    <!-- Canonical URL -->
    <link rel="canonical" href="https://www.shop.promacnuts.rw/order-confirmation">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <!-- Styles -->
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <style>
        @media print {
            .no-print {
                display: none;
            }
        }
    </style>
</head>

<body class="bg-gray-100 font-sans">
    <div class="container mx-auto px-4 pb-10 pt-10">
        <div class="max-w-4xl mx-auto  bg-white rounded-md shadow-sm py-10 px-10 pb-10 pt-10">
            <div class="my-8">
                <a href="{{ route('welcome') }}" class="no-print inline-block mb-4">
                    <img src="{{ asset('assets/Logo.png') }}" alt=""
                        class="max-h-24 rounded-full border-green-500">
                </a>

                <button
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded float-right no-print text-sm"
                    onclick="window.print();">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block mr-1" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M5 4v3H4a2 2 0 00-2 2v3a2 2 0 002 2h1v2a2 2 0 002 2h6a2 2 0 002-2v-2h1a2 2 0 002-2V9a2 2 0 00-2-2h-1V4a2 2 0 00-2-2H7a2 2 0 00-2 2zm8 0H7v3h6V4zm0 8H7v4h6v-4z"
                            clip-rule="evenodd" />
                    </svg>
                    Print order
                </button>
                <div class="clear-both"></div>

                <h4 class="text-2xl font-bold my-4">Your order is received</h4>
                <div id="printOrder">
                    <table class="w-full mb-8">
                        <tbody>
                            <tr>
                                <td class="font-bold py-2">Order No</td>
                                <td class="py-2"> {{ $order->order_number }}</td>
                            </tr>
                            <tr>
                                <td class="font-bold py-2">Order date</td>
                                <td class="py-2"> {{ date('j M Y h:i a', strtotime($order->created_at)) }}</td>
                            </tr>
                            <tr>
                                <td class="font-bold py-2">Client</td>
                                <td class="py-2">
                                    {{ $order->user === null ? $order->customer_name : $order->user->name }}
                                </td>
                            </tr>
                            <tr>
                                <td class="font-bold py-2">Client phone</td>
                                <td class="py-2"> {{ $order->customer_phone }}</td>
                            </tr>
                            <tr>
                                <td class="font-bold py-2">Email address</td>
                                <td class="py-2"> {{ $order->customer_email }}</td>
                            </tr>
                            <tr>
                                <td class="font-bold py-2">Delivery address</td>
                                <td class="py-2"> {{ $order->customer_address }}</td>
                            </tr>
                        </tbody>
                    </table>

                    <h4 class="text-xl font-bold mb-4">Products ordered</h4>
                    <table class="w-full border-collapse border border-gray-300 mb-8">
                        <thead>
                            <tr class="bg-gray-200">
                                <th class="border border-gray-300 p-2 text-left">Product</th>
                                <th class="border border-gray-300 p-2 text-left">Price</th>
                                <th class="border border-gray-300 p-2 text-left">Quantity</th>
                                <th class="border border-gray-300 p-2 text-left">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order->orderItems as $orderItem)
                                <tr>
                                    <td class="border border-gray-300 p-2">{{ $orderItem->product->name }}</td>
                                    <td class="border border-gray-300 p-2">{{ $orderItem->formattedPrice() }}</td>
                                    <td class="border border-gray-300 p-2">{{ $orderItem->quantity }}</td>
                                    <td class="border border-gray-300 p-2">{{ $orderItem->formattedSubtotal() }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="3" class="border border-gray-300 p-2 text-right">Sub Total:</th>
                                <th class="border border-gray-300 p-2 text-left">
                                    {{ Cknow\Money\Money::RWF($order->orderItems()->sum('subtotal')) }}
                                </th>
                            </tr>

                            <tr>
                                <th colspan="3" class="border border-gray-300 p-2 text-right">Total:</th>
                                <th class="border border-gray-300 p-2 text-left">
                                    @if ($order->delivery_method == 'delivery')
                                        {{ Cknow\Money\Money::RWF($order->orderItems()->sum('subtotal') + $setting->shipping_fee) }}
                                    @else
                                        {{ Cknow\Money\Money::RWF($order->orderItems()->sum('subtotal')) }}
                                    @endif

                                </th>
                            </tr>

                        </tfoot>
                    </table>
                    <div>
                        <p>
                            <strong class="font-bold">Note:</strong>
                            <span> {{ $order->notes }}</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
