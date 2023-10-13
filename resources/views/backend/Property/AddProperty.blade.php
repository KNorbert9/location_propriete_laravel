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

                            <h6 class="card-title"> Ajouter nouveau Propriété</h6>

                            <form method="POST" action="{{ route('store.properties') }}" class="forms-sample"
                                enctype="multipart/form-data">
                                @csrf



                                <div class="mb-3">
                                    <label for="name" class="form-label"> Nom du type</label>
                                    <input type="text" class="form-control @error('old_password') is-invalid @enderror"
                                        name="name">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror




                                    <label for="exampleInputUsername1" class="form-label"> Emplacement</label>
                                    <input type="text" class="form-control " name="location">
                                    <label for="exampleInputUsername1" class="form-label"> Area</label>
                                    <input type="text" class="form-control " name="area">
                                    <label for="exampleInputUsername1" class="form-label"> beds</label>
                                    <input type="number" class="form-control " name="beds">
                                    <label for="exampleInputUsername1" class="form-label"> baths</label>
                                    <input type="number" class="form-control " name="baths">
                                    <label for="exampleInputUsername1" class="form-label"> garage</label>
                                    <input type="number" class="form-control " name="garage">
                                    <label for="exampleInputUsername1" class="form-label"> plan</label>
                                    <input type="text" class="form-control " name="plan">


                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Photo</label>
                                        <input type="file" class="form-control" id="images" name="images"
                                            autocomplete="off">
                                    </div>
                                    {{-- <div class="mb-3">
                                        <label for="exempleInputEmail1" class="form-label"></label>
                                        <img id="showImage" class="wd-80 rounded-circle"
                                            src="{{ !empty($profileData->photo) ? url('upload/admin_images/' . $profileData->photo) : url('upload/no_image.jpg') }}"
                                            alt="profile">
                                    </div> --}}

                                    <div>
                                        <label for="property_type_id">séléctionné le type de propriété</label>
                                        <select name="property_type_id" class="form-control">
                                            @foreach ($propertyType as $propertyType)
                                                <option name="property_type_id" value="{{ $propertyType->id }}">
                                                    {{ $propertyType->type_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>


                                    <div>
                                        <label for="ameneties">Sélectionné les ameneties</label>
                                        <div>
                                            @foreach ($ameneties as $ameneties)
                                                <input type="checkbox" class="form-check-input" name="ameneties[]"
                                                    value="{{ $ameneties->id }}">
                                                <label class="form-check-label">
                                                    {{ $ameneties->amenety_name }}
                                                </label>
                                            @endforeach
                                        </div>

                                    </div>


                                </div>



                                <button type="submit" class="btn btn-primary me-2">Sauvegarder</button>

                            </form>

                        </div>
                    </div>

                </div>
            </div>
            <!-- middle wrapper end -->
            <!-- right wrapper start -->

            <!-- right wrapper end -->
        </div>

    </div>
@endsection
