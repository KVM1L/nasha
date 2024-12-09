@extends('admin.layouts.app')

@section('content')
    <div class="body flex-grow-1 px-3">
        <div class="container-lg">

            <div class="card mb-3">
                <div class="card-body">

                    <h4 class="card-title mb-0">Edit Contact Information</h4>

                    @if ($errors->any())
                        <div class="alert alert-danger mt-3">
                            @foreach ($errors->all() as $error)
                                - {{ $error }}<br>
                            @endforeach
                        </div>
                    @endif

                    @if (session('success'))
                        <div class="alert alert-success mt-3">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('admin.settings.update') }}" method="post" class="mt-3" enctype="multipart/form-data">
                        @csrf

                        <!-- Telegram -->
                        <div class="row">
                            <div class="col-md-12">
                                <label for="telegram" class="form-label">Telegram</label>
                                <div class="input-group mb-3">
                                    <input type="text" name="telegram" id="telegram" class="form-control"
                                           value="{{ old('telegram', $settings['telegram'] ?? '') }}">
                                </div>
                            </div>

                            <!-- Instagram -->
                            <div class="col-md-12">
                                <label for="instagram" class="form-label">Instagram</label>
                                <div class="input-group mb-3">
                                    <input type="text" name="instagram" id="instagram" class="form-control"
                                           value="{{ old('instagram', $settings['instagram'] ?? '') }}">
                                </div>
                            </div>

                            <!-- WhatsApp -->
                            <div class="col-md-12">
                                <label for="whatsapp" class="form-label">WhatsApp</label>
                                <div class="input-group mb-3">
                                    <input type="text" name="whatsapp" id="whatsapp" class="form-control"
                                           value="{{ old('whatsapp', $settings['whatsapp'] ?? '') }}">
                                </div>
                            </div>

                            <!-- Phone -->
                            <div class="col-md-12">
                                <label for="phone" class="form-label">Phone</label>
                                <div class="input-group mb-3">
                                    <input type="text" name="phone" id="phone" class="form-control"
                                           value="{{ old('phone', $settings['phone'] ?? '') }}">
                                </div>
                            </div>

                            <!-- Email -->
                            <div class="col-md-12">
                                <label for="email" class="form-label">Email</label>
                                <div class="input-group mb-3">
                                    <input type="email" name="email" id="email" class="form-control"
                                           value="{{ old('email', $settings['email'] ?? '') }}">
                                </div>
                            </div>

                            <!-- Google Maps URL -->
                            <div class="col-md-12">
                                <label for="google_maps_url" class="form-label">Google Maps URL</label>
                                <div class="input-group mb-3">
                                    <input type="url" name="google_maps_url" id="google_maps_url" class="form-control"
                                           value="{{ old('google_maps_url', $settings['google_maps_url'] ?? '') }}">
                                </div>
                            </div>

                            <!-- Map Image -->
                            <div class="col-md-12">
                                <label for="map_image" class="form-label">Map Image</label>
                                @if (!empty($settings['map_image']))
                                    <div class="mb-3">
                                        <img src="{{ Storage::url($settings['map_image']) }}" alt="Map Image" class="img-thumbnail"
                                             style="max-width:200px;">
                                    </div>
                                @endif
                                <div class="input-group mb-3">
                                    <input type="file" name="map_image" id="map_image" class="form-control" accept="image/*">
                                </div>
                            </div>

                            <div class="col">
                                <button type="submit" class="btn btn-dark btn-lg mt-3 mb-3">Save</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
