@include('header')
@include('navbar')

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-body">
            
          @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-dismissible show fade">
                      <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                          <span>&times;</span>
                        </button>
                        {{ $message }}
                      </div>
                    </div>
                    @endif
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Shop Record</h4>
                    <div class="float-right">
                    
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped table-hover" id="save-stage" style="width:100%;">
                        <thead>
                          <tr>
                            <th>Name of Item</th>
                            <th>Category</th>
                            <th>Shop</th>
                            <th>Quantity</th>
                            <th>Cost Price (&#8358;)</th>
                            <th>Selling Price (&#8358;)</th>
                            <th>Edit</th>
                            <th>Delete</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($SearchItem as $ss)
                          <tr>
                            <td>{{$ss->itemname}}</td>
                            <td>{{$ss->category}}</td>
                            <td>{{$ss->shop}}</td>
                            <td>{{$ss->qty}}</td>
                            <td>{{$ss->costprice}}</td>
                            <td>{{$ss->sellingprice}}</td>
                            <td><a href="/editshop/{{$ss->id }}"><i class="fas fa-pen"></i></a></td>
                            <td><a href="/deleteshop/{{$ss->id }}" onclick="document.getElementById('popup').style.display = 'block'; return false;"><i class="fas fa-trash-alt" onclick="return confirm('Are you sure you want to delete?')"></a></i></td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
@include('footer')
        