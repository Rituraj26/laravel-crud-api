<form action="{{ $id ? route('post.all').'/'.$id : route('post.all') }}" method="POST">
    @if ($id)
        @method('PUT')
    @endif
    @csrf
    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control" id="title" name="title" value="{{ $title }}">
    </div>
    <div class="mb-3">
        <label for="content" class="form-label">Content</label>
        <textarea class="form-control" id="content" rows="3" name="body">{{ $body }}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
