<main class="page-body" x-data="contact">
  <div class="container-fluid">
    <div class="row g-xl-4 g-lg-3 g-2 justify-content-between">
      <div class="col-xxl-12 col-xl-12 col-lg-12 order-1 order-xxl-0">
        <div class="card mt-3">
          <div class="card-header">
            <h4 class="card-title mb-0">Contacts</h4>
          </div>
          <div class="card-body">
            <div class="row g-3" style="overflow-x:auto;">
              <table class="text-center">
                <thead>
                  <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Country</th>
                    <th>Email</th>
                    <th>Contact #</th>
                    <th>Message</th>
                    <th>Last Reply</th>
                    <th>Reply At</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($contacts as $contact)
                    <tr>
                      <td>{{ $contact->firstname }}</td>
                      <td>{{ $contact->lastname }}</td>
                      <td>{{ $contact->country }}</td>
                      <td>{{ $contact->email }}</td>
                      <td>{{ $contact->contact }}</td>
                      <td>{{ \Str::limit($contact->message, 50, '...') }}</td>
                      <td>{{ \Str::limit($contact->lastReply?->reply, 50, '...') }}</td>
                      <td>{{ $contact->lastReply?->created_at->format('j M, Y') }}</td>
                      <td>
                        <button class="btn bg-dark text-white btn-block" x-on:click="sendReplyForm({{ $contact->id }})"
                          role="button">
                          <i class="fa fa-paper-plane"></i>
                          {{-- Send Reply --}}
                        </button>
                        <a class="btn bg-dark text-white btn-block"
                          href="{{ route('admin.contact.show', ['contact' => $contact->id]) }}" role="button">
                          <i class="fa fa-eye"></i>
                          {{-- Show Reply --}}
                        </a>
                        <button class="btn bg-dark text-white btn-block"
                          x-on:click="deleteConfirmation({{ $contact->id }})">
                          <i class="fa fa-trash" aria-hidden="true"></i>
                          {{-- Delete --}}
                        </button>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
              <div class="d-flex justify-content-between">
                <p>Showing {{ $contacts->firstItem() }} to {{ $contacts->lastItem() }} from {{ $contacts->total() }}
                </p>
                {{ $contacts->onEachSide(0)->links() }}
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
  <!-- Modal -->
  <div class="modal fade" id="deleteContactModal" tabindex="-1" aria-labelledby="deleteContactModalLabel"
    aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog" wire:ignore.self>
      <div class="modal-content" wire:ignore.self>
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="deleteContactModalLabel">Confirmation</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Are You Sure?
        </div>
        <div class="modal-footer">
          <button type="button" x-on:click="deleteContact" class="btn btn-dark text-white btn-block">Yes</button>
          <button type="button" class="btn btn-dark text-white btn-block" data-bs-dismiss="modal">No</button>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="sendReplyModal" tabindex="-1" aria-labelledby="sendReplyModalLabel" aria-hidden="true"
    wire:ignore.self>
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
              @error('contactId')
                <span class="text-danger">{{ $message }}</span>
              @enderror
              @error('message')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-dark text-white btn-block" wire:loading.class='d-none'>Send</button>
            <button type="button" class="btn btn-dark text-white btn-block d-none"
              wire:loading.class.remove='d-none'><i class="fa fa-spinner" aria-hidden="true"></i></button>
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
      Alpine.data('contact', () => ({
        contactId: "",
        message: "",
        deleteConfirmation(contactId) {
          this.contactId = contactId
          $("#deleteContactModal").modal('show')
        },
        deleteContact() {
          this.$wire.deleteContact(this.contactId)
          $("#deleteContactModal").modal('hide')
        },
        sendReplyForm(contactId) {
          this.contactId = contactId
          this.message = ""
          $("#sendReplyModal").modal('show')
        },
        sendReply() {
          this.$wire.sendReply(this.contactId, this.message)
        }
      }))
    })
  </script>
@endpush
