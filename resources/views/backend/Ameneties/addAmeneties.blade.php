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

                            <h6 class="card-title"> Ajouter nouveau amenisty</h6>

                            <form method="POST" action="{{ route('store.ameneties') }}" class="forms-sample"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="mb-3">
                                    <label for="exampleInputUsername1" class="form-label"> Nom du type</label>
                                    <input type="text" class="form-control @error('old_password') is-invalid @enderror"
                                    name="amenety_name" >
                                    @error('amenety_name')
                                      <span class="text-danger">{{ $message }}</span>
                                    @enderror

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
