<header class="py-3 border shadow bg-primary">
   <div class="container ">
    <div class="row">
        <div class="col-4">
            <h1 style="color:white">BOOKWORM</h1>
        </div>
        <div class="col-8 d-flex justify-content-end alight-items-center">
            <nav class="navbar navbar-expand-lg navbar-dark">
                <div class="container-fluid">
                  <a class="navbar-brand" href="#"></a>
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                      <a class="nav-link {{ request()->is('/')? 'active' : '' }}" href="">Home</a>
                      <a class="nav-link {{ request()->is('welcome')? 'active' : '' }}" href="">Shop</a>
                      <a class="nav-link {{ request()->is('sanpham')? 'active' : '' }}" href="">About</a>
                      <a class="nav-link {{ request()->is('services')? 'active' : '' }}"href="#">Cart</a>
                      <a class="nav-link {{ request()->is('news')? 'active' : '' }}"href="#">Sign in</a>
                  </div>
                </div>
              </nav>
        </div>
    </div>
   </div>
</header>