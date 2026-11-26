<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <title>Active Users</title>

    <style>
      body { background:#f5f7fb; color:#333; }
      .app-card { border: none; border-radius: 10px; }
      .table thead { background:#edf2fb; }
      .muted-small { font-size:.85rem; color:#6c757d; }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm mb-4">
  <div class="container">
    <a class="navbar-brand fw-bold" href="/">User Management</a>
    <div class="ms-auto d-flex gap-2">
      <a href="/archived" class="btn btn-outline-secondary btn-sm">Archived</a>
      <a href="/form" class="btn btn-primary btn-sm">New Register</a>
    </div>
  </div>
</nav>

<div class="container">
  <div class="card app-card shadow-sm">
    <div class="card-body p-4">
      <div class="d-flex justify-content-between align-items-center mb-3">
        <h5 class="mb-0 fw-semibold">Active Users</h5>
        <small class="muted-small">Clean · Simple · Business</small>
      </div>

      @if(session('status'))
        <div class="alert alert-success small">{{ session('status') }}</div>
      @endif

      <div class="table-responsive">
        <table class="table table-hover align-middle table-borderless">
          <thead class="text-center">
            <tr>
              <th class="text-start">Username</th>
              <th>Role</th>
              <th>First Name</th>
              <th>Last Name</th>
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
                  <a href="{{ url('/update/'.$member->id) }}" class="btn btn-outline-warning btn-sm me-1">
                    <i class="bi bi-pencil-square"></i>
                  </a>
                  <form action="{{ url('/delete/'.$member->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this user?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-outline-danger btn-sm">
                      <i class="bi bi-trash3"></i>
                    </button>
                  </form>
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="7" class="text-center text-muted py-4">No active users found.</td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>

      <div class="d-flex justify-content-center mt-3">
        {{ $users->links() }}
      </div>
    </div>

    <div class="card-footer bg-transparent text-center muted-small">
      Showing {{ count($users) }} active {{ Str::plural('user', count($users)) }}.
    </div>
  </div>
</div>

<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>