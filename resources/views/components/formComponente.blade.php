@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="card shadow-lg p-4 border-0 rounded-3">
    <div class="card-body">
<form action="{{ $action }}" method="{{ $method ?? 'POST' }}" class="mb-3">
    @csrf

    @foreach ($campos as $campo)
        <div class="mb-3">
            <label
                for="{{ $campo['name'] }}"
                class="form-label">
                {{ $campo['label'] }}
            </label>

            <input
                type="{{ $campo['type'] ?? 'text' }}"
                name="{{ $campo['name'] }}"
                id="{{ $campo['name'] }}"
                class="form-control"
                value="{{ $campo['value'] ?? '' }}"
                placeholder="{{ $campo['placeholder'] ?? '' }}"
                {{ $campo['required'] ?? false ? 'required' : '' }}
            >
        </div>
    @endforeach

    <button type="submit" class="btn btn-primary">{{ $botao ?? 'Salvar' }}</button>
</form>
</div>
</div>
