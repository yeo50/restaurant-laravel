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
            <div class="main-panel">
                <h1 class="text-center text-white text-2xl font-bold mt-3">Food Menu</h1>
                <div>
                    <form action="{{ route('foods.store') }}" method="post" enctype="multipart/form-data"
                        class="w-1/3 block mx-auto mt-5">
                        @csrf
                        <div class="mb-2">
                            <label for="title">Title</label> <br>
                            <input type="text" id="title" name="title" placeholder="Title"
                                class="ps-3 w-full text-black">
                        </div>
                        <div class="mb-2">
                            <label for="price">Price</label> <br>
                            <input type="number" id="price" name="price" class="ps-3 w-full text-black">
                        </div>
                        <div class="mb-2">
                            <label for="image">Upload Image</label> <br>
                            <input type="file" name="image" id="image">
                        </div>
                        <div class="mb-2">
                            <label for="description">Description</label> <br>
                            <input type="text" id="description" name="description" placeholder="Description"
                                class="ps-3 w-full text-black">
                        </div>
                        <div class="mb-2">
                            <input type="submit" value="Save"
                                class="text-white bg-yellow-700 px-4 py-2 rounded shadow ">
                        </div>
                    </form>

                </div>
                <div class="mt-5 ps-4">
                    <h1 class="text-center text-xl text-white font-bold">Food menu</h1>
                    <table class="my-4 bock w-2/3 p-4 text-white mx-auto">
                        <tr class="py-6">
                            <th class="px-4 text-center">Title</th>
                            <th class="px-4 text-center">Price</th>
                            <th class="px-4 text-center">Description</th>
                            <th class="px-4 text-center">Image</th>
                            <th class="px-4 text-center">Action</th>
                        </tr>
                        @foreach ($foods as $food)
                            <tr>
                                <td class="px-4 text-center">{{ $food->title }}</td>
                                <td class="px-4 text-center">${{ $food->price }}</td>
                                <td class="px-4 text-center">{{ $food->description }}</td>
                                <td class="px-4 text-center"><img src="{{ asset('storage/' . $food->image) }}"
                                        alt="{{ $food->title }}" class="w-56 h-36"></td>
                                <td class="px-4 text-center">
                                    <div class="inline-block w-20 ">
                                        <a href="{{ route('foods.edit', $food->id) }}" class="w-24 px-4 py-2">Edit</a>
                                        <form action="{{ route('foods.destroy', $food->id) }}" method="post"
                                            class="inline-block ">
                                            @csrf
                                            @method('DELETE')
                                            <input type="submit" value="Delete"
                                                class="px-4 py-2 bg-red-500 block w-24 hover:ring hover:ring-inset hover:ring-red-900">
                                        </form>
                                    </div>
                                </td>

                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
            <!-- main-panel ends -->
        </div>
    </div>
    <!-- container-scroller -->

    @include('admin/adminscript')
</body>

</html>
