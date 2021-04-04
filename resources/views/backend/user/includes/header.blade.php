 <nav class="navbar navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-left">
                    <div class="navbar-btn">
                        <a href="index.html"><img src="{{ 'backend' }}/assets/images/icon.svg" alt="Mooli Logo" class="img-fluid logo"></a>
                        <button type="button" class="btn-toggle-offcanvas"><i class="fa fa-align-left"></i></button>
                    </div>
                    <form id="navbar-search" class="navbar-form search-form">
                        <button type="button" class="btn btn-default"><i class="icon-magnifier"></i></button>
                        <input value="" class="form-control" placeholder="Search here..." type="text">
                    </form>
                </div>
                <div class="navbar-right">
                    <div id="navbar-menu">
                        <ul class="nav navbar-nav">
                            <li><a href="javascript:void(0);" class="right_note icon-menu" title="Right Menu">Notes</a></li>
                            <li class="dropdown hidden-xs">
                                <a href="javascript:void(0);" class="dropdown-toggle icon-menu" data-toggle="dropdown">Create</a>
                                <div class="dropdown-menu pb-0 mt-0">
                                    <a class="dropdown-item pt-2 pb-2" href="javascript:void(0);">User</a>
                                    <a class="dropdown-item pt-2 pb-2" href="javascript:void(0);">Product</a>
                                    <a class="dropdown-item pt-2 pb-2" href="javascript:void(0);">Category</a>
                                    <a class="dropdown-item pt-2 pb-2" href="javascript:void(0);">Report</a>
                                </div>
                            </li>
                            <li class="dropdown hidden-xs">
                                <a href="javascript:void(0);" class="dropdown-toggle icon-menu" data-toggle="dropdown">
                                    <i class="fa fa-envelope-o"></i>
                                    <span class="notification-dot msg">4</span>
                                </a>
                                <ul class="dropdown-menu right_chat email mt-0 animation-li-delay">
                                    <li class="header theme-bg gradient mt-0 text-light">You have 4 New eMail</li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="media">
                                                <img class="media-object " src="{{ 'backend' }}/assets/images/xs/avatar4.jpg" alt="">
                                                <div class="media-body">
                                                    <span class="name">James Wert <small class="float-right font-12">Just now</small></span>
                                                    <span class="message">Update GitHub</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="media">
                                                <img class="media-object" src="{{ 'backend' }}/assets/images/xs/avatar1.jpg" alt="">
                                                <div class="media-body">
                                                    <span class="name">Folisise Chosielie <small class="float-right font-12">12min ago</small></span>
                                                    <span class="message">New Messages</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="media">
                                                <img class="media-object" src="{{ 'backend' }}/assets/images/xs/avatar5.jpg" alt="">
                                                <div class="media-body">
                                                    <span class="name">Louis Henry <small class="float-right font-12">38min ago</small></span>
                                                    <span class="message">Design bug fix</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="media mb-0">
                                                <img class="media-object" src="assets/images/xs/avatar2.jpg" alt="">
                                                <div class="media-body">
                                                    <span class="name">Debra Stewart <small class="float-right font-12">2hr ago</small></span>
                                                    <span class="message">Fix Bug</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle icon-menu" data-toggle="dropdown">
                                    <i class="fa fa-bell-o"></i>
                                    <span class="notification-dot info">4</span>
                                </a>
                                <ul class="dropdown-menu feeds_widget mt-0 animation-li-delay">
                                    <li class="header theme-bg gradient mt-0 text-light">You have 4 New Notifications</li>
                                    <li>
                                        <a href="#">
                                            <div class="mr-4"><i class="fa fa-check text-red"></i></div>
                                            <div class="feeds-body">
                                                <h4 class="title text-danger">Issue Fixed <small class="float-right text-muted font-12">9:10 AM</small></h4>
                                                <small>WE have fix all Design bug with Responsive</small>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="mr-4"><i class="fa fa-user text-info"></i></div>
                                            <div class="feeds-body">
                                                <h4 class="title text-info">New User <small class="float-right text-muted font-12">9:15 AM</small></h4>
                                                <small>I feel great! Thanks team</small>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="mr-4"><i class="fa fa-question-circle text-warning"></i></div>
                                            <div class="feeds-body">
                                                <h4 class="title text-warning">Server Warning <small class="float-right text-muted font-12">9:17 AM</small></h4>
                                                <small>Your connection is not private</small>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="mr-4"><i class="fa fa-thumbs-o-up text-success"></i></div>
                                            <div class="feeds-body">
                                                <h4 class="title text-success">2 New Feedback <small class="float-right text-muted font-12">9:22 AM</small></h4>
                                                <small>It will give a smart finishing to your site</small>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown language-menu hidden-xs">
                                <a href="javascript:void(0);" class="dropdown-toggle icon-menu" data-toggle="dropdown"><i class="fa fa-language"></i></a>
                                <div class="dropdown-menu language_widget mt-0">
                                    <a class="dropdown-item pt-2 pb-2" href="javascript:void(0);"><img src="assets/images/flag/us.svg" alt="US English" > US English</a>
                                    <a class="dropdown-item pt-2 pb-2" href="javascript:void(0);"><img src="assets/images/flag/gb.svg" alt="UK English" > UK English</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item pt-2 pb-2" href="javascript:void(0);"><img src="assets/images/flag/russia.svg" alt="Russian" > Russian</a>
                                    <a class="dropdown-item pt-2 pb-2" href="javascript:void(0);"><img src="assets/images/flag/arabia.svg" alt="Arabic" > Arabic</a>
                                    <a class="dropdown-item pt-2 pb-2" href="javascript:void(0);"><img src="assets/images/flag/france.svg" alt="French" > French</a>
                                </div>
                            </li>
                            <li><a href="javascript:void(0);" class="right_toggle icon-menu" title="Right Menu"><i class="fa fa-comments-o"></i></a></li>
                            <li class="hidden-xs"><a href="javascript:void(0);" id="btnFullscreen" class="icon-menu"><i class="fa fa-arrows-alt"></i></a></li>
                            <li>
                                  <form id="logout-form" action="{{ route('admin.logout')}}" method="POST" >
                                    @csrf
                                    <button class="btn btn-primary">Log out</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="recent_searche" style="display: none;">
                    <div class="card mb-0">
                        <div class="header">
                            <h2>Recent search result</h2>
                            <ul class="header-dropdown dropdown">
                                <li><a href="javascript:void(0);">Clear data</a></li>
                                <li><a href="page-search-results.html"><i class="fa fa-external-link"></i></a></li>
                            </ul>
                        </div>
                        <div class="body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item p-l-0 p-r-0">
                                    <h6><a href="#">Crush it - Bootstrap Admin Application Template &amp; Ui Kit</a></h6>
                                    <p class="text-muted">It is a long established fact that a reader will be distracted.</p>
                                    <div class="text-muted font-13">
                                        <ul class="list-inline">
                                            <li class="list-inline-item"><span class="badge badge-secondary margin-0">React</span></li>
                                            <li class="list-inline-item">Dec 27 2020</li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="list-group-item p-l-0 p-r-0">
                                    <h6><a href="#">Epic Pro - HR &amp; Project Management Admin Template and UI Kit</a></h6>
                                    <p class="text-muted">he point of using Lorem Ipsum is that it has a more-or-less English.</p>
                                    <div class="text-muted font-13">
                                        <ul class="list-inline">
                                            <li class="list-inline-item"><span class="badge badge-success margin-0">HTML</span></li>
                                            <li class="list-inline-item">Oct 13 2020</li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="list-group-item p-l-0 p-r-0">
                                    <h6><a href="#">Qubes - Responsive Admin Dashboard Template</a></h6>
                                    <p class="text-muted">Commodo excepteur non ut aliqua ex qui velit sed esse consequat in </p>
                                    <div class="text-muted font-13">
                                        <ul class="list-inline">
                                            <li class="list-inline-item"><span class="badge badge-danger margin-0">Bootstrap</span></li>
                                            <li class="list-inline-item">Sep 27 2020</li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
