<main class="page-body" x-data="reply">
    <div class="container-fluid">
        <div class="row g-xl-4 g-lg-3 g-2 justify-content-between">
            <div class="col-xxl-12 col-xl-12 col-lg-12 order-1 order-xxl-0">
                <div class="card mt-3">
                    <div class="card-header">
                        <h4 class="card-title mb-0">Replies</h4>
                        <button class="btn bg-dark text-white btn-block float-right" x-on:click="sendReplyForm()" role="button">
                            <i class="fa fa-plus"></i>
                            {{-- Send Reply --}}
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="row g-3" style="overflow-x:auto;">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Reply</th>
                                        <th>Send At</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($replies as $reply)
                                        <tr>
                                            <td>{{ $reply->reply }}</td>
                                            <td>{{ $reply->created_at->format("j M, Y h:i a") }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-between">
                                <p>Showing {{ $replies->firstItem() }} to {{ $replies->lastItem() }} from {{ $replies->total() }}</p>
                                {{ $replies->onEachSide(0)->links() }}
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="sendReplyModal" tabindex="-1" aria-labelledby="sendReplyModalLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog" wire:ignore.self>
            <div class="modal-content" wire:ignore.self>
                <form x-on:submit.prevent='sendReply'>
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="sendReplyModalLabel">Reply</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                          <label for="replyMessage">Reply</label>
                          <textarea type="text" x-model="message" id="replyMessage" class="form-control" placeholder=""></textarea>
                            @error('message') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-dark text-white btn-block" wire:loading.class='d-none'>Send</button>
                        <button type="button" class="btn btn-dark text-white btn-block d-none" wire:loading.class.remove='d-none'><i class="fa fa-spinner" aria-hidden="true"></i></button>
                        <button type="button" class="btn btn-dark text-white btn-block" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
@push('scripts')
    <script>
        document.addEventListener('closeReplyModal', () => $("#sendReplyModal").modal('hide'))
        document.addEventListener('alpine:init', () => {
            Alpine.data('reply', () => ({
                message: "",
                sendReplyForm(){
                    this.message = ""
                    $("#sendReplyModal").modal('show')
                },
                sendReply(){
                    this.$wire.sendReply(this.message)
                }
            }))
        })
    </script>
@endpush
