<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <title>Archived Users</title>
  <style>
    body { background:#f5f7fb; }
    .app-card { border-radius:10px; border:none; }
    .muted-small { font-size:.85rem; color:#6c757d; }
  </style>
</head>
<body>
<nav class="navbar navbar-light bg-white shadow-sm mb-4">
  <div class="container">
    <a class="navbar-brand fw-bold" href="/">User Management</a>
    <div class="ms-auto">
      <a href="/" class="btn btn-outline-primary btn-sm">Active</a>
    </div>
  </div>
</nav>

<div class="container">
  <div class="card app-card shadow-sm">
    <div class="card-body p-4">
      <div class="d-flex justify-content-between align-items-center mb-3">
        <h5 class="mb-0 fw-semibold">Archived Users</h5>
        <small class="muted-small">Archived records for reference</small>
      </div>

      <div class="table-responsive">
        <table class="table table-hover align-middle table-borderless">
          <thead class="text-center">
            <tr>
              <th class="text-start">Username</th>
              <th>Role</th>
              <th>First</th>
              <th>Last</th>
              <th>Middle</th>
              <th>Ext.</th>
              <th class="text-end">Actions</th>
            </tr>
          </thead>
          <tbody>
            @forelse($users as $member)
              <tr class="text-center">
                <td class="text-start">{{ $member->username }}</td>
                <td>
                  <span class="badge
                    @if($member->role == 'Admin') bg-danger
                    @elseif($member->role == 'Staff') bg-warning text-dark
                    @else bg-info text-dark
                    @endif">
                    {{ $member->role }}
                  </span>
                </td>
                <td>{{ $member->first_name }}</td>
                <td>{{ $member->last_name }}</td>
                <td>{{ $member->middle_name }}</td>
                <td>{{ $member->extension_name }}</td>
                <td class="text-end">
                  <form action="{{ url('/restore/'.$member->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Restore this user?')">
                    @csrf
                    <button class="btn btn-success btn-sm">
                      <i class="bi bi-arrow-counterclockwise"></i>
                    </button>
                  </form>
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="7" class="text-center text-muted py-4">No archived users found.</td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>

    <div class="card-footer bg-transparent text-center muted-small">
      Showing {{ count($users) }} archived {{ Str::plural('user', count($users)) }}.
    </div>
  </div>
</div>

<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>