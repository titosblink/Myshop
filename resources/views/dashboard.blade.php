
<!DOCTYPE html>
<html lang="en">


<!-- contact.html  21 Nov 2019 04:05:04 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Dashboard</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/css/app.min.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/components.css">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="assets/css/custom.css">
  <link rel='shortcut icon' type='image/x-icon' href='assets/img/favicon.ico' />
</head>

<body>

  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-md-10 offset-md-1 col-lg-10 offset-lg-1">
            <div class="login-brand">
              Select Shop
            </div>
            <div class="card card-primary">
              <br>
              <div class="row m-0"> 
                
                  @foreach ($posts as $post)
                    <div class="col-12 col-md-6 col-lg-3">
                      <div class="card card-primary">
                        <div class="card-header">
                          <h4>{{ $post->name }}</h4>
                        
                        </div>
                        <div class="card-body">
                        <hr>
                        {{ $post->address }}
                          <a href="/shophome/{{$post->id }}"><p><code>Continue</code></p></a>
                        </div>
                      </div>
                    </div>
                  @endforeach  
              </div>
            </div>
            <div class="simple-footer">
              Copyright &copy; My Shop 2018
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- General JS Scripts -->
  <script src="assets/js/app.min.js"></script>
  <!-- JS Libraies -->
  <script src="http://maps.google.com/maps/api/js?key=AIzaSyB55Np3_WsZwUQ9NS7DP-HnneleZLYZDNw&amp;sensor=true"></script>
  <script src="assets/bundles/gmaps.js"></script>
  <!-- Page Specific JS File -->
  <script src="assets/js/page/contact.js"></script>
  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="assets/js/custom.js"></script>
</body>


<!-- contact.html  21 Nov 2019 04:05:05 GMT -->
</html>