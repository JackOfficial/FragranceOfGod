@csrf

<div x-data="{
        logoPreview: null,
        documents: [],
        previewLogo(e) {
            const file = e.target.files[0];
            if (!file) return;
            this.logoPreview = URL.createObjectURL(file);
        },
        handleDocuments(e) {
            this.documents = Array.from(e.target.files);
        },
        removeDocument(index) {
            this.documents.splice(index, 1);
        }
    }">

<ul class="nav nav-pills mb-3" id="org-tabs">
    <li class="nav-item">
        <a class="nav-link active" data-toggle="pill" href="#profile">
            <i class="fas fa-building"></i> Profile
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="pill" href="#mission">
            <i class="fas fa-bullseye"></i> Mission
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="pill" href="#contact">
            <i class="fas fa-phone"></i> Contact
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="pill" href="#documents">
            <i class="fas fa-file-alt"></i> Documents
        </a>
    </li>
</ul>

<div class="tab-content">

<!-- ================= PROFILE ================= -->
<div class="tab-pane fade show active" id="profile">
    <div class="card shadow-sm border-0">
        <div class="card-body">

            <div class="row">
                <div class="col-md-8">
                    <div class="mb-3">
                        <label>Organization Name *</label>
                        <input type="text" name="name" class="form-control form-control-lg"
                               value="{{ old('name', $organization->name ?? '') }}" required>
                    </div>

                    <div class="mb-3">
                        <label>Slogan</label>
                        <input type="text" name="slogan" class="form-control"
                               value="{{ old('slogan', $organization->slogan ?? '') }}">
                    </div>
                </div>

                <!-- LOGO WITH PREVIEW -->
                <div class="col-md-4 text-center">
                    <label>Logo</label>

                    <input type="file"
                           name="logo"
                           class="form-control mb-2"
                           accept="image/*"
                           @change="previewLogo">

                    <!-- Alpine preview -->
                    <template x-if="logoPreview">
                        <img :src="logoPreview"
                             class="img-thumbnail mt-2"
                             style="max-height:120px;">
                    </template>

                    <!-- Existing logo -->
                    @if(isset($organization) && $organization->logos()->exists())
                        <img src="{{ asset('storage/'.$organization->logos->first()->file_path) }}"
                             class="img-thumbnail mt-2"
                             style="max-height:120px;">
                    @endif
                </div>
            </div>

            <div class="mb-3">
                <label>About Organization</label>
                <textarea name="about" rows="4" class="form-control">
{{ old('about', $organization->about ?? '') }}
                </textarea>
            </div>

        </div>
    </div>
</div>

<!-- ================= MISSION ================= -->
<div class="tab-pane fade" id="mission">
    <div class="card shadow-sm border-0">
        <div class="card-body">

            @foreach(['mission','vision','values','objectives'] as $field)
                <div class="mb-3">
                    <label class="fw-bold">{{ ucfirst($field) }}</label>
                    <textarea name="{{ $field }}" rows="3" class="form-control">
{{ old($field, $organization->$field ?? '') }}
                    </textarea>
                </div>
            @endforeach

        </div>
    </div>
</div>

<!-- ================= CONTACT ================= -->
<div class="tab-pane fade" id="contact">
    <div class="card shadow-sm border-0">
        <div class="card-body">

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

            <hr>

            <h6 class="text-muted">Social Media</h6>

            @foreach(['facebook','twitter','instagram','youtube','linkedin'] as $social)
                <div class="mb-2">
                    <input type="url" name="social_media[{{ $social }}]"
                           class="form-control"
                           placeholder="{{ ucfirst($social) }} link"
                           value="{{ old('social_media.'.$social, $organization->social_media[$social] ?? '') }}">
                </div>
            @endforeach

        </div>
    </div>
</div>

<!-- ================= DOCUMENTS ================= -->
<div class="tab-pane fade" id="documents">
    <div class="card shadow-sm border-0">
        <div class="card-body">

            <h5 class="mb-3">Organization Documents</h5>

            <div class="mb-3">
                <label>Upload Documents</label>
                <input type="file"
                       name="documents[]"
                       class="form-control"
                       multiple
                       @change="handleDocuments">
                <small class="text-muted">
                    Registration certificate, policies, reports, MoUs, etc.
                </small>
            </div>

            <!-- Alpine preview for NEW documents -->
            <div class="row" x-show="documents.length">
                <template x-for="(doc, index) in documents" :key="index">
                    <div class="col-md-4 mb-3">
                        <div class="card border">
                            <div class="card-body text-center">
                                <i class="fas fa-file fa-2x text-secondary"></i>
                                <p class="small mt-2" x-text="doc.name"></p>
                                <button type="button"
                                        class="btn btn-sm btn-outline-danger"
                                        @click="removeDocument(index)">
                                    Remove
                                </button>
                            </div>
                        </div>
                    </div>
                </template>
            </div>

            <!-- Existing documents -->
            @if(isset($organization))
                <div class="row mt-3">
                    @foreach($organization->documents as $doc)
                        <div class="col-md-4 mb-3">
                            <div class="card border">
                                <div class="card-body text-center">
                                    <i class="fas fa-file-pdf fa-2x text-danger"></i>
                                    <p class="small mt-2">{{ $doc->title ?? 'Document' }}</p>
                                    <a href="{{ asset('storage/'.$doc->file_path) }}"
                                       target="_blank"
                                       class="btn btn-sm btn-outline-primary">
                                        View
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

        </div>
    </div>
</div>

</div>
</div>
