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
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_navbar.html -->
            @include('admin/partials/topnavbar')
            <!-- partial -->
            {{-- main-panel start  --}}
            <div class="main-panel">
                <h1>Edit chef Data</h1>
                <form action="{{ route('chefs.update', $chef->id) }}" method="post" enctype="multipart/form-data"
                    class="w-2/3 mx-auto mt-5 mb-5 pb-3">
                    @csrf
                    @method('patch')

                    <div class="my-3">
                        <label for="chef-name" class="mb-2 ">Name </label> <br>
                        <input type="text" name="name" placeholder="Enter Our Chef Name" class="w-1/2 text-black"
                            value="{{ $chef->name }}" autofocus>
                    </div>
                    <div class="my-3">
                        <label for="chef-speciality" class="mb-2">Speciality </label> <br>
                        <input type="text" name="speciality" placeholder="Enter Our Chef Speciality"
                            class="w-1/2 text-black" value="{{ $chef->speciality }}">
                    </div>
                    <div class="my-3">
                        <span>Original Photo</span>
                        <img src="{{ asset('storage/' . $chef->photo) }}" alt="{{ $chef->name }}"
                            class="w-40 h-32 mb-5 mt-3">
                        <label for="chef-photo" class="mb-2">Upload Your Chef New Photo</label> <br>
                        <input type="file" name="photo" id="chef-photo">
                    </div>
                    <input type="submit" value="Save"
                        class="bg-green-800 px-4 py-2 w-1/8 rounded ring-offset-2 hover:ring hover:ring-green-900">
                </form>

            </div>
            <!-- main-panel ends -->
        </div>
    </div>
    <!-- container-scroller -->

    @include('admin/adminscript')
</body>

</html>
