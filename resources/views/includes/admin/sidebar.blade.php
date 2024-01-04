  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="{{ @url('/admin/dashboard') }}" class="brand-link">
          <img src="{{ $logo }}" alt="{{ config('app.name') }}" class="brand-image" style="opacity: .8">
          <!-- <img src="{{ @url('/admin/dist/img/AdminLTELogo.png') }}" alt="{{ config('app.name') }}" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
          <span class="brand-text font-weight-light invisible">{{ config('app.name') }}</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
              <div class="image">
                  <img src="{{ @url('/admin/dist/img/icon_avatar.jpg') }}" class="img-circle elevation-2"
                      alt="User Image">
              </div>
              <div class="info">
                  <a href="#" class="d-block">{{ Auth::user()->name }}</a>
              </div>
          </div>

          <!-- SidebarSearch Form -->
          <div class="form-inline d-none">
              <div class="input-group" data-widget="sidebar-search">
                  <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                      aria-label="Search">
                  <div class="input-group-append">
                      <button class="btn btn-sidebar">
                          <i class="fas fa-search fa-fw"></i>
                      </button>
                  </div>
              </div>
          </div>

          <!-- Sidebar Menu -->
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                  data-accordion="false">
                  <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                  <li class="nav-item">
                      <a href="{{ @url('/admin/dashboard') }}" class="nav-link {{ $dashboardActive ?? '' }}">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Dashboard</p>
                      </a>
                  </li>
                  <li class="nav-item {{ $settingsOpening ?? '' }} {{ $settingsOpend ?? '' }}">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-tachometer-alt"></i>
                          <p>
                              Pages Setting
                              <i class="right fas fa-angle-left"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">

                          <li class="nav-item ">
                              <a href="{{ @url('/admin/settings/home') }}" class="nav-link {{ $homeSettings ?? '' }}">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Home</p>
                              </a>
                          </li>
                          <li class="nav-item aboutSettings">
                              <a href="{{ @url('/admin/settings/about-us') }}"
                                  class="nav-link  {{ $aboutSettings ?? '' }}">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>About US</p>
                              </a>
                          </li>


                          <li class="nav-item">
                              <a href="{{ @url('/admin/settings/services') }}"
                                  class="nav-link  {{ $serviceSettings ?? '' }}">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Services</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ @url('/admin/settings/portfolio') }}"
                                  class="nav-link {{ $portfolioSettings ?? '' }}">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Portfolio</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ @url('/admin/settings/support') }}"
                                  class="nav-link {{ $supportSettings ?? '' }}">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Support</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ @url('/admin/settings/blog') }}" class="nav-link {{ $blogSettings ?? '' }}">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Blog</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ @url('/admin/settings/news') }}" class="nav-link {{ $newsSettings ?? '' }}">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>News</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ @url('/admin/settings/caseStudies') }}"
                                  class="nav-link {{ $caseStudiesSettings ?? '' }}">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Case Studies</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ @url('/admin/settings/contactUs') }}"
                                  class="nav-link {{ $contactUsSettings ?? '' }}">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Contact Us</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ @url('/admin/settings/pilot') }}"
                                  class="nav-link {{ $pilotSettings ?? '' }}">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Pilot</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ @url('/admin/settings/strategy') }}"
                                  class="nav-link {{ $strategySettings ?? '' }}">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Strategy</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ @url('/admin/settings/demo') }}" class="nav-link {{ $demoSettings ?? '' }}">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Demo Page</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ @url('/admin/settings/faqs') }}" class="nav-link {{ $faqsSettings ?? '' }}">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>FAQs</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ @url('/admin/settings/partners') }}"
                                  class="nav-link {{ $partnersSettings ?? '' }}">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Partners</p>
                              </a>
                          </li>
                      </ul>
                  </li>

                  <li class="nav-item {{ $tagsOpening ?? '' }} {{ $tagsOpend ?? '' }}">
                      <a href="{{ @url('/admin/tags') }}" class="nav-link">
                          <i class="nav-icon fas fa-th"></i>
                          <p>
                              Tags
                              <!-- <span class="right badge badge-danger">New</span> -->
                          </p>
                      </a>
                  </li>
                  <li class="nav-item {{ $blogOpening ?? '' }} {{ $blogOpend ?? '' }}">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-copy"></i>
                          <p>
                              Blogs
                              <i class="fas fa-angle-left right"></i>
                              <!-- <span class="badge badge-info right">6</span> -->
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{ @url('/admin/blogs') }}" class="nav-link {{ $blogListActive ?? '' }}">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>List</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ @url('/admin/blogs/create') }}"
                                  class="nav-link {{ $blogCreateActive ?? '' }}">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Create New</p>
                              </a>
                          </li>

                      </ul>
                  </li>
                  <!-- team -->

                  <li class="nav-item {{ $teamOpening ?? '' }} {{ $teamOpend ?? '' }}">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-copy"></i>
                          <p>
                              Team
                              <i class="fas fa-angle-left right"></i>
                              <!-- <span class="badge badge-info right">6</span> -->
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{ @url('/admin/team') }}" class="nav-link {{ $teamListActive ?? '' }}">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>List</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ @url('/admin/team/create') }}"
                                  class="nav-link {{ $teamCreateActive ?? '' }}">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Create New</p>
                              </a>
                          </li>

                      </ul>
                  </li>
                  <!-- testimonials -->
                  <li class="nav-item {{ $testimonialsOpening ?? '' }} {{ $testimonialsOpend ?? '' }}">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-copy"></i>
                          <p>
                              Testimonials
                              <i class="fas fa-angle-left right"></i>
                              <!-- <span class="badge badge-info right">6</span> -->
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{ @url('/admin/testimonials') }}"
                                  class="nav-link {{ $testimonialsListActive ?? '' }}">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>List</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ @url('/admin/testimonial/create') }}"
                                  class="nav-link {{ $testimonialsCreateActive ?? '' }}">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Add New</p>
                              </a>
                          </li>

                      </ul>
                  </li>

                  <!-- News -->
                  <li class="nav-item {{ $newsOpening ?? '' }} {{ $newsOpend ?? '' }}">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-copy"></i>
                          <p>
                              News
                              <i class="fas fa-angle-left right"></i>
                              <!-- <span class="badge badge-info right">6</span> -->
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{ route('news') }}" class="nav-link {{ $newsListActive ?? '' }}">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>List</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ route('create-news') }}" class="nav-link {{ $newsCreateActive ?? '' }}">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Create New</p>
                              </a>
                          </li>

                      </ul>
                  </li>

                  <!-- FAQs -->

                  <li class="nav-item {{ $faqsOpening ?? '' }} {{ $faqsOpend ?? '' }}">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-copy"></i>
                          <p>
                              FAQs
                              <i class="fas fa-angle-left right"></i>
                              <!-- <span class="badge badge-info right">6</span> -->
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{ @url('/admin/faq-heads') }}"
                                  class="nav-link {{ $faqHeadListActive ?? '' }}">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Heads</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ @url('/admin/faqs') }}" class="nav-link {{ $faqsListActive ?? '' }}">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>FAQs</p>
                              </a>
                          </li>

                      </ul>
                  </li>

                  <!-- Case Studies -->
                  <li class="nav-item {{ $caseStudyOpening ?? '' }} {{ $caseStudyOpend ?? '' }}">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-copy"></i>
                          <p>
                              Case Studies
                              <i class="fas fa-angle-left right"></i>
                              <!-- <span class="badge badge-info right">6</span> -->
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{ @url('/admin/case-studies') }}"
                                  class="nav-link {{ $caseStudyListActive ?? '' }}">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>List</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ @url('/admin/case-study/create') }}"
                                  class="nav-link {{ $caseStudyCreateActive ?? '' }}">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Create New</p>
                              </a>
                          </li>

                      </ul>
                  </li>
                  <!-- Partners -->
                  <li class="nav-item {{ $partnersOpening ?? '' }} {{ $partnersOpend ?? '' }}">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-copy"></i>
                          <p>
                              Partners
                              <i class="fas fa-angle-left right"></i>
                              <!-- <span class="badge badge-info right">6</span> -->
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{ @url('/admin/partners') }}"
                                  class="nav-link {{ $partnersListActive ?? '' }}">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>List</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ @url('/admin/partner/create') }}"
                                  class="nav-link {{ $partnersCreateActive ?? '' }}">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Add New</p>
                              </a>
                          </li>

                      </ul>
                  </li>
                  <li class="nav-item {{ $partnersOpening ?? '' }} {{ $partnersOpend ?? '' }}">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-copy"></i>
                          <p>
                              General Setting
                              <i class="fas fa-angle-left right"></i>
                              <!-- <span class="badge badge-info right">6</span> -->
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          {{-- <li class="nav-item">
                              <a href="{{ @url('/admin/partners') }}"
                                  class="nav-link {{ $partnersListActive ?? '' }}">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>New Logo </p>
                              </a>
                          </li> --}}
                          <li class="nav-item">
                              <a href="{{ @url('/admin/general-settings') }}"
                                  class="nav-link {{ $partnersCreateActive ?? '' }}">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>General Settings </p>
                              </a>
                          </li>

                      </ul>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="JAVASCRIPT://"
                          onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                          <i class="far fa-circle  nav-icon"></i>
                          <p>{{ __('Logout') }}</p>
                      </a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                          @csrf
                      </form>
                  </li>
              </ul>
          </nav>
          <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
  </aside>
