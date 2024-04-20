<main class="page-body" x-data="user">
    <div class="container-fluid">
        <div class="row g-xl-4 g-lg-3 g-2 justify-content-between">
            <div class="col-xxl-12 col-xl-12 col-lg-12 order-1 order-xxl-0">
                <div class="card mt-3">
                    <div class="card-header">
                        <h4 class="card-title mb-0">Users</h4>
                        <a class="btn bg-dark text-white btn-block" href="{{ route('admin.user.create') }}" role="button">Add</a>
                    </div>
                    <div class="card-body">
                        <div class="row g-3" style="overflow-x:auto;">
                            <table class="text-center">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Last Updated At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->updated_at->format("j M, Y") }}</td>
                                            <td>
                                                <a class="btn bg-dark text-white btn-block" href="{{ route('admin.user.update', ['user' => $user->id]) }}" role="button">
                                                    <i class="fa fa-edit"></i>
                                                    {{-- Edit --}}
                                                </a>
                                                <button class="btn bg-dark text-white btn-block" x-on:click="deleteConfirmation({{ $user->id }})">
                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                    {{-- Delete --}}
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-between">
                                <p>Showing {{ $users->firstItem() }} to {{ $users->lastItem() }} from {{ $users->total() }}</p>
                                {{ $users->onEachSide(0)->links() }}
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="deleteUserModal" tabindex="-1" aria-labelledby="deleteUserModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="deleteUserModalLabel">Confirmation</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are You Sure?
                </div>
                <div class="modal-footer">
                    <button type="button" x-on:click="deleteUser" class="btn btn-dark text-white btn-block">Yes</button>
                    <button type="button" class="btn btn-dark text-white btn-block" data-bs-dismiss="modal">No</button>
                </div>
            </div>
        </div>
    </div>
</main>
@push('scripts')
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('user', () => ({
                open: false,
                userId: "",
                deleteConfirmation(userId) {
                    this.userId = userId
                    $("#deleteUserModal").modal('show')
                },
                deleteUser(){
                    this.$wire.deleteUser(this.userId)
                    $("#deleteUserModal").modal('hide')
                }
            }))
        })
    </script>
@endpush
