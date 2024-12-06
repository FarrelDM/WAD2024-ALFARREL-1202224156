<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Lecturer</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Add New Lecturer</h1>
        <form action="{{ route('lecturers.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="lecturers_code" class="form-label">Lecturer Code</label>
                <input type="text" class="form-control" id="lecturers_code" name="lecturers_code" placeholder="Enter unique 3-character code" required>
            </div>
            <div class="mb-3">
                <label for="lecturers_name" class="form-label">Lecturer Name</label>
                <input type="text" class="form-control" id="lecturers_name" name="lecturers_name" placeholder="Enter lecturer name" required>
            </div>
            <div class="mb-3">
                <label for="nip" class="form-label">NIP</label>
                <input type="text" class="form-control" id="nip" name="nip" placeholder="Enter unique NIP" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter email address" required>
            </div>
            <div class="mb-3">
                <label for="telephone_number" class="form-label">Telephone Number</label>
                <input type="text" class="form-control" id="telephone_number" name="telephone_number" placeholder="Enter phone number" required>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="{{ route('lecturers.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</body>
</html>
