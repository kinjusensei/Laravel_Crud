<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <title>Register</title>
  <style>
    body { background:#f5f7fb; }
    .app-card { border-radius:10px; border:none; }
    label { font-weight:600; }
  </style>
</head>
<body>
<nav class="navbar navbar-light bg-white shadow-sm mb-4">
  <div class="container">
    <a class="navbar-brand fw-bold" href="/">User Management</a>
    <div class="ms-auto">
      <a href="/" class="btn btn-outline-secondary btn-sm me-2">Active</a>
      <a href="/archived" class="btn btn-outline-secondary btn-sm">Archived</a>
    </div>
  </div>
</nav>

<div class="container">
  <div class="card app-card shadow-sm mx-auto" style="max-width:760px;">
    <div class="card-body p-4">
      <h5 class="mb-3">User Registration</h5>

      <form action="" method="post" novalidate>
        @csrf

        <div class="row g-3">
          <div class="col-md-6">
            <label for="first_name" class="form-label">First Name</label>
            <input type="text" name="first_name" id="first_name" class="form-control" placeholder="Enter first name">
          </div>

          <div class="col-md-6">
            <label for="last_name" class="form-label">Last Name</label>
            <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Enter last name">
          </div>

          <div class="col-md-6">
            <label for="middle_name" class="form-label">Middle Name</label>
            <input type="text" name="middle_name" id="middle_name" class="form-control" placeholder="Enter middle name">
          </div>

          <div class="col-md-6">
            <label for="extension_name" class="form-label">Extension</label>
            <input type="text" name="extension_name" id="extension_name" class="form-control" placeholder="e.g. Jr., Sr.">
          </div>

          <div class="col-md-6">
            <label for="username" class="form-label">Username</label>
            <input type="text" name="username" id="username" class="form-control" placeholder="Choose a username">
          </div>

          <div class="col-md-6">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="Enter a password">
          </div>

          <div class="col-12">
            <label for="role" class="form-label">Role</label>
            <select name="role" id="role" class="form-select">
              <option value="" disabled selected>Select a role</option>
              <option value="Admin">Admin</option>
              <option value="Staff">Staff</option>
              <option value="User">User</option>
            </select>
          </div>

          <div class="col-12 text-end mt-3">
            <button type="submit" class="btn btn-primary">Register</button>
          </div>
        </div>
      </form>
    </div>

    <div class="card-footer text-muted small text-center">
      &copy; {{ date('Y') }} User Management System
    </div>
  </div>
</div>

<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>