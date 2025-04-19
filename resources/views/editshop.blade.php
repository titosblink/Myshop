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
                    <h4>Update Shop Data</h4>
                  </div>
                  <form class="form-horizontal" action="/updateshop" method="post">
                    @csrf
                    <input type="text" placeholder="{{$id}}" value="{{$id}}" name="id" hidden>
                  <div class="card-body">
                    <div class="form-group">
                      <label>Shop name</label>
                      <input type="text" placeholder="{{$name}}" value="{{$name}}" name="shopname" class="form-control col-6">
                    </div>
                    <div class="form-group">
                      <label>Shop Address</label>
                        <input type="text" class="form-control col-6" value="{{$address}}" name="address" placeholder="{{$address}}">
                      </div>
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
        