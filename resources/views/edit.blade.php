<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }} | Create Flower Data
        </h2>
    </x-slot>
    @role(['superadministrator','administrator'])
        <div class="container">
           
            <div class="row justify-content-center mt-5">
                <div class="col-sm-6">
                  <div class="card">
                    <div class="card text-center">
                        <div class="card-header">
                            Strö
                        </div>
                    </div>
                    <div class="card-body p-3 mb-5 text-justify">
                        <form action="/flower/{{ $flowers->id }}" method="POST" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                        <div class="row mb-3">
                            
                            <label for="name" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                                value="{{ $flowers->name }}">
                                    @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                              </div>
                            </div>
                            <div class="row mb-3">
                              <label for="real_name" class="col-sm-2 col-form-label">Real Name</label>
                              <div class="col-sm-10">
                                <input type="text" 
                                class="form-control @error('real_name') is-invalid @enderror" 
                                id="real_name" name="real_name"
                                value="{{ $flowers->real_name }}">
                                @error('real_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                 @enderror
                              </div>
                            </div>
                            <div class="row mb-3">
                              <label for="habitat" class="col-sm-2 col-form-label">Habitat</label>
                              <div class="col-sm-10">
                                <input type="text" class="form-control @error('habitat') is-invalid @enderror" id="habitat" name="habitat"
                                value="{{ $flowers->habitat }}">
                                @error('habitat')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                 @enderror
                              </div>
                            </div>                           
                        </div>

  <!--Edit Modal-->
  <div class="modal fade" id="edit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel"><b>Editing Data</b> you've been <b>WARNED!</b></h5>
          <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p>Once you edit a data it can't be reverted.
              But you can revert a data by asking the admin for help.
              This data will be changed...
          </p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            
                <button type="submit" class="btn btn-danger">Take responsibility</button>
            </form> 
        </div>
      </div>
    </div>
  </div>

                        <div class="d-flex justify-content-between p-3 border-top">
                            <a href="{{ url()->previous() }}" class="btn btn-secondary"><i class="bi bi-arrow-bar-left"></i> Back</a>
                            <button data-toggle="modal" data-target="#edit" type="submit" class="btn btn-success"><i class="bi bi-check-circle"></i> Edit</button>
                        </div>
                        <div class="card-footer text-muted text-center">
                       Updated at {{ $flowers->updated_at }}
                      </div>
                  </div>
                </div>

        </div>
        </div>


        
    @endrole
</x-app-layout>