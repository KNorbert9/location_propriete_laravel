@extends('admin.admin_dashboard')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <div class="page-content">

        <div class="row profile-body">

            <!-- middle wrapper start -->
            <div class="col-md-8 col-xl-6 middle-wrapper">
                <div class="row">

                    <div class="card">
                        <div class="card-body">

                            <h6 class="card-title"> Mettre à jour une propriété </h6>

                            <form method="POST" action="{{ route('update.valid.properties', $property->id) }}" class="forms-sample"
                                enctype="multipart/form-data">
                                @csrf

                                <input type="hidden" name="id" value="{{ $property->id }}">

                                <div class="mb-3">
                                    <label for="exampleInputUsername1" class="form-label"> Nom du type</label>
                                    <input type="text" class="form-control @error('old_password') is-invalid @enderror"
                                        name="name" value="{{ $property->name }}">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div>
                                    <label for="exampleInputUsername1" class="form-label"> Emplacement</label>
                                    <input type="text" class="form-control " name="location"
                                        @error('old_password') is-invalid @enderror value="{{ $property->location }}">
                                    @error('location')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div>
                                    <label for="exampleInputUsername1" class="form-label"> Area</label>
                                    <input type="text" class="form-control " name="area"
                                        value="{{ $property->area }}">
                                    @error('area')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div>
                                    <label for="exampleInputUsername1" class="form-label"> beds</label>
                                    <input type="number" class="form-control " name="beds"
                                        value="{{ $property->beds }}">
                                    @error('beds')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div>
                                    <label for="exampleInputUsername1" class="form-label"> baths</label>
                                    <input type="number" class="form-control " name="baths"
                                        value="{{ $property->baths }}">
                                    @error('baths')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div>
                                    <label for="exampleInputUsername1" class="form-label"> garage</label>
                                    <input type="number" class="form-control " name="garage"
                                        value="{{ $property->garage }}">
                                    @error('garage')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div>
                                    <label for="exampleInputUsername1" class="form-label"> plan</label>
                                    <input type="text" class="form-control " name="plan"
                                        value="{{ $property->plan }}">
                                    @error('plan')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Photo</label>
                                        <input type="file" class="form-control" id="images" name="images"
                                            autocomplete="off" value="{{ $property->image }}">
                                    </div>
                                    @error('images')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    {{-- <div class="mb-3">
                                        <label for="exempleInputEmail1" class="form-label"></label>
                                        <img id="showImage" class="wd-80 rounded-circle"
                                            src="{{ !empty($profileData->photo) ? url('upload/admin_images/' . $profileData->photo) : url('upload/no_image.jpg') }}"
                                            alt="profile">
                                    </div> --}}
                                </div>

                                <div>
                                    <label for="property_type_id">séléctionné le type de propriété</label>
                                    <select name="property_type_id" class="form-control">
                                        @foreach ($propertyType as $propertyType)
                                            <option name="property_type_id" value="{{ $propertyType->id }}"
                                                {{ $property->property_type_id == $propertyType->id ? 'select' : '' }}>
                                                {{ $propertyType->type_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('property_type_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div>

                                    <label for="ameneties">Sélectionné les ameneties</label>
                                    <div>
                                        @foreach ($ameneties as $ameneties)
                                            <input type="checkbox" class="form-check-input" name="ameneties[]"
                                                value="{{ $ameneties->id }}" {{ in_array($ameneties->id, $property->ameneties->pluck('id')->toArray()) ? 'checked' : '' }}>
                                            <label class="form-check-label">
                                                {{ $ameneties->amenety_name }}
                                            </label>
                                        @endforeach
                                        @error('ameneties[]')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>



                                <button type="submit" class="btn btn-primary me-2">Sauvegarder</button>

                            </form>

                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>
@endsection
