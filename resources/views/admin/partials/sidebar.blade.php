<div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
    <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu"
      aria-labelledby="sidebarMenuLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="sidebarMenuLabel">Company name</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu"
          aria-label="Close"></button>
      </div>
      <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2 active" aria-current="page" href="{{ url('/dashboard') }}">
              <svg class="bi">
                <use xlink:href="#house-fill" />
              </svg>
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <div class="dropdown">
              <button class="nav-link d-flex align-items-center gap-2" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <svg class="bi">
                  <use xlink:href="#file-earmark" />
                </svg>
                Order
              </button>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{ url('/dashboard/orders/cencel') }}">Cancel</a></li>
                <li><a class="dropdown-item" href="{{ url('/dashboard/orders/pending') }}">pending</a></li>
                <li><a class="dropdown-item" href="{{ url('/dashboard/orders/selesai') }}">selesai</a></li>
              </ul>
            </div>
            {{-- <a class="nav-link d-flex align-items-center gap-2" href="{{ url('/dashboard/orders') }}">
              <svg class="bi">
                <use xlink:href="#file-earmark" />
              </svg>
              Orders
            </a> --}}
          </li>
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2" href="{{ url('/dashboard/products') }}">
              <svg class="bi">
                <use xlink:href="#cart" />
              </svg>
              Products
            </a>
          </li>
        <h6
          class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-body-secondary text-uppercase">
          <span>Setting</span>
          <a class="link-secondary" href="#" aria-label="Add a new report">
            <svg class="bi">
              <use xlink:href="#gear-wide-connected" />
            </svg>
          </a>
        </h6>
        <ul class="nav flex-column mb-auto">
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2" href="{{ url('/dashboard/setting/judul') }}">
              <svg class="bi">
                <use xlink:href="#gear-wide-connected" />
              </svg>
              Judul
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2" href="{{ url('/dashboard/setting/map') }}">
              <svg class="bi">
                <use xlink:href="#gear-wide-connected" />
              </svg>
              Map
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2" href="{{ url('/dashboard/setting/kontak') }}">
              <svg class="bi">
                <use xlink:href="#gear-wide-connected" />
              </svg>
              Kontak
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2" href="{{ url('/dashboard/testimoni') }}">
              <svg class="bi">
                <use xlink:href="#gear-wide-connected" />
              </svg>
              Testimoni
            </a>
          </li>
        </ul>

        <hr class="my-3">

        <ul class="nav flex-column mb-auto">
          <li class="nav-item">
            <form action="/logout" method="POST">
                @csrf
                <button type="submit" class="nav-link d-flex align-items-center gap-2">
                    <svg class="bi">
                        <use xlink:href="#door-closed" />
                      </svg>
                      Sign out
                </button>
            </form>
          </li>
        </ul>
      </div>
    </div>
  </div>

  