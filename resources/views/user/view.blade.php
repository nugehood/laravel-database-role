<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
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
                      <h1 class="card-title">User Data</h1>
                      <h5 class="card-text"><b>Name</b>: {{$users->name}}</h5>
                      <h5 class="card-text"><b>Real Name</b>: {{$users->email}}</h5>
                      <h5 class="card-text"><b>ID</b>: {{$users->id}}</h5>


                    </div>
                    <div class="d-flex justify-content-between p-3 border-top">
                        <a href="/user/dashboard" class="btn btn-secondary"><i class="bi bi-arrow-bar-left"></i> Back</a>
                        <a href="{{ $users->id }}/edit" class="btn btn-success"><i class="bi bi-tools"></i> Edit</a>
                        <button data-toggle="modal" data-target="#delete" class="btn btn-danger">
                            <i class="bi bi-trash"></i> Delete
                          </button>
                    </div>
                    <div class="card-footer text-muted text-center">
                       Created at {{$users->created_at}}
                      </div>
                  </div>
                </div>

        </div>
        </div>

        <!--Delete Modal-->
        <div class="modal fade" id="delete" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="staticBackdropLabel"><b>Deleting Data</b> you've been <b>WARNED!</b></h5>
                  <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <p>Once you delete a data it can't be reverted.
                      But you can retrieve a data by asking the admin for help.
                      This data will not be available to use forever...
                  </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <form action="/user/{{ $users->id }}" method="post" class="d-inline">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-danger">Take responsibility</button>
                    </form> 
                </div>
              </div>
            </div>
          </div>
        
    @endrole
    
</x-app-layout>
