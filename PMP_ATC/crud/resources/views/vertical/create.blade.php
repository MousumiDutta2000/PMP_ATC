<!-- resources/views/vertical/create.blade.php -->

<h1>Create Vertical</h1>

@if ($errors->any())
    <div>
        <strong>Validation Errors:</strong>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('verticals.store') }}" method="POST">
    @csrf
    <div>
        <label for="vertical_name">Vertical Name:</label>
        <input type="text" name="vertical_name" id="vertical_name" required>
    </div>
    <div>
        <label for="vertical_head_name">Vertical Head Name:</label>
        <input type="text" name="vertical_head_name" id="vertical_head_name" required>
    </div>
    <div>
        <label for="vertical_head_emailId">Vertical Head Email:</label>
        <input type="email" name="vertical_head_emailId" id="vertical_head_emailId" required>
    </div>
    <div>
        <label for="vertical_head_contact">Vertical Head Contact:</label>
        <input type="text" name="vertical_head_contact" id="vertical_head_contact" required>
    </div>
    <button type="submit">Create</button>
</form>

<a href="{{ route('verticals.index') }}">Back</a>
