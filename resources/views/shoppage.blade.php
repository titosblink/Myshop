@include('header')
@include('navbar')


      <div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                <div class="card">
                  <div class="body">
                    <div id="plist" class="people-list">
                      
                      <div class="m-b-20">
                        <div id="chat-scroll">
                            <ul class="sidebar-menu">
                            <a class="nav-link" href="/addcategory">Add Category</a>
                                        <a class="nav-link" href="/viewcategory">View Category</a>
                                        <a class="nav-link" href="/additem">Add Item</a>
                                        <a class="nav-link" href="/viewitem">View Stock</a>
                            </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
                <div class="card">
                  <div class="chat">
                    <div class="chat-header clearfix">
                      <img src="assets/img/users/user-1.png" alt="avatar">
                      <div class="chat-about">
                        <div class="chat-with">Maria Smith</div>
                        <div class="chat-num-messages">2 new messages</div>
                      </div>
                    </div>
                  </div>
                  <div class="chat-box" id="mychatbox">
                    <div class="card-body chat-content">
                    </div>
                    <div class="card-footer chat-form">
                      <form id="chat-form">
                        <input type="text" class="form-control" placeholder="Type a message">
                        <button class="btn btn-primary">
                          <i class="far fa-paper-plane"></i>
                        </button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
       
      </div>
@include('footer')
        