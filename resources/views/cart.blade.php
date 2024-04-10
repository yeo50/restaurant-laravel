<x-app-layout>
    @include('header')
    <div id="top">

        <table class="bg-white w-2/3 ps-5 mx-auto">
            <tr class="p-5 text-center text-xl">
                <th class="ps-5 py-3">No.</th>
                <th class="ps-5 py-3">Name</th>
                <th class="ps-5 py-3">Price</th>
                <th class="ps-5 py-3">Quantity</th>
                <th class="ps-5 py-3">Total</th>
                <th class="ps-5 py-3">Action</th>
            </tr>
            @foreach ($carts as $cart)
                <tr class="text-center py-3 ">
                    <td class="ps-5 py-2 ">{{ $cart->id }}</td>
                    <td class="ps-5 py-2 ">{{ $cart->food->title }}</td>
                    <td class="ps-5 py-2 ">{{ $cart->food->price }}</td>
                    <td class="ps-5 py-2 ">{{ $cart->quantity }}</td>
                    <td class="ps-5 py-2 "> ${{ $cart->food->price * $cart->quantity }}</td>
                    <td class="ps-5 py-2 ">
                        <form action="{{ route('carts.destroy', $cart->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Cancel" class="text-blue-400 hover:text-blue-800">
                        </form>
                    </td>
                </tr>
            @endforeach

        </table>
    </div>
</x-app-layout>
