<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }} | Create User Data
        </h2>
    </x-slot>
    @ability('administrator,superadministrator', 'users-create')
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
                            <label for="name" class="col-3 col-form-label">Name</label>
                            <div class="col-9">
                                  <form action="/user" method="POST">
                                    @csrf
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                                value="{{old('name')}}">
                                    @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                              </div>
                            </div>
                            <div class="row mb-3">
                              <label for="email" class="col-3 col-form-label">Email</label>
                              <div class="col-9">
                                <input type="text" 
                                class="form-control @error('email') is-invalid @enderror" 
                                id="email" name="email"
                                value="{{old('email')}}">
                                @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                 @enderror
                              </div>
                            </div>
                            <div class="row mb-3">
                              <label for="password" class="col-3 col-form-label">Password</label>
                              <div class="col-9">
                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password"
                                value="{{old('password')}}">
                                @error('password')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                 @enderror
                              </div>
                            </div>
                            <div class="row mb-3">    
                                <label class="col-3 font-weight-bold" for="">Roles</label>
                                    <div class="col-2">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="user" name="user" value="user">
                                            <label class="form-check-label" for="inlineCheckbox1">User</label>
                                        </div>  
                                    </div>
                                    <div class="col-2">  
                                    <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="admin" name="admin" value="administrator">
                                    <label class="form-check-label" for="inlineCheckbox1">Admin</label>
                                </div>
                                </div>

                                <div class="col-2">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="superadmin" name="superadmin" value="superadministrator">
                                    <label class="form-check-label" for="inlineCheckbox1">Superadmin</label>
                                  </div>  
                                </div>
                                </div>
                            </div>
                                            
                            <div class="d-flex justify-content-between p-3 border-top">
                                <a href="/dashboard" class="btn btn-secondary"><i class="bi bi-arrow-bar-left"></i> Back</a>
                                <button type="submit" class="btn btn-success"><i class="bi bi-check-circle"></i> Create</button>
                            </div>
                        </div>
                    </form>
                        <div class="card-footer text-muted text-center">
                       Create new data
                      </div>
                  </div>
                </div>

        </div>
        </div>
        
    @endability
</x-app-layout>