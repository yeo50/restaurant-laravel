<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>

    @include('admin/admincss')
</head>

<body>

    <div class="container-scroller ">
        @include('admin/navbar')
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_navbar.html -->
            @include('admin/partials/topnavbar')
            <!-- partial -->
            {{-- main-panel starts  --}}
            <div class="main-panel ">

                <h1 class="text-center font-bold text-2xl my-4">Orders List</h1>
                <table>
                    <tr>
                        <th class="px-4 py-3 font-bold">No.</th>
                        <th class="px-4 py-3 font-bold">Name</th>
                        <th class="px-4 py-3 font-bold">Phone</th>
                        <th class="px-4 py-3 font-bold">Address</th>
                        <th class="px-4 py-3 font-bold">Foodname</th>
                        <th class="px-4 py-3 font-bold">Price</th>
                        <th class="px-4 py-3 font-bold">Quantity</th>
                        <th class="px-4 py-3 font-bold">Action</th>
                    </tr>

                    @foreach ($orders as $k => $order)
                        <tr>
                            <td class="px-4 py-2">{{ $k + 1 }}</td>
                            <td class="px-4 py-2">{{ $order->name }}</td>
                            <td class="px-4 py-2">{{ $order->phone }}</td>
                            <td class="px-4 py-2">{{ $order->address }}</td>
                            <td class="px-4 py-2">{{ $order->foodname }}</td>
                            <td class="px-4 py-2">{{ $order->price }}</td>
                            <td class="px-4 py-2">{{ $order->quantity }}</td>
                            <td class="px-4 py-2">Action</td>
                        </tr>
                    @endforeach
                </table>

            </div>
            <!-- main-panel ends -->
        </div>
    </div>
    <!-- container-scroller -->

    @include('admin/adminscript')
</body>

</html>
