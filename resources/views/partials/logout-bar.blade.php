{{-- Shared top bar for dashboards that have no header of their own --}}
<div class="d-flex justify-content-end align-items-center gap-3 mb-3">
    <span class="text-muted small">{{ Auth::user()->Name }} ({{ Auth::user()->Role }})</span>
    <form method="POST" action="{{ route('logout') }}" class="m-0">
        @csrf
        <button type="submit" class="btn btn-sm btn-outline-danger">Logout</button>
    </form>
</div>
