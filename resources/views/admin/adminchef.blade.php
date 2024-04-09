<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <base href="/public">
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
            {{-- main-panel start  --}}
            <div class="main-panel">
                @if (session('message'))
                    <p class="px-4 py-2 border border-green-500 text-xl text-center text-green-500">
                        {{ session('message') }}</p>
                @endif
                <h1 class="text-center font-bold text-2xl ">Our Chefs</h1>



                <form action="{{ route('chefs.store') }}" method="post" enctype="multipart/form-data"
                    class="w-2/3 mx-auto mt-5">
                    @csrf

                    <div class="my-3">
                        <label for="chef-name" class="mb-2 ">Name </label> <br>
                        <input type="text" name="name" placeholder="Enter Our Chef Name" class="w-1/2 text-black">
                    </div>
                    <div class="my-3">
                        <label for="chef-speciality" class="mb-2">Speciality </label> <br>
                        <input type="text" name="speciality" placeholder="Enter Our Chef Speciality"
                            class="w-1/2 text-black">
                    </div>
                    <div class="my-3">
                        <label for="chef-photo" class="mb-2">Upload Your Chef Photo</label> <br>
                        <input type="file" name="photo" id="chef-photo">
                    </div>
                    <input type="submit" value="Save"
                        class="bg-green-800 px-4 py-2 w-1/8 rounded ring-offset-2 hover:ring hover:ring-green-900">
                </form>

                <h1 class="mt-5 ps-4">Lists of Our Chefs</h1>
                <table class="mt-5 px-4">
                    <tr>
                        <th>Name</th>
                        <th>Speciality</th>
                        <th>photo</th>
                        <th>action</th>
                    </tr>
                    @foreach ($chefs as $chef)
                        <tr>
                            <td>{{ $chef->name }}</td>
                            <td>{{ $chef->speciality }}</td>
                            <td><img src="{{ asset('storage/' . $chef->photo) }}" alt="{{ $chef->name }}"
                                    class="w-44 h-36"></td>
                            <td>
                                <div class="flex flex-col w-24">
                                    <a href="{{ route('chefs.edit', $chef->id) }}"
                                        class="px-4 py-2 bg-blue-500 text-center rounded mb-3 hover:text-white hover:ring">Edit</a>
                                    <form action="{{ route('chefs.destroy', $chef->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" value="Delete"
                                            class="px-4 py-2 bg-red-500 text-center rounded hover:ring">
                                    </form>
                                </div>
                            </td>
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
