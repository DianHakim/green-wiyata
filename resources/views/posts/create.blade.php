<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Post</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-4">

        <h1 class="fw-bold mb-4">Create Post</h1>

        <div class="card shadow-sm border-0">
            <div class="card-body">
                <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label class="form-label">Content</label>
        <input type="text" name="pst_content" class="form-control" placeholder="Enter content" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Description</label>
        <textarea name="pst_description" rows="5" class="form-control" placeholder="Enter description"></textarea>
    </div>

    <div class="mb-3">
        <label class="form-label">Date</label>
        <input type="date" name="pst_date" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Image (optional)</label>
        <input type="file" name="pst_img_path" class="form-control" accept="image/*">
    </div>

    <button type="submit" class="btn btn-success">Save</button>
    <button type="submit" href="{{ route('posts.index') }}" class="btn btn-secondary">Cancel</button>
</form>

            </div>
        </div>
    </div>

    <footer class="bg-white border-top py-3 mt-auto">
        <div class="container text-center">
            <small class="text-muted">&copy; 2025 Dashboard by Nabil. All rights reserved.</small>
        </div>
    </footer>
</body>
</html>
