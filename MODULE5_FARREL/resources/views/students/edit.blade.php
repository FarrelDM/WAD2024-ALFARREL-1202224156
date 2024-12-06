<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Edit Student</h1>

        <!-- Form to edit existing student -->
        <form action="{{ route('students.update', $students->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="mb-3">
                <label for="nim" class="form-label">NIM</label>
                <input type="text" class="form-control" id="nim" name="nim" 
                       value="{{ old('nim', $students->nim) }}" 
                       placeholder="Enter NIM" required>
                @error('nim')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mb-3">
                <label for="student_name" class="form-label">Student Name</label>
                <input type="text" class="form-control" id="student_name" name="student_name" 
                       value="{{ old('student_name', $students->student_name) }}" 
                       placeholder="Enter Student Name" required>
                @error('student_name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" 
                       value="{{ old('email', $students->email) }}" 
                       placeholder="Enter Email" required>
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mb-3">
                <label for="major" class="form-label">Major</label>
                <input type="text" class="form-control" id="major" name="major" 
                       value="{{ old('major', $students->major) }}" 
                       placeholder="Enter Major" required>
                @error('major')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mb-3">
                <label for="lecturer_id" class="form-label">Lecturer</label>
                <select class="form-select" id="lecturer_id" name="lecturer_id" required>
                    <option value="" disabled>Select a Lecturer</option>
                    @foreach($lecturers as $lecturer)
                        <option value="{{ $lecturer->id }}" 
                                {{ $students->lecturer_id == $lecturer->id ? 'selected' : '' }}>
                            {{ $lecturer->lecturers_name }}
                        </option>
                    @endforeach
                </select>
                @error('lecturer_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('students.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</body>
</html>