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
        
        
        <div class="container mb-3">
            <div class="card">
                <div class="card-body">
                    
                    <form action="/flower/filter" method="get">                       
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
                      |
                      <button type="submit" class="btn btn-secondary">Apply changes</button>
                    </div>
                </div>
            </div>
            </form>
        
        
        <div class="container">
            {{ $flowers->appends($_GET)->links() }}
            <table class="table table-striped border text-center bg-light">
                <thead>
                    <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Real Name</th>
                    <th scope="col">Habitat</th>
                    <th scope="col">Option</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($flowers as $flower)
                        <tr>
                            <td>{{$flower->id}}</td>
                            <td>{{$flower->name}}</td>
                            <td>{{$flower->real_name}}</td>
                            <td>{{$flower->habitat}}</td>
                            <td><a class="badge badge-success"  href="/flower/{{ $flower->id }}">View</a></td>
                        </tr>
                    @endforeach
                    
                </tbody>
                </table>
                {{ $flowers->appends($_GET)->links() }}
        </div>
        @endrole
    
        @role('user')
        <div class="container">

        </div>
        @endrole

</x-app-layout>
