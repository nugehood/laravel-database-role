<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @role(['superadministrator','administrator']) {{ __('Dashboard') }} | User Data @endrole
        </h2>
    </x-slot>

        @role(['superadministrator','administrator'])
        
            <div class="container mb-3 mt-5">
                
                <span>Data Display:</span>
                <div class="btn-group bg-white" role="group" aria-label="Basic Example">
                    <a href="#" class="btn btn-outline-secondary active"
                    data-toggle="tooltip" data-placement="top" title="Display data in table"><i class="bi bi-table"></i></a>
                    <a href="/user/cards" class="btn btn-outline-secondary"
                    data-toggle="tooltip" data-placement="top" title="Display data in card"><i class="bi bi-grid-3x3-gap"></i></a>
                </div>
                <br>
                   <label for="btn-group">Export Data:</label>
                <div class="btn-group mt-3" role="group">
                    <a href="/user/print" class="btn btn-danger">PDF <i class="bi bi-file-earmark-pdf"></i></a>
                    <a href="/user/excel" class="btn btn-success">Excel <i class="bi bi-file-earmark-excel"></i></a>
                </div>
            </div>

        <div class="container mb-3">
            <div class="card">
                <div class="card-body">
                    
                    <form action="/user/filter" method="get">                       
                        <span>
                            <i class="bi bi-filter-square-fill"></i>
                              <b>Filter</b>
                        </span>
                    <select name="selectdata" id="selectdata">
                        <option value="id" selected>Sort by</option>
                        <option value="id">ID</option>
                        <option value="name">Name</option>
                        <option value="email">Email</option>
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
                        <option value="email">Email</option>
                      </select>      
                      |
                      <button type="submit" class="btn btn-secondary">Apply changes <i class="bi bi-pencil-square"></i></button>
                      
                    </div>
                    <input class="form-control mr-sm-2 text-center"
                    id="search" name="search" type="search" placeholder="Search" aria-label="Search">
                </div>
            </div>
            </form>
        
        
        <div class="container">
            {{ $users->appends($_GET)->links() }}
            <table class="table table-striped border text-center bg-light">
                <thead>
                    <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Option</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td><a class="badge badge-success"  href="/user/{{ $user->id }}">View</a></td>
                        </tr>
                    @endforeach
                    
                </tbody>
                </table>
                {{ $users->appends($_GET)->links() }}
        </div>
        @endrole
    
        @role('user')
        <div class="container">

        </div>
        @endrole
</x-app-layout>
