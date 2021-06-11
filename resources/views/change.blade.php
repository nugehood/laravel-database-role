<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }} | Create Flower Data
        </h2>
    </x-slot>
    @role(['superadministrator','administrator'])
        <div class="container">
           
            <div class="row justify-content-center mt-5 mx-auto">
                <div class="col-sm-6">
                  <div class="card">
                    <div class="card text-center">
                        <div class="card-header">
                            Strö
                        </div>
                    </div>
                    <div class="card-body p-3 mb-5 text-justify">
                        <div class="row mb-1">
                            <div class="col-12">
                                <div class="mt-5">
                                  <form action="/flower/{{ $flowers->id }}/upload" method="POST" enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf                            
                                        <input type="file" id="img" name="img"
                                        accept="image/png, image/jpeg">
                                        
                                    </div>
                            </div>      
                            
                          <!--Change Modal-->
                    <div class="modal fade" id="change" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel"><b>Changing Picture</b> you've been <b>WARNED!</b></h5>
                            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                            <p>Once you change a picture it can't be reverted.
                                But you can retrieve a picture by asking the admin for help.
                                This picture will be changed...
                            </p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-danger">Take responsibility</button>
                                </div>
                            </div>
                        </div>
                    </div>
                            </div>                           
                        </div>
                        </form> 
                        <div class="d-flex justify-content-between p-3 border-top">
                            <a href="/flower/{{$flowers->id}}" class="btn btn-secondary"><i class="bi bi-arrow-bar-left"></i> Back</a>
                            <button data-toggle="modal" data-target="#change" class="btn btn-warning">
                                <i class="bi bi-check-circle"></i>Change
                              </button>
                           
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