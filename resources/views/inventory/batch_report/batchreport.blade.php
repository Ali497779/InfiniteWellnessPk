<x-layouts.app title="Good Receive Note Create">
    @push('styles')
        <link nonce="{{ csp_nonce() }}" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css"
            rel="stylesheet" />
    @endpush
    <div class="container-fluid">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h3>Batch Report</h3>
                <div class="container">
                        
                    <form method="Get" role="search">
                        <div class="search-container">
                              <input type="text" name="search_data" id="search_data" class="search_data form-control" value="{{$search_data}}" placeholder="Search by Name or ID ...">
                              <button type="submit" class="search-button">
                                <i class="fa fa-search"  style="font-size:48px;color:rgb(1, 7, 41);"></i>
                              </button>
                            </div>
                    </form>
            </div>
            </div>
            <div class="card-body">

                <table class="table table-bordered">
                    <thead class="table-dark">
                        <th>Id</th>
                        <th>Medicine Name</th>
                        <th>Actions</th>
                    </thead>
                    <tbody class="table-light">
                        @foreach ($batches as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->name }}</td>
                                <td>
                                    <a href="{{ url('inventory/batch-pos-report/show') }}/{{ $product->id }}"
                                        class="btn btn-primary btn-sm">View batch Pos</a>
                                </td>
                        @endforeach
                    </tbody>
                </table>
                {{ $batches->links() }}
            </div>
</x-layouts.app>
<style>
    .search-input {
                        padding: 10px;
                        border: 2px solid #ccc;
                        border-radius: 25px;
                        outline: none;
                        width: 200px;
                        transition: width 0.4s ease-in-out;
                        font-size: 16px;
                      }
                      .search-container{
                        display: flex;

                      }
                      
                      /* Style for the search button */
                      .search-button {
                      
                      
                        background-color: transparent;
                        font-size: 30px;
                        border: none;
                        outline: none;
                        cursor: pointer;
                        z-index: 10;
                      }
                      .fa-search:before{
                          font-size: 30px;
                          /* position: relative;
                          left:10px ;
                          bottom:40px */
                      }
                      /* Style for the search icon */
                      .search-button i {
                        color: #d60b0b;
                        font-size: 20px;

                      }
                      
                      
                      /* Transition effect for the search icon color */
                      .search-input:focus + .search-button i{
                        color: #a10505;
                      }
</style>