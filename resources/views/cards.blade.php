<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @role('administrator') {{ __('Dashboard') }} | Flower Data @endrole
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in as <b>{{ Auth::user()->name }}</b>!
                </div>
            </div>
        </div>
    </div>


        @role('administrator')
        <form action="/flower/filter" method="get">  
            <div class="container mb-3">
                Data Display:
                <div class="btn-group bg-white" role="group" aria-label="Basic Example">
                    <a href="/dashboard" class="btn btn-outline-secondary"
                    data-toggle="tooltip" data-placement="top" title="Display data in table"><i class="bi bi-table"></i></a>
                    <a href="#" class="btn btn-outline-secondary active"
                    data-toggle="tooltip" data-placement="top" title="Display data in card"><i class="bi bi-grid-3x3-gap"></i></a>
                </div>
            </div>

        <div class="container mb-3">
            <div class="card">
                <div class="card-body">
                   
                        <span>
                            <i class="bi bi-filter-square-fill"></i>
                              <b>Filter</b>
                        </span>
                    <select name="selectdata" id="selectdata">
                        <option value="id" selected>Sort by</option>
                        <option value="id">ID</option>
                        <option value="name">Name</option>
                        <option value="real_name">Real Name</option>
                        <option value="habitat">Habitat</option>
                      </select>

                    <select name="order" id="order" class="form-select"> 
                        <option value="asc">Ascending</option>
                        <option value="desc">Descending</option>
                      </select>

                    <select name="rows" id="rows" class="form-select">
                        <option value="5" selected>Rows</option>
                        <option value="5">5</option>
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                        <option value="250">250</option>
                        <option value="500">500</option>
                      </select>
                      
                      <select name="searchIndex" id="searchIndex" class="form-select">
                        <option value="id" selected>Search By</option>
                        <option value="id">ID</option>
                        <option value="name">Name</option>
                        <option value="real_name">Real Name</option>
                        <option value="habitat">Habitat</option>
                      </select>      
                      |
                      <button type="submit" class="btn btn-secondary">Apply changes <i class="bi bi-pencil-square"></i></button>
                      
                    </div>
                    <input class="form-control mr-sm-2 text-center"
                    id="search" name="search" type="search" placeholder="Search" aria-label="Search">
                </div>
            </div>
                <input type="hidden" id="cardActive" name="cardActive" value="1">
            </form>
        
        
        <div class="container">
            {{ $flowers->appends($_GET)->links() }}
            <div class="row p-3">
                @foreach ($flowers as $flower)
                        <div class="col-sm-6 mb-2">
                            <div class="card">
                                <img class="card-img-top" src="{{ asset('') }}" alt="Card image cap">
                              <div class="card-body">
                                <h5 class="card-title font-weight-bold">{{ $flower->name }}</h5>
                                <p class="card-text">{{ $flower->real_name }}</p>
                                <p class="card-text font-italic">{{ $flower->habitat }}</p>
                                <a href="/flower/{{ $flower->id }}" class="btn btn-success">View Data</a>
                              </div>
                              <div class="card-footer text-muted d-flex justify-content-between">
                                  <span>
                                    Created at {{ $flower->created_at }}
                                  </span>
                                  <span>
                                    ID {{ $flower->id }}
                                  </span>
                              </div>
                            </div>
                          </div>      
                @endforeach
            </div>
            {{ $flowers->appends($_GET)->links() }}
        </div>
        @endrole
    
        @role('user')
        <div class="container">

        </div>
        @endrole
</x-app-layout>
