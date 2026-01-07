@csrf

<div class="row">
    <div class="col-md-6 mb-3">
        <label>Name <span class="text-danger">*</span></label>
        <input type="text" name="name" class="form-control"
               value="{{ old('name', $organization->name ?? '') }}" required>
    </div>

    <div class="col-md-6 mb-3">
        <label>Slogan</label>
        <input type="text" name="slogan" class="form-control"
               value="{{ old('slogan', $organization->slogan ?? '') }}">
    </div>
</div>

@foreach(['about','mission','vision','values','objectives'] as $field)
    <div class="mb-3">
        <label>{{ ucfirst($field) }}</label>
        <textarea name="{{ $field }}" rows="3" class="form-control">
{{ old($field, $organization->$field ?? '') }}
        </textarea>
    </div>
@endforeach

<div class="row">
    <div class="col-md-6 mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control"
               value="{{ old('email', $organization->email ?? '') }}">
    </div>

    <div class="col-md-6 mb-3">
        <label>Phone</label>
        <input type="text" name="phone" class="form-control"
               value="{{ old('phone', $organization->phone ?? '') }}">
    </div>
</div>

<div class="mb-3">
    <label>Physical Address</label>
    <input type="text" name="physical_address" class="form-control"
           value="{{ old('physical_address', $organization->physical_address ?? '') }}">
</div>

<div class="mb-3">
    <label>Organization Logo</label>
    <input type="file" name="logo" class="form-control">

    @if(isset($organization) && $organization->logos()->exists())
        <div class="mt-2">
            <img src="{{ asset('storage/'.$organization->logos->first()->file_path) }}"
                 height="60" class="img-thumbnail">
        </div>
    @endif
</div>
