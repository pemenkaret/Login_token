<!-- resources/views/dashboard.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}"> <!-- Menghubungkan stylesheet jika diperlukan -->
</head>
<body>
    <div class="container">
        <h1>Welcome to the Dashboard</h1>

        <!-- Contoh form dengan token CSRF -->
        <form action="{{ route('dashboard') }}" method="POST">
            @csrf
            <!-- Field form lainnya -->
            <div class="form-group">
                <label for="exampleInput">Example Input</label>
                <input type="text" name="exampleInput" class="form-control" id="exampleInput" placeholder="Enter something">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    
    <script src="{{ asset('js/app.js') }}"></script> <!-- Menghubungkan script jika diperlukan -->
</body>
</html>
