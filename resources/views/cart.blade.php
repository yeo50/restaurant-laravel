<x-app-layout>
    @include('header')
    <div id="top">
        @if (session('status'))
            <h1 class="text-center font-bold text-2xl mt-4 text-green-600 px-4 py-2 border-3 border-green-600">Order
                Success</h1>
        @else
            <table class="bg-white w-2/3 ps-5 mx-auto">
                <tr class="p-5 text-center text-xl">
                    <th class="ps-5 py-3">No.</th>
                    <th class="ps-5 py-3">Name</th>
                    <th class="ps-5 py-3">Price</th>
                    <th class="ps-5 py-3">Quantity</th>
                    <th class="ps-5 py-3">Total</th>
                    <th class="ps-5 py-3">Action</th>
                </tr>
                @php
                    $total = 0;
                @endphp
                @foreach ($carts as $key => $cart)
                    <tr class="text-center py-3 ">
                        <td class="ps-5 py-2 ">{{ $key + 1 }}</td>
                        <td class="ps-5 py-2 ">{{ $cart->food->title }}</td>
                        <td class="ps-5 py-2 ">{{ $cart->food->price }}</td>
                        <td class="ps-5 py-2 ">{{ $cart->quantity }}</td>
                        <td class="ps-5 py-2 "> ${{ $subtotal = $cart->food->price * $cart->quantity }}</td>
                        <td class="ps-5 py-2 ">
                            <form action="{{ route('carts.destroy', $cart->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="Cancel" class="text-blue-400 hover:text-blue-800">
                            </form>
                        </td>
                    </tr>
                    @php
                        $total += $subtotal;
                    @endphp
                @endforeach

                <tr class="text-center text-xl font-bold  border">
                    <td colspan="4" class="py-3">OverAll Total:</td>
                    <td colspan="2" class="ps-10 text-left  border-2">${{ $total }}</td>
                </tr>
            </table>

            <div x-data="{ formOpen: false }" class="w-2/3 mx-auto mt-5">
                <a type="button"
                    class="text-center w-40 bg-green-600 px-4 py-2 block mx-auto rounded shadow text-white"
                    @click="formOpen = true">
                    Order
                    Now</a>
                <form action="{{ route('orders.store') }}" method="post">
                    @csrf
                    <div x-show="formOpen" class="w-5/12 mx-auto my-3">
                        @foreach ($carts as $cart)
                            <input type="hidden" name="foodname[]" value="{{ $cart->food->title }}">
                            <input type="hidden" name="price[]" value="{{ $cart->food->price }}">
                            <input type="hidden" name="quantity[]" value="{{ $cart->quantity }}">
                        @endforeach
                        <div>
                            <label for="customer-name">Name</label> <br>
                            <input type="text" name="name" id="customer-name" class="w-full">
                        </div>

                        <div>
                            <label for="customer-phone">Phone</label> <br>
                            <input type="number" name="phone" id="customer-phone" class="w-full">
                        </div>
                        <div>
                            <label for="customer-address">Address</label> <br>
                            <input type="text" name="address" id="customer-address" class="w-full">
                        </div>
                        <div class="flex">
                            <input type="submit" value="Order Confirm"
                                class="px-4 py-2 bg-green-800 rounded shadow  mx-auto mt-3 text-white  text-center">
                            <button
                                class="px-4 py-2 w-20 text-white mt-3 rounded shadow bg-blue-800 inline-flex justify-center"
                                @click="formOpen = false">Close</button>
                        </div>
                    </div>


                </form>
            </div>
        @endif
    </div>
</x-app-layout>
