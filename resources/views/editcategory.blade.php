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
                    <h4>Update Category Data</h4>
                  </div>
                  <form class="form-horizontal" action="/updatecategory" method="post">
                    @csrf
                    <input type="text" placeholder="{{$id}}" value="{{$id}}" name="id" hidden>
                  <div class="card-body">
                    <div class="form-group">
                      <label>Category Title</label>
                      <input type="text" placeholder="{{$catname}}" value="{{$catname}}" name="cat_title" class="form-control col-6">
                    </div>
                    <!-- <div class="form-group">
                      <label>Select Shop</label>
                        <select class="form-control col-6" name="catshop">
                            @foreach($SearchShops as $cat)
                                <option value="{{$cat->name}}">{{$cat->name}}</option>
                            @endforeach
                        </select>
                      </div> -->
                    <div class="form-group">
                        <Button  class="btn btn-icon icon-left btn-primary col-6">Update</Button>
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
        