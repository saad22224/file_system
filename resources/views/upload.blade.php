<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>رفع الصور</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f7fc;
            font-family: 'Arial', sans-serif;
        }
        .card {
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .card-header {
            border-top-left-radius: 12px;
            border-top-right-radius: 12px;
        }
        .form-control {
            border-radius: 8px;
            padding: 10px;
        }
        .btn-primary {
            border-radius: 8px;
            padding: 12px;
        }
        .alert {
            border-radius: 8px;
        }
        .container {
            margin-top: 50px;
        }
        .footer {
            text-align: center;
            margin-top: 40px;
            font-size: 14px;
        }
    </style>
</head>

<body>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <!-- Form to upload images -->
                <div class="card shadow-sm">
                    <div class="card-header text-center bg-primary text-white">
                        <h4>رفع الصور</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('show') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <!-- Image Input -->
                            <div class="mb-3">
                                <label for="image" class="form-label">اختر صورة:</label>
                                <input type="file" name="images[]" id="image" class="form-control" multiple required>
                            </div>
                            <!-- Submit Button -->
                            <button type="submit" class="btn btn-primary w-100">رفع الصورة</button>
                        </form>
                    </div>
                </div>

                <!-- Display success or error message -->
                @if(session('success'))
                    <div class="alert alert-success mt-3">
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger mt-3">
                        {{ session('error') }}
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        <p>&copy; 2024 جميع الحقوق محفوظة</p>
    </div>

    <!-- Bootstrap 5 JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
