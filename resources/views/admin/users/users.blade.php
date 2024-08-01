<x-dashboard.app-layout>
    <div class="page-wrapper">
        <div class="page-breadcrumb bg-white">
            <div class="row align-items-center">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    {{-- <h4 class="page-title">Dashboard</h4> --}}
                    <ol class="breadcrumb ms-auto">
                        <li><a href="#" class="fw-normal">Products</a></li>
                    </ol>
                </div>
            </div>
            <!-- /.col-lg-12 -->
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12">
                    <div class="white-box">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                <p class="font-bold">{{session('status')}}</p>
                            </div>
                        @endif
                        <div class="d-md-flex mb-3">
                            <h3 class="box-title mb-0">Users</h3>
                            <div class="col-md-3 col-sm-4 col-xs-6 ms-auto" style="text-align: end">
                                <a href="{{ url('/admin/users/new') }}">
                                    <button class="btn btn-primary">+ Add new</button>
                                </a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table no-wrap">
                                <thead>
                                    <tr>
                                        <th class="border-top-0">User</th>
                                        <th class="border-top-0">Email</th>
                                        <th class="border-top-0">Phone</th>
                                        <th class="border-top-0">Address</th>
                                        <th class="border-top-0">Role</th>
                                        <th class="border-top-0 text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>
                                                <img src="/images/users/{{ $user->image ?? 'default.jpg' }}" alt="" style="height: 30px; width: 30px; object-fit: cover; object-position: center; border-radius: 5px;" class="border"> 
                                                {{ $user->firstname }} {{ $user->lastname }}
                                            </td>
                                            <td class="txt-oflo">{{ $user->email }}</td>
                                            <td class="txt-oflo">{{ $user->phone }}</td>
                                            <td class="txt-oflo">{{ $user->address }}</td>
                                            <td class="txt-oflo">{{ $user->role }}</td>
                                            <td class="d-md-flex align-items-center justify-content-center gap-2">
                                                <a href="{{'/admin/users/'.$user->id}}">
                                                    <button class="btn btn-primary">Update</button>
                                                </a>

                                                <form action="{{ url('/admin/users/'.$user->id) }}" method="POST" class="inline-block">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="button" class="btn btn-danger delete-btn">
                                                        Delete
                                                    </button>
                                                </form>                                                
                                            </td> 
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <footer class="footer text-center"> 2021 © Ample Admin brought to you by <a
            href="https://www.wrappixel.com/">wrappixel.com</a>
        </footer>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.delete-btn').forEach(function (button) {
                button.addEventListener('click', function () {
                    Swal.fire({
                        title: "CONFIRM",
                        text: "Are you sure to delete this Product?",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Yes, proceed"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            var deleteValue = this.value;
                            this.closest('form').submit();
                        }
                    });
                });
            });
        });
    </script>
</x-dashboard.app-layout>