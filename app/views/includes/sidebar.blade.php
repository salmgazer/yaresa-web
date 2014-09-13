            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="{{ URL::to('maindashboard')}}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> OPD<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{ URL::to('OPDEvents') }}">OPD Events</a>
                                </li>
                                <li>
                                    <a href="#">Report 2</a>
                                </li>
                                <li>
                                    <a href="#">Sub Sub Level <span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <a href="#">Third Level Item</a>
                                        </li>
                                        <li>
                                            <a href="#">Third Level Item</a>
                                        </li>
                                        <li>
                                            <a href="#">Third Level Item</a>
                                        </li>
                                        <li>
                                            <a href="#">Third Level Item</a>
                                        </li>
                                    </ul>
                                    <!-- /.nav-third-level -->
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Community Members<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{ URL::to('CommunityMembers') }}">Member Details </a>
                                </li>
                                <li>
                                    <a href="#">By Age </a>
                                </li>
                                <li>
                                    <a href="{{ URL::to('CommunityMembers/gender') }} ">By Gender</a>
                                </li>
                                <li>
                                    <a href="#">NHIA expiry</a>
                                </li>
                                <li>
                                    <a href="#">Further Info <span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <a href="#">Third Level Item</a>
                                        </li>
                                        <li>
                                            <a href="#">Third Level Item</a>
                                        </li>
                                        <li>
                                            <a href="#">Third Level Item</a>
                                        </li>
                                        <li>
                                            <a href="#">Third Level Item</a>
                                        </li>
                                    </ul>
                                    <!-- /.nav-third-level -->
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

                        <li>
                            {{--<a  ><i class="fa fa-table fa-fw"></i> Vaccination</a> --}}
                             {{ HTML::link('/vaccinedashboard', 'Vaccination', array('class'=>'fa fa-table fa-fw') )}}   
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-table fa-fw"></i> Family Planning</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-table fa-fw"></i> Health Promotion</a>
                        </li>
                        
                        
                        <li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i> Support Data<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{ URL::to('Chos') }}">CHOs</a>
                                </li>
                                <li>
                                    <a href="#">Districts</a>
                                </li>
                                <li>
                                    <a href="#">OPD Case Categories</a>
                                </li>
                                <li>
                                    <a href="{{ URL::to('community')}}">Communities</a>
                                    
                                </li>
                                <li>
                                    <a href="{{ URL::to('subdistricts')}}">Sub-districts</a>
                                </li>
                                <li>
                                    <a href="#">Health promotion methods</a>
                                </li>
                                <li>
                                    <a href="#">Resource Categories</a>
                                </li><li>
                                    <a href="#">Vaccine Types n Schedules</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-sitemap fa-fw"></i> Security<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#">Users</a>
                                </li>
                                

                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                       
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->