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
                        <div class="row mb-3">
                            <label for="name" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                  <form action="/flower" method="POST">
                                    @csrf
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                                value="{{old('name')}}">
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
                                value="{{old('real_name')}}">
                                @error('real_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                 @enderror
                              </div>
                            </div>
                            <div class="row mb-3">
                              <label for="habitat" class="col-sm-2 col-form-label">Habitat</label>
                              <div class="col-sm-10">
                                <input type="text" class="form-control @error('habitat') is-invalid @enderror" id="habitat" name="habitat"
                                value="{{old('habitat')}}">
                                @error('habitat')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                 @enderror
                              </div>
                            </div>                           
                        </div>
                        <div class="d-flex justify-content-between p-3 border-top">
                            <a href="/dashboard" class="btn btn-secondary"><i class="bi bi-arrow-bar-left"></i> Back</a>
                            <button type="submit" class="btn btn-success"><i class="bi bi-check-circle"></i> Create</button>
                        </div>
                    </form>
                        <div class="card-footer text-muted text-center">
                       Create new data
                      </div>
                  </div>
                </div>

        </div>
        </div>
        
    @endrole
</x-app-layout>