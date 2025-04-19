@include('header')
@include('navbar')

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-body">
            
            
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Add Item</h4>
                  </div>
                  <form class="form-horizontal" action="/createitem" method="post">
                    @csrf
                  <div class="card-body">
                    <div class="form-group">
                      <label>Name of Item</label>
                      <input type="text" placeholder="Name of Item" name="itemname" class="form-control col-6">
                    </div>
                    <div class="form-group">
                    <label>Category</label>
                        <select class="form-control col-6" name="cate">
                          @foreach($SearchCatName as $sc)
                          <option>{{$sc->categoryname}}</option>  
                          @endforeach
                      </select>
                      </div>
                    <div class="form-group">
                      <label>Cost Price (&#8358;)</label>
                        <input type="text" class="form-control col-6" name="cprice" placeholder="Cost Price">
                      </div>
                      <div class="form-group">
                      <label>Selling Price (&#8358;)</label>
                        <input type="text" class="form-control col-6" name="sprice" placeholder="Selling Price">
                      </div>
                      <div class="form-group">
                      <label>Quantity (&#8358;)</label>
                        <input type="number" class="form-control col-6" name="itemqty" placeholder="Quantity">
                      </div>
                      
                    <div class="form-group">
                        <Button  class="btn btn-icon icon-left btn-primary col-6">Create</Button>
                      </div>

                    </form>
                      
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

                    @if ($message = Session::get('fail'))
                    <div class="alert alert-danger alert-dismissible show fade">
                      <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                          <span>&times;</span>
                        </button>
                        {{ $message }}
                      </div>
                    </div>
                    @endif


                    </div>
               
                
                    </div>
                  </div>
                </div>
                </div>
              </div>
            </div>
          </div>
        </section>
@include('footer')
        