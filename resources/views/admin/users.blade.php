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
        <div class="container-fluid page-body-wrapper ">
            <!-- partial:partials/_navbar.html -->
            @include('admin/partials/topnavbar')
            <!-- partial -->
            {{-- main-panel-start --}}
            <div class="main-panel  ">
                <h1 class="text-center text-2xl mt-3 font-bold mb-6 ">Users </h1>
                <table class="bg-grey-300 w-2/3 p-5">
                    <tr>
                        <th class="px-4 py-2">Name</th>
                        <th class="px-4 py-2">Email</th>
                        <th class="px-4 py-2">Action</th>
                    </tr>
                    @foreach ($users as $user)
                        <tr>
                            <td class="px-4 py-2">{{ $user->name }}</td>
                            <td class="px-4 py-2">{{ $user->email }}</td>
                            @if ($user->usertype == '0')
                                <td class="px-4 py-2">
                                    <form action="{{ route('users.destroy', $user->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" value="Delete" class="hover:text-red-500">
                                    </form>
                                @else
                                <td class="px-4 py-2">Not Allowed</td>
                            @endif
                        </tr>
                    @endforeach
                </table>
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- container-scroller -->
    </div>
    @include('admin/adminscript')
</body>

</html>
