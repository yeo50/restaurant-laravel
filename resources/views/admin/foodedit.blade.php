<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <base href="/public">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>

    @include('admin/admincss')
</head>

<body>
    <div class="container-scroller ">
        @include('admin/navbar')
        <div class="container-fluid page-body-wrapper ">
            <!-- partial:partials/_navbar.html -->
            @include('admin/partials/topnavbar')
            <!-- partial -->
            {{-- main-panel-start --}}
            <div class="main-panel  ">
                <h1 class="text-center text-2xl mt-3 font-bold mb-6 ">Edit Your Food Menu Here </h1>
                <div>
                    <form action="{{ route('foods.update', $food->id) }}" method="post" enctype="multipart/form-data"
                        class="w-1/3 block mx-auto mt-5">
                        @csrf
                        @method('PATCH')
                        <div class="mb-2">
                            <label for="title">Title</label> <br>
                            <input type="text" id="title" name="title" placeholder="Title"
                                value="{{ $food->title }}" class="ps-3 w-full text-black">
                        </div>
                        <div class="mb-2">
                            <label for="price">Price</label> <br>
                            <input type="number" id="price" name="price" class="ps-3 w-full text-black"
                                value="{{ $food->price }}">
                        </div>
                        @isset($food->image)
                            <div class="my-4">
                                <p>Original Image</p>
                                <img src="{{ asset('storage/' . $food->image) }}" alt="" class="w-24 h-24">
                            </div>
                        @endisset
                        <div class="mb-2">
                            <label for="image">Replace Image</label> <br>
                            <input type="file" name="image" id="image">
                        </div>

                        <div class="mb-2">
                            <label for="description">Description</label> <br>
                            <input type="text" id="description" name="description" placeholder="Description"
                                value="{{ $food->description }}" class="ps-3 w-full text-black">
                        </div>
                        <div class="mb-2">
                            <input type="submit" value="Save"
                                class="text-white bg-yellow-700 px-4 py-2 rounded shadow ">
                        </div>
                    </form>

                </div>

            </div>
            <!-- main-panel ends -->
        </div>
        <!-- container-scroller -->
    </div>
    @include('admin/adminscript')
</body>

</html>
