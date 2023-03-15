<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalExample"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalExample">Are you Sure You wanted to Delete?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Delete" below if you want to delete Book!.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-danger" href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('book-delete-form').submit();">
                    Delete
                </a>
                <form id="book-delete-form" method="POST" action="{{ route('books.destroy', ['id' => $author->id,'bookId' =>'bookId'] ) }}">
                    @csrf
                    @method('DELETE')
                    <input id="book_id" name="book_id" type="hidden" value="">
                </form>
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="deleteAuthor" tabindex="-1" role="dialog" aria-labelledby="deleteModalExample"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalExample">Are you Sure You wanted to Delete?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Delete" below if you want to delete Author!.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-danger" href=""
                   onclick="event.preventDefault();
                   document.getElementById('author-delete-form').submit();
                   ">
                    Delete
                </a>
                <form id="author-delete-form" method="POST" action="{{ route('authors.destroy', ['id' => $author->id,] ) }}">
                    @csrf
                    @method('DELETE')

                </form>
            </div>
        </div>
    </div>
</div>

@section('scripts')
    <script>
        $(document).on('click', '.delete', function () {
            let id = $(this).attr('data-bookId');

            $("input[id=book_id]").value('kk');
        });
    </script>
@endsection
