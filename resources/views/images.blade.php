<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>عرض الصور والملفات</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>

<body>

<div class="container mt-5">
    <div class="row">

        @forelse($allImages as $image)
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm">
                @if(Str::endsWith($image->path , ['jpg', 'jpeg', 'png', 'gif']))
                    <img src="{{ asset('storage/' . $image->path) }}" class="card-img-top" alt="صورة مرفوعة"
                         style="height: 200px; object-fit: contain;">
                    <div class="card-body text-center">
                        <a href="{{ asset('storage/' . $image->path) }}" download="{{ $image->path }}" class="btn btn-primary">
                            <i class="fas fa-download"></i> تنزيل الصورة
                        </a>
                    </div>
                @elseif (Str::endsWith($image->path , 'pdf'))
                    <div class="card-body text-center">
                        <img src="{{ asset('storage/images/تنزيل (1).png') }}" alt="">
                        <p><strong>ملف PDF</strong></p>
                        <a href="{{ asset('storage/' . $image->path) }}" target="_blank" class="btn btn-primary">
                            <i class="fas fa-eye"></i> عرض ملف PDF
                        </a>
                        <a href="{{ asset('storage/' . $image->path) }}" download="{{ $image->path }}" class="btn btn-success mt-2">
                            <i class="fas fa-download"></i> تنزيل PDF
                        </a>
                    </div>
                @endif
                <div class="card-footer text-center">
                    <small class="text-muted">تم رفعه بتاريخ {{ $image->created_at->format('d/m/Y') }}</small>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <div class="alert alert-warning text-center" role="alert">
                لا توجد صور حالياً للعرض.
            </div>
        </div>
        @endforelse

    </div>
</div>


    <!-- Bootstrap 5 JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
