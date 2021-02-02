@extends('layouts.landing')

    @section('content')
        <!-- Masthead-->
        <header class="masthead">
            <div class="container">
                <div class="masthead-subheading">Welcome To Our Studio!</div>
                <div class="masthead-heading text-uppercase">It's Nice To Meet You</div>
                <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="#services">Tell Me More</a>
            </div>
        </header>
        <!-- Services-->
        <section class="page-section" id="services">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Services</h2>
                    <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
                </div>
                <div class="row text-center">
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-shopping-cart fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">E-Commerce</h4>
                        <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
                    </div>
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-laptop fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">Responsive Design</h4>
                        <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
                    </div>
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-lock fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">Web Security</h4>
                        <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
                    </div>
                </div>
            </div>
        </section>

<!-- register modal -->
<div class="modal fade" id="registerModal" tabindex="-1" role="dialog"  aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header border-bottom-0">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body" style="margin: 10px; padding: 0px, 20px;">
                  <div class="form-title text-center">
                    <h4>Regsiter</h4><br>
                  </div>
                  <div class="d-flex flex-column text-center">
                    {{-- <form method="post" action="{{ route('registerUser') }}" > --}}
                    <form method="post" action="/register" >
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-text"><i class="fas fa-user"></i></div>
                          <input type="text" class="form-control" name="name" placeholder="Your Full Name..." >
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-text"><i class="fas fa-envelope"></i></div>
                          <input type="email" class="form-control" name="email" placeholder="Your email address..." >
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-text"><i class="fas fa-phone-alt"></i></div>
                          <input type="phone" class="form-control" name="mobile" placeholder="Your mobile number..." >
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-text"><i class="fas fa-lock"></i></div>
                          <input type="password" class="form-control" name="password" placeholder="Your password..." >
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-text"><i class="fas fa-lock"></i></div>
                          <input type="password" class="form-control" name="password2" placeholder="Confirm password..." >
                        </div>
                      </div>

                      <input type="hidden" name="_token" value="{{ csrf_token() }}">

                      <button type="submit" class="btn btn-info btn-block btn-round">Register</button>
                    </form>
                    
                  </div>
                </div>
                <div class="modal-footer justify-content-center">
                    <div class="">Already a member <a href="#" data-toggle="modal" data-dismiss="modal" data-target="#loginModal" class="text-info"> Sign In</a>.</div>
                  </div>
              </div>
               
            </div>
          </div>


          
<!-- login modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header border-bottom-0">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="margin: 10px; padding: 0px, 20px;">
        <div class="form-title text-center">
          <h4>Login</h4><br>
        </div>
        <div class="d-flex flex-column text-center">
          <form method="POST" action="/login" >
            
            <div class="form-group">
              <div class="input-group">
                <div class="input-group-text"><i class="fas fa-envelope"></i></div>
                <input type="email" class="form-control" name="email" placeholder="Your email address..." >
              </div>
            </div>

            <div class="form-group">
              <div class="input-group">
                <div class="input-group-text"><i class="fas fa-lock"></i></div>
                <input type="password" class="form-control" name="password" placeholder="Your password..." >
              </div>
            </div>

            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <button type="submit" class="btn btn-info btn-block btn-round">Login</button>
          </form>
          
        </div>
      </div>
      <div class="modal-footer justify-content-center">
          <div class="">New here <a href="#" data-toggle="modal" data-dismiss="modal" data-target="#registerModal" class="text-info"> Sign Up</a>.</div>
        </div>
    </div>
     
  </div>
</div>
    @endsection