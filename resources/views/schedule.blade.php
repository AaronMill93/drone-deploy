@extends('app')

@section('content')
<div class="container-fluid" id="wrapper">
        <div class="row" id="app">
            <nav class="sidebar col-xs-12 col-sm-4 col-lg-3 col-xl-2 bg-faded sidebar-style-1">
                <h1 class="site-title"><a href="{{ url('/') }}"><em class="fa fa-rocket"></em> Drone Deploy</a></h1>
                
                <a href="#menu-toggle" class="btn btn-default" id="menu-toggle"><em class="fa fa-bars"></em></a>
                
                <ul class="nav nav-pills flex-column sidebar-nav">
                    <li class="nav-item"><a class="nav-link active" href="{{ url('/') }}"><em class="fa fa-dashboard"></em> Dashboard <span class="sr-only">(current)</span></a></li>
                </ul>
                
                <a href="{{ url('/') }}" class="logout-button"><em class="fa fa-power-off"></em> Signout</a></nav>
            
            <main class="col-xs-12 col-sm-8 offset-sm-4 col-lg-9 offset-lg-3 col-xl-10 offset-xl-2 pt-3 pl-4">
                <header class="page-header row justify-center">
                    <div class="col-md-6 col-lg-8" >
                        <h1 class="float-left text-center text-md-left">Dashboard</h1>
                    </div>
                    
                    <div class="dropdown user-dropdown col-md-6 col-lg-4 text-center text-md-right"><a class="btn btn-stripped dropdown-toggle" href="https://example.com" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="images/profile-pic.png" alt="profile photo" class="circle float-left profile-photo" width="80" height="auto">
                        
                        <div class="username mt-1">
                            <h4 class="mb-1">Username</h4>
                            
                            <h6 class="text-muted">Super Admin</h6>
                        </div>
                        </a>
                        
                        <div class="dropdown-menu dropdown-menu-right" style="margin-right: 1.5rem;" aria-labelledby="dropdownMenuLink"><a class="dropdown-item" href="#"><em class="fa fa-user-circle mr-1"></em> View Profile</a>
                            <a class="dropdown-item" href="#"><em class="fa fa-sliders mr-1"></em> Preferences</a>
                            <a class="dropdown-item" href="#"><em class="fa fa-power-off mr-1"></em> Logout</a></div>
                    </div>
                    
                    <div class="clear"></div>
                </header>
                
                <section class="row">
                    <div class="col-sm-12">
                        <section class="row">
                            <div class="col-md-12 col-lg-6">
                                <div class="jumbotron">                               
                                    <h1 class="mb-4">Schedule Deployment</h1>                            
                                    <p class="lead">Drone Details</p>
                                    <form method="POST" action="/summary" class="form-inline">
                                        {{ csrf_field() }}
                                        <label for="drone-name" class="sr-only">Drone Name</label>
                                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                            <div class="input-group-addon">Drone</div>
                                            <input class="form-control" placeholder="Name" name="drone-name" type="text" id="drone-name">
                                        </div>

                                        <label for="drone-capacity" class="sr-only">Drone Capacity</label>
                                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                            <input class="form-control" placeholder="Maximum Weight" name="drone-capacity" type="text" id="drone-capacity">
                                            <div class="input-group-addon">kg</div>
                                        </div>
                                        <div class="divider" style="margin-top: 1rem;"></div>
                                        <p class="lead">Trip Details</p>
                                        <deployment-table></deployment-table>
                                        <div class="divider" style="margin-top: 0;"></div>
                                        <p class="lead"><button class="btn btn-primary btn-lg mt-2" type="submit" role="button">Schedule</button></p>
                                    </form>                                        
                            </div>
                                
                                <div class="card mb-4">
                                    <div class="card-block">
                                        <h3 class="card-title">Map</h3>
                                        <div class="dropdown card-title-btn-container">
                                            <button class="btn btn-sm btn-subtle" type="button"><em class="fa fa-list-ul"></em> View All</button>
                                            
                                            <button class="btn btn-sm btn-subtle dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><em class="fa fa-cog"></em></button>
                                            
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton"><a class="dropdown-item" href="#"><em class="fa fa-search mr-1"></em> More info</a>
                                                <a class="dropdown-item" href="#"><em class="fa fa-thumb-tack mr-1"></em> Pin Window</a>
                                                <a class="dropdown-item" href="#"><em class="fa fa-remove mr-1"></em> Close Window</a></div>
                                        </div>
                                        
                                        <h6 class="card-subtitle mb-2 text-muted">Latest deliveries</h6>
                                        
                                    </div>
                                </div>                        
                            </div>
                            
                            <div class="col-md-12 col-lg-6">
                                <div class="card mb-4">
                                    <div class="card-block">
                                            <h3 class="card-title">Overview</h3>
                                            @if(isset($trips))
                                    <h6 class="card-subtitle mb-2 text-muted"><span id="drone-title">Drone: </span>{{$drone->name}}</h6>
                                            @endif
                                            @if(isset($trips))
                                            <ul class="timeline">
                                                    @foreach ($trips as $counter => $trip) 
                                                    <li>
                                                        <div class="timeline-badge primary"><em class="fa fa-map-o"></em></div>
                                                        
                                                        <div class="timeline-panel">
                                                            <div class="timeline-heading">
                                                                <h5 class="timeline-title mt-2">
                                                                <?php 
                                                                    $f = new NumberFormatter("en", NumberFormatter::SPELLOUT);
                                                                    echo 'Trip '.$f->format($counter+1);
                                                                ?>
                                                                </h5>
                                                            </div>
                                                            
                                                            <div class="timeline-body">
                                                                <ul>
                                                                    @foreach ($trip->locations as $location)
                                                                    <li>{{$location->name}}</li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    @endforeach
                                            </ul>
                                            @endif
                                        
                                        <div class="divider"></div>
                                        <h3 class="card-title">Statistics</h3>
                                        
                                        <h6 class="card-subtitle mb-2 text-muted">Lorem Ipsum</h6>
                                        
                                        <div class="canvas-wrapper">
                                            <canvas class="main-chart" id="bar-chart" height="200" width="600"></canvas>
                                        </div>
                                        <div class="divider"></div>
                                        <div id="calendar"></div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <section class="row">
                            <div class="col-12 mt-1 mb-4">By Aaron Mill</div>
                        </section>
                    </div>
                </section>
            </main>
        </div>
</div>
@endsection