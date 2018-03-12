@extends('app')

@section('content')
<div class="container-fluid" id="wrapper">
        <div class="row" id="app">
            <nav class="sidebar col-xs-12 col-sm-4 col-lg-3 col-xl-2 bg-faded sidebar-style-1">
                <h1 class="site-title"><a href="index.html"><em class="fa fa-rocket"></em> Drone Deploy</a></h1>
                
                <a href="#menu-toggle" class="btn btn-default" id="menu-toggle"><em class="fa fa-bars"></em></a>
                
                <ul class="nav nav-pills flex-column sidebar-nav">
                    <li class="nav-item"><a class="nav-link active" href="index.html"><em class="fa fa-dashboard"></em> Dashboard <span class="sr-only">(current)</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="widgets.html"><em class="fa fa-calendar-o"></em> Widgets</a></li>
                    <li class="nav-item"><a class="nav-link" href="charts.html"><em class="fa fa-bar-chart"></em> Charts</a></li>
                    <li class="nav-item"><a class="nav-link" href="elements.html"><em class="fa fa-hand-o-up"></em> UI Elements</a></li>
                    <li class="nav-item"><a class="nav-link" href="cards.html"><em class="fa fa-clone"></em> Cards</a></li>
                </ul>
                
                <a href="#" class="logout-button"><em class="fa fa-power-off"></em> Signout</a></nav>
            
            <main class="col-xs-12 col-sm-8 offset-sm-4 col-lg-9 offset-lg-3 col-xl-10 offset-xl-2 pt-3 pl-4">
                <header class="page-header row justify-center">
                    <div class="col-md-6 col-lg-8" >
                        <h1 class="float-left text-center text-md-left">Dashboard</h1>
                    </div>
                    
                    <div class="dropdown user-dropdown col-md-6 col-lg-4 text-center text-md-right"><a class="btn btn-stripped dropdown-toggle" href="https://example.com" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="images/profile-pic.png" alt="profile photo" class="circle float-left profile-photo" width="50" height="auto">
                        
                        <div class="username mt-1">
                            <h4 class="mb-1">Bluebell</h4>
                            
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
                                        <div class="divider" style="margin-top: 1rem;"></div>
                                        <p class="lead"><button class="btn btn-primary btn-lg mt-2" type="submit" role="button">Schedule</button></p>
                                    </form>                                        
                            </div>
                                
                                <div class="card mb-4">
                                    <div class="card-block">
                                        <h3 class="card-title">Overview</h3>
                                        
                                        <div class="dropdown card-title-btn-container">
                                            <button class="btn btn-sm btn-subtle" type="button"><em class="fa fa-list-ul"></em> View All</button>
                                            
                                            <button class="btn btn-sm btn-subtle dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><em class="fa fa-cog"></em></button>
                                            
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton"><a class="dropdown-item" href="#"><em class="fa fa-search mr-1"></em> More info</a>
                                                <a class="dropdown-item" href="#"><em class="fa fa-thumb-tack mr-1"></em> Pin Window</a>
                                                <a class="dropdown-item" href="#"><em class="fa fa-remove mr-1"></em> Close Window</a></div>
                                        </div>
                                        
                                        <h6 class="card-subtitle mb-2 text-muted">Latest traffic stats</h6>
                                        
                                        <div class="canvas-wrapper">
                                            <canvas class="main-chart" id="line-chart" height="200" width="600"></canvas>
                                        </div>
                                    </div>
                                </div>                        
                                
                                <div class="card mb-4">
                                    <div class="card-block">
                                        <h3 class="card-title">Articles</h3>
                                        
                                        <div class="dropdown card-title-btn-container">
                                            <button class="btn btn-sm btn-subtle" type="button"><em class="fa fa-list-ul"></em> View All</button>
                                            
                                            <button class="btn btn-sm btn-subtle dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><em class="fa fa-cog"></em></button>
                                            
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton"><a class="dropdown-item" href="#"><em class="fa fa-search mr-1"></em> More info</a>
                                                <a class="dropdown-item" href="#"><em class="fa fa-thumb-tack mr-1"></em> Pin Window</a>
                                                <a class="dropdown-item" href="#"><em class="fa fa-remove mr-1"></em> Close Window</a></div>
                                        </div>
                                        
                                        <h6 class="card-subtitle mb-2 text-muted">Latest news</h6>
                                        
                                        <div class="divider" style="margin-top: 1rem;"></div>
                                        
                                        <div class="articles-container">
                                            <div class="article border-bottom">
                                                <div class="col-xs-12">
                                                    <div class="row">
                                                        <div class="col-2 date">
                                                            <div class="large">30</div>
                                                            
                                                            <div class="text-muted">Jun</div>
                                                        </div>
                                                        
                                                        <div class="col-10">
                                                            <h4><a href="#">Lorem ipsum dolor sit amet</a></h4>
                                                            
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer at sodales nisl. Donec malesuada orci ornare risus finibus feugiat.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="clear"></div>
                                            </div><!--End .article-->
                                            
                                            <div class="article">
                                                <div class="col-xs-12">
                                                    <div class="row">
                                                        <div class="col-2 date">
                                                            <div class="large">30</div>
                                                            
                                                            <div class="text-muted">Jun</div>
                                                        </div>
                                                        
                                                        <div class="col-10">
                                                            <h4><a href="#">Lorem ipsum dolor sit amet</a></h4>
                                                            
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer at sodales nisl. Donec malesuada orci ornare risus finibus feugiat.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="clear"></div>
                                            </div><!--End .article-->
                                            
                                            <div class="article">
                                                <div class="col-xs-12">
                                                    <div class="row">
                                                        <div class="col-2 date">
                                                            <div class="large">30</div>
                                                            
                                                            <div class="text-muted">Jun</div>
                                                        </div>
                                                        
                                                        <div class="col-10">
                                                            <h4><a href="#">Lorem ipsum dolor sit amet</a></h4>
                                                            
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer at sodales nisl. Donec malesuada orci ornare risus finibus feugiat.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="clear"></div>
                                            </div><!--End .article-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-12 col-lg-6">
                                <div class="card mb-4">
                                    <div class="card-block">
                                        <h3 class="card-title">Top Users</h3>
                                        
                                        <h6 class="card-subtitle mb-2 text-muted">Most active this week</h6>
                                        
                                        <div class="user-progress justify-center">
                                            <div class="col-sm-3 col-md-2" style="padding: 0;">
                                                <img src="images/profile-pic.png" alt="profile photo" class="circle profile-photo" style="width: 100%; max-width: 100px;">
                                            </div>
                                            
                                            <div class="col-sm-6 col-md-8">
                                                <h6 class="pt-1">Username 1</h6>
                                                
                                                <div class="progress progress-custom">
                                                    <div class="progress-bar bg-primary" style="width: 75%" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-sm-3 col-md-2">
                                                <div class="progress-label">75%</div>
                                            </div>
                                        </div>
                                        
                                        <div class="user-progress justify-center">
                                            <div class="col-sm-3 col-md-2" style="padding: 0;">
                                                <img src="images/profile-pic.png" alt="profile photo" class="circle profile-photo" style="width: 100%; max-width: 100px;">
                                            </div>
                                            
                                            <div class="col-sm-6 col-md-8">
                                                <h6 class="pt-1">Username 2</h6>
                                                
                                                <div class="progress progress-custom">
                                                    <div class="progress-bar bg-primary" style="width: 50%" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-sm-3 col-md-2">
                                                <div class="progress-label">50%</div>
                                            </div>
                                        </div>
                                        
                                        <div class="user-progress justify-center">
                                            <div class="col-sm-3 col-md-2" style="padding: 0;">
                                                <img src="images/profile-pic.png" alt="profile photo" class="circle profile-photo" style="width: 100%; max-width: 100px;">
                                            </div>
                                            
                                            <div class="col-sm-6 col-md-8">
                                                <h6 class="pt-1">Username 3</h6>
                                                
                                                <div class="progress progress-custom">
                                                    <div class="progress-bar bg-primary" style="width: 25%" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-sm-3 col-md-2">
                                                <div class="progress-label">25%</div>
                                            </div>
                                        </div>
                                        
                                        <div class="divider"></div>
                                        
                                        <div id="calendar"></div>
                                        
                                        <div class="divider"></div>
                                        
                                        <h3 class="card-title">Timeline</h3>
                                        
                                        <h6 class="card-subtitle mb-2 text-muted">What's coming up</h6>
                                        
                                        <ul class="timeline">
                                            <li>
                                                <div class="timeline-badge"><em class="fa fa-camera"></em></div>
                                                
                                                <div class="timeline-panel">
                                                    <div class="timeline-heading">
                                                        <h5 class="timeline-title mt-2">Lorem ipsum</h5>
                                                    </div>
                                                    
                                                    <div class="timeline-body">
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="timeline-badge primary"><em class="fa fa-link"></em></div>
                                                
                                                <div class="timeline-panel">
                                                    <div class="timeline-heading">
                                                        <h5 class="timeline-title mt-2">Dolor</h5>
                                                    </div>
                                                    
                                                    <div class="timeline-body">
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="timeline-badge"><em class="fa fa-paperclip"></em></div>
                                                
                                                <div class="timeline-panel">
                                                    <div class="timeline-heading">
                                                        <h5 class="timeline-title mt-2">Sit amet</h5>
                                                    </div>
                                                    
                                                    <div class="timeline-body">
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                
                                <div class="card mb-4">
                                    <div class="card-block">
                                        <h3 class="card-title">Todo List</h3>
                                        
                                        <div class="dropdown card-title-btn-container">
                                            <button class="btn btn-sm btn-subtle dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><em class="fa fa-cog"></em></button>
                                            
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton"><a class="dropdown-item" href="#"><em class="fa fa-search mr-1"></em> More info</a>
                                                <a class="dropdown-item" href="#"><em class="fa fa-thumb-tack mr-1"></em> Pin Window</a>
                                                <a class="dropdown-item" href="#"><em class="fa fa-remove mr-1"></em> Close Window</a></div>
                                        </div>
                                        
                                        <h6 class="card-subtitle mb-2 text-muted">A simple checklist</h6>
                                        
                                        <ul class="todo-list mt-2">
                                            <li class="todo-list-item">
                                                <div class="form-check">
                                                    <input type="checkbox" id="checkbox-1" />
                                                    
                                                    <label for="checkbox-1">Make coffee</label>
                                                    
                                                    <div class="float-right action-buttons"><a href="#" class="trash"><em class="fa fa-trash"></em></a></div>
                                                </div>
                                            </li>
                                            <li class="todo-list-item">
                                                <div class="form-check">
                                                    <input type="checkbox" id="checkbox-2" />
                                                    
                                                    <label for="checkbox-2">Check emails</label>
                                                    
                                                    <div class="float-right action-buttons"><a href="#" class="trash"><em class="fa fa-trash"></em></a></div>
                                                </div>
                                            </li>
                                            <li class="todo-list-item">
                                                <div class="form-check">
                                                    <input type="checkbox" id="checkbox-3" />
                                                    
                                                    <label for="checkbox-3">Reply to Jane</label>
                                                    
                                                    <div class="float-right action-buttons"><a href="#" class="trash"><em class="fa fa-trash"></em></a></div>
                                                </div>
                                            </li>
                                            <li class="todo-list-item">
                                                <div class="form-check">
                                                    <input type="checkbox" id="checkbox-4" />
                                                    
                                                    <label for="checkbox-4">Work on the new design</label>
                                                    
                                                    <div class="float-right action-buttons"><a href="#" class="trash"><em class="fa fa-trash"></em></a></div>
                                                </div>
                                            </li>
                                            <li class="todo-list-item">
                                                <div class="form-check">
                                                    <input type="checkbox" id="checkbox-5" />
                                                    
                                                    <label for="checkbox-5">Get feedback</label>
                                                    
                                                    <div class="float-right action-buttons"><a href="#" class="trash"><em class="fa fa-trash"></em></a></div>
                                                </div>
                                            </li>
                                        </ul>
                                        
                                        <div class="card-footer todo-list-footer">
                                            <div class="input-group">
                                                <input id="btn-input" type="text" class="form-control input-md" placeholder="Add new task" /><span class="input-group-btn">
                                                    <button class="btn btn-primary btn-md" id="btn-todo">Add</button>
                                            </span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <section class="row">
                            <div class="col-12 mt-1 mb-4">Template by <a href="https://www.medialoot.com">Medialoot</a></div>
                        </section>
                    </div>
                </section>
            </main>
        </div>
</div>
@endsection