<nav class="navbar navbar-expand-lg bg-secondary mb-5">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{ url('/') }}">Home</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0"></ul>
        <div class="d-flex" role="search">
            <div class="btn-group">
                <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                  @if(auth()->check())
                    Hoşgeldin, {{ auth()->user()->name }}
                  @else
                    Üyelik İşlemleri
                  @endif
                </button>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-lg-start">
                    @if(auth()->check())
                    
                    <li>
                        <form  method="POST" action="{{ route('logout') }}" class="d-flex" role="search">
                            @csrf
                            <button type="submit" class="dropdown-item">Çıkış Yap</button>
                        </form>
                    </li>
                 
                  @else
                  <li><a href="{{ url('login') }}" class="dropdown-item" type="button">Giriş Yap</a></li>
                  <li><a href="{{ url('register') }}" class="dropdown-item" type="button">Kayıt Ol</a></li>

                  @endif
                </ul>
              </div>
            </div>
      </div>
    </div>
  </nav>