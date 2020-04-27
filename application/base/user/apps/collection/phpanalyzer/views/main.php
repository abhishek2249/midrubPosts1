<section>
    <div id="main-wrapper">
        <!--**********************************
        Content body start
    ***********************************-->
        <div>
            <div class="container-fluid mt-3" id="text-custom">
                <ul class="nav nav-pills mb-3" id="taBB">
                    <li class="nav-item"><a href="#navpills-1" class="nav-link active" data-toggle="tab"
                            aria-expanded="false">Dashboard</a></li>
                    <li class="nav-item"><a href="#navpills-2" class="nav-link" data-toggle="tab" aria-expanded="false">
                            Storage</a></li>
                    <li class="nav-item"><a href="#navpills-7" class="nav-link" data-toggle="tab" aria-expanded="false">
                            Compare</a></li>
                    <li class="nav-item"><a href="#navpills-3" class="nav-link" data-toggle="tab" aria-expanded="true">
                            My Reports </a></li>
                    <li class="nav-item"><a href="#navpills-4" class="nav-link" data-toggle="tab"
                            aria-expanded="false" id="favourite_report">Favourites</a></li>
                    <li class="nav-item"><a href="#navpills-5" class="nav-link" data-toggle="tab" aria-expanded="false">
                            Account Settings </a></li>
                    <li class="nav-item"><a href="#navpills-6" class="nav-link" data-toggle="tab" aria-expanded="false">
                            API Documentation </a></li>
                </ul>
                <div class="tab-content br-n pn">
                    <div id="navpills-1" class="tab-pane active">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="pHP_ana_up">
                                            <ul>
                                                <li><i class="fa fa-calendar-check-o"></i>Joined on 2020-04-06</li>
                                                <li><i class="fa fa-credit-card"></i>Account Balance of total points
                                                </li>
                                                <li><i class="fa fa-heart-o"></i>Total Favourites</li>
                                                <li><i class="fa fa-file-text-o"></i>Total Unlock Reports</li>
                                            </ul>
                                            <div class="clearfix"></div>
                                            <h4 class="color">PHP Analyzer <span>Analyze and track your social media
                                                    account</span></h4>
                                            <?php echo form_open('user/app/phpanalyzer', ['id' => 'get-user-detail', 'data-csrf' => $this->security->get_csrf_token_name()]) ?>
                                            <div class="div_diff">
                                                <div class="basic-dropdown col-md-3">
                                                    <div class="dropdown">
                                                        <select class="form-control" name="site" id="site">
                                                            <option value="facebook">Facebook</option>
                                                            <option value="instagram">Instagram</option>
                                                            <option value="twitter">Twitter</option>
                                                            <option value="youtube">Youtube</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <h4 class="card-title color"><i class="fa fa-search upload_ico"></i>
                                                    <input type="text" placeholder="Enter page username" name="username"
                                                        id="username" autocomplete="off"></h4>
                                                <div>
                                                    <ul id="usernameList"></ul>
                                                </div>
                                                <div class="basic-dropdown float-right" id="mobile-left">
                                                    <div class="dropdown">
                                                        <button type="submit" id="search-user-button"
                                                            class="btn btn-primary action-button2"
                                                            id="search-user">Search</button>

                                                    </div>
                                                </div>
                                            </div>
                                            <?php echo form_close(); ?>
                                        </div>
                                    </div>
                                </div>
                                <div id="profile_card"></div>
                            </div>
                        </div>
                    </div>
                    <div id="navpills-2" class="tab-pane">
                        <div class="row align-items-center">
                            <div class="col-lg-12">
                                <img src="" width="100%"> </div>
                        </div>
                    </div>
                    <div id="navpills-7" class="tab-pane">
                        <div class="row align-items-center">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="pHP_ana_up">
                                            <ul>
                                                <li><i class="fa fa-calendar-check-o"></i>Joined on 2020-04-06</li>
                                                <li><i class="fa fa-credit-card"></i>Account Balance of total points
                                                </li>
                                                <li><i class="fa fa-heart-o"></i>Total Favourites</li>
                                                <li><i class="fa fa-file-text-o"></i>Total Unlock Reports</li>
                                            </ul>
                                            <div class="clearfix"></div>
                                            <h4 class="color">Compare Instagram Accounts <span>Analyze and track your
                                                    social media account</span></h4>
                                            <div class="div_diff">
                                                <?php echo form_open('user/app/phpanalyzer', ['id' => 'compare-user-detail', 'data-csrf' => $this->security->get_csrf_token_name()]) ?>
                                                <div class="basic-dropdown">
                                                    <div class="dropdown">
                                                        <div class="basic-dropdown col-md-3">
                                                            <div class="dropdown">
                                                                <select class="form-control" name="compare_site"
                                                                    id="compare_site">
                                                                    <option value="facebook">Facebook</option>
                                                                    <option value="instagram">Instagram</option>
                                                                    <option value="twitter">Twitter</option>
                                                                    <option value="youtube">Youtube</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <!-- <button type="button" class="btn btn-primary dropdown-toggle action-button" data-toggle="dropdown" aria-expanded="false">Facebook</button> -->
                                                        <input type="text" name="f_username" id="f_username"
                                                            class="form-control compare_instagram_user"
                                                            autocomplete="off" />
                                                        <div>
                                                            <ul id="usernameList1"></ul>
                                                        </div>
                                                        <div class="dropdown-menu" x-placement="top-start"
                                                            style="position: absolute; transform: translate3d(207px, -107px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                            <a class="dropdown-item" href="#">Twitter</a> <a
                                                                class="dropdown-item" href="#">Linkedin</a> <a
                                                                class="dropdown-item" href="#">Instagram</a>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="vs">vs</div>
                                                <div class="basic-dropdown">
                                                    <div class="dropdown">
                                                        <!-- <button type="button" class="btn btn-primary dropdown-toggle action-button" data-toggle="dropdown" aria-expanded="false">Instagram</button> -->
                                                        <input type="text" name="s_username" id="s_username"
                                                            class="form-control compare_instagram_user"
                                                            autocomplete="off" />
                                                        <div>
                                                            <ul id="usernameList2"></ul>
                                                        </div>
                                                        <div class="dropdown-menu" x-placement="top-start"
                                                            style="position: absolute; transform: translate3d(207px, -107px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                            <a class="dropdown-item" href="#">Twitter</a> <a
                                                                class="dropdown-item" href="#">Linkedin</a> <a
                                                                class="dropdown-item" href="#">Facebook</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="basic-dropdown float-right">
                                                    <div class="dropdown">
                                                        <button type="submit"
                                                            class="btn btn-primary action-button2">Search</button>
                                                    </div>
                                                </div>
                                                <?php echo form_close(); ?>
                                            </div>
                                            <div class="border-bottom"></div>
                                            <div class="clearfix"></div>
                                            <!--compare report tab top-->
                                            <div id="compare_top"></div>
                                            <!--compare report tab top-->                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="navpills-3" class="tab-pane">
                        <div class="row">
                            <div class="col-lg-12 col-sm-12">
                                <div>
                                    <div id="accordion-two" class="accordion custom_CSS">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5 class="mb-0" data-toggle="collapse" data-target="#collapseOne1"
                                                    aria-expanded="true" aria-controls="collapseOne1"><i class="fa"
                                                        aria-hidden="true"></i>Facebook Accounts Weekly Report</h5>
                                            </div>
                                            <div id="collapseOne1" class="collapse show" data-parent="#accordion-two">
                                                <div class="card" id="white">
                                                    <div class="card-body">
                                                        <div class="pHP_ana_up" id="center-img">
                                                            <h4 class="color">Report for Adidas <span>We are even
                                                                    sending you notification of your tracked social
                                                                    media accounts progress by email</span>
                                                            </h4>
                                                            <div class="col-lg-3 col-md-3 col-sm-6 float-left">
                                                                <img src="" class="img-fluid text-center">
                                                                <h5 class="text-center">Adidas</h5>
                                                            </div>
                                                            <div class="col-lg-7 col-md-7 col-sm-6 float-left">
                                                                <div class="table-responsive stats">
                                                                    <table class="table header-border">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Adidas</th>
                                                                                <th>Previous</th>
                                                                                <th>Latest</th>
                                                                                <th>Difference</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>Followers</td>
                                                                                <td>7,707,709
                                                                                </td>
                                                                                <td>7,707,709</td>
                                                                                <td><span
                                                                                        class="badge badge-primary px-2">O7,707,709</span>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Following</td>
                                                                                <td>7,707,709
                                                                                </td>
                                                                                <td>7,707,709</td>
                                                                                <td><span
                                                                                        class="badge badge-primary px-2">O7,707,709</span>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Uploads</td>
                                                                                <td>7,707,709
                                                                                </td>
                                                                                <td>7,707,709</td>
                                                                                <td><span
                                                                                        class="badge badge-primary px-2">O7,707,709</span>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Average Rate</td>
                                                                                <td>7,707,709
                                                                                </td>
                                                                                <td>7,707,709</td>
                                                                                <td><span
                                                                                        class="badge badge-primary px-2">O7,707,709</span>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="clearfix"></div>
                                                <div class="card" id="white">
                                                    <div class="card-body">
                                                        <div class="pHP_ana_up" id="center-img">
                                                            <h4 class="color">Report for Reebok <span>We are even
                                                                    sending you notification of your tracked social
                                                                    media accounts progress by email</span>

                                                            </h4>
                                                            <div class="col-lg-3 col-md-3 col-sm-6 float-left">
                                                                <img src="" class="img-fluid text-center">
                                                                <h5 class="text-center">Reebok</h5>
                                                            </div>
                                                            <div class="col-lg-7 col-md-7 col-sm-6 float-left">
                                                                <div class="table-responsive stats">
                                                                    <table class="table header-border">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Reebok</th>
                                                                                <th>Previous</th>
                                                                                <th>Latest</th>
                                                                                <th>Difference</th>

                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>Followers</td>
                                                                                <td>7,707,709
                                                                                </td>
                                                                                <td>7,707,709</td>
                                                                                <td><span
                                                                                        class="badge badge-primary px-2">O7,707,709</span>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Following</td>
                                                                                <td>7,707,709
                                                                                </td>
                                                                                <td>7,707,709</td>
                                                                                <td><span
                                                                                        class="badge badge-primary px-2">O7,707,709</span>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Uploads</td>
                                                                                <td>7,707,709
                                                                                </td>
                                                                                <td>7,707,709</td>
                                                                                <td><span
                                                                                        class="badge badge-primary px-2">O7,707,709</span>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Average Rate</td>
                                                                                <td>7,707,709
                                                                                </td>
                                                                                <td>7,707,709</td>
                                                                                <td><span
                                                                                        class="badge badge-primary px-2">O7,707,709</span>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-header">
                                                <h5 class="mb-0 collapsed" data-toggle="collapse"
                                                    data-target="#collapseTwo2" aria-expanded="false"
                                                    aria-controls="collapseTwo2"><i class="fa" aria-hidden="true"></i>
                                                    Youtube Accounts Weekly Report</h5>
                                            </div>
                                            <div id="collapseTwo2" class="collapse" data-parent="#accordion-two">
                                                <div class="card" id="white">
                                                    <div class="card-body">
                                                        <div class="pHP_ana_up" id="center-img">
                                                            <h4 class="color">Report for Gucci <span>We are even sending
                                                                    you notification of your tracked social media
                                                                    accounts progress by email</span>
                                                            </h4>
                                                            <div class="col-lg-3 col-md-3 col-sm-6 float-left">
                                                                <img src="" class="img-fluid text-center">
                                                                <h5 class="text-center">Gucci</h5>
                                                            </div>
                                                            <div class="col-lg-7 col-md-7 col-sm-6 float-left">
                                                                <div class="table-responsive stats">
                                                                    <table class="table header-border">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Gucci</th>
                                                                                <th>Previous</th>
                                                                                <th>Latest</th>
                                                                                <th>Difference</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>Followers</td>
                                                                                <td>7,707,709
                                                                                </td>
                                                                                <td>7,707,709</td>
                                                                                <td><span
                                                                                        class="badge badge-primary px-2">O7,707,709</span>
                                                                                </td>


                                                                            </tr>
                                                                            <tr>
                                                                                <td>Following</td>
                                                                                <td>7,707,709
                                                                                </td>
                                                                                <td>7,707,709</td>
                                                                                <td><span
                                                                                        class="badge badge-primary px-2">O7,707,709</span>
                                                                                </td>

                                                                            </tr>
                                                                            <tr>
                                                                                <td>Uploads</td>
                                                                                <td>7,707,709
                                                                                </td>
                                                                                <td>7,707,709</td>
                                                                                <td><span
                                                                                        class="badge badge-primary px-2">O7,707,709</span>
                                                                                </td>

                                                                            </tr>

                                                                            <tr>
                                                                                <td>Average Rate</td>
                                                                                <td>7,707,709
                                                                                </td>
                                                                                <td>7,707,709</td>
                                                                                <td><span
                                                                                        class="badge badge-primary px-2">O7,707,709</span>
                                                                                </td>


                                                                            </tr>

                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>


                                                        </div>
                                                    </div>
                                                </div>




                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-header">
                                                <h5 class="mb-0 collapsed" data-toggle="collapse"
                                                    data-target="#collapseThree3" aria-expanded="false"
                                                    aria-controls="collapseThree3"><i class="fa" aria-hidden="true"></i>
                                                    Twitter Accounts Weekly Report</h5>
                                            </div>
                                            <div id="collapseThree3" class="collapse" data-parent="#accordion-two">
                                                <div class="card" id="white">
                                                    <div class="card-body">
                                                        <div class="pHP_ana_up" id="center-img">

                                                            <h4 class="color">Report for Adidas <span>We are even
                                                                    sending you notification of your tracked social
                                                                    media accounts progress by email</span>

                                                            </h4>

                                                            <div class="col-lg-3 col-md-3 col-sm-6 float-left">
                                                                <img src="" class="img-fluid text-center">
                                                                <h5 class="text-center">Adidas</h5>
                                                            </div>


                                                            <div class="col-lg-7 col-md-7 col-sm-6 float-left">

                                                                <div class="table-responsive stats">
                                                                    <table class="table header-border">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Adidas</th>
                                                                                <th>Previous</th>
                                                                                <th>Latest</th>
                                                                                <th>Difference</th>

                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>Followers</td>
                                                                                <td>7,707,709
                                                                                </td>
                                                                                <td>7,707,709</td>
                                                                                <td><span
                                                                                        class="badge badge-primary px-2">O7,707,709</span>
                                                                                </td>


                                                                            </tr>
                                                                            <tr>
                                                                                <td>Following</td>
                                                                                <td>7,707,709
                                                                                </td>
                                                                                <td>7,707,709</td>
                                                                                <td><span
                                                                                        class="badge badge-primary px-2">O7,707,709</span>
                                                                                </td>

                                                                            </tr>
                                                                            <tr>
                                                                                <td>Uploads</td>
                                                                                <td>7,707,709
                                                                                </td>
                                                                                <td>7,707,709</td>
                                                                                <td><span
                                                                                        class="badge badge-primary px-2">O7,707,709</span>
                                                                                </td>

                                                                            </tr>

                                                                            <tr>
                                                                                <td>Average Rate</td>
                                                                                <td>7,707,709
                                                                                </td>
                                                                                <td>7,707,709</td>
                                                                                <td><span
                                                                                        class="badge badge-primary px-2">O7,707,709</span>
                                                                                </td>


                                                                            </tr>

                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>


                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="card">
                                            <div class="card-header">
                                                <h5 class="mb-0 collapsed" data-toggle="collapse"
                                                    data-target="#collapseThree4" aria-expanded="false"
                                                    aria-controls="collapseThree4"><i class="fa" aria-hidden="true"></i>
                                                    Instagram Accounts Weekly Report</h5>
                                            </div>
                                            <div id="collapseThree4" class="collapse" data-parent="#accordion-two">
                                                <div class="card" id="white">
                                                    <div class="card-body">
                                                        <div class="pHP_ana_up" id="center-img">
                                                            <h4 class="color">Report for Reebok <span>We are even
                                                                    sending you notification of your tracked social
                                                                    media accounts progress by email</span>

                                                            </h4>

                                                            <div class="col-lg-3 col-md-3 col-sm-6 float-left">
                                                                <img src="" class="img-fluid text-center">
                                                                <h5 class="text-center">Reebok</h5>
                                                            </div>


                                                            <div class="col-lg-7 col-md-7 col-sm-6 float-left">

                                                                <div class="table-responsive stats">
                                                                    <table class="table header-border">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Reebok</th>
                                                                                <th>Previous</th>
                                                                                <th>Latest</th>
                                                                                <th>Difference</th>

                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>Followers</td>
                                                                                <td>7,707,709
                                                                                </td>
                                                                                <td>7,707,709</td>
                                                                                <td><span
                                                                                        class="badge badge-primary px-2">O7,707,709</span>
                                                                                </td>


                                                                            </tr>
                                                                            <tr>
                                                                                <td>Following</td>
                                                                                <td>7,707,709
                                                                                </td>
                                                                                <td>7,707,709</td>
                                                                                <td><span
                                                                                        class="badge badge-primary px-2">O7,707,709</span>
                                                                                </td>

                                                                            </tr>
                                                                            <tr>
                                                                                <td>Uploads</td>
                                                                                <td>7,707,709
                                                                                </td>
                                                                                <td>7,707,709</td>
                                                                                <td><span
                                                                                        class="badge badge-primary px-2">O7,707,709</span>
                                                                                </td>

                                                                            </tr>

                                                                            <tr>
                                                                                <td>Average Rate</td>
                                                                                <td>7,707,709
                                                                                </td>
                                                                                <td>7,707,709</td>
                                                                                <td><span
                                                                                        class="badge badge-primary px-2">O7,707,709</span>
                                                                                </td>


                                                                            </tr>

                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>


                                                        </div>

                                                    </div>
                                                </div>

                                            </div>
                                        </div>


                                    </div>

                                </div>






                            </div>


                        </div>
                    </div>
                    <div id="navpills-4" class="tab-pane">
                        <div class="row">
                            <div class="col-lg-12">
                                <div id="accordion-three" class="accordion custom_CSS">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="mb-0" data-toggle="collapse" data-target="#click1"
                                                aria-expanded="true" aria-controls="click1"><i class="fa"
                                                    aria-hidden="true"></i>Your Favourite Facebook Accounts
                                                <span>5</span></h5>
                                        </div>
                                        <div id="click1" class="collapse show" data-parent="#accordion-three">


                                            <div class="card" id="white">
                                                <div class="card-body">
                                                    <div class="pHP_ana_up">


                                                        <div class="col-lg-12">

                                                            <div class="table-responsive stats">
                                                                <table class="table header-border">
                                                                    <thead>
                                                                        <tr>
                                                                            <th></th>
                                                                            <th>Username</th>
                                                                            <th>Likes</th>
                                                                            <th>Followers</th>

                                                                            <th></th>

                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td><img src="" width="30"></td>
                                                                            <td>Followers</td>
                                                                            <td>7,707,709
                                                                            </td>
                                                                            <td>7,707,709</td>

                                                                            <td><i class="fa fa-heart"></i>
                                                                            </td>


                                                                        </tr>
                                                                        <tr>
                                                                            <td><img src="" width="30"></td>
                                                                            <td>Followers</td>
                                                                            <td>7,707,709
                                                                            </td>
                                                                            <td>7,707,709</td>

                                                                            <td><i class="fa fa-heart"></i>
                                                                            </td>


                                                                        </tr>
                                                                        <tr>
                                                                            <td><img src="" width="30"></td>
                                                                            <td>Followers</td>
                                                                            <td>7,707,709
                                                                            </td>
                                                                            <td>7,707,709</td>

                                                                            <td><i class="fa fa-heart"></i>
                                                                            </td>


                                                                        </tr>

                                                                        <tr>
                                                                            <td><img src="" width="30"></td>
                                                                            <td>Followers</td>
                                                                            <td>7,707,709
                                                                            </td>
                                                                            <td>7,707,709</td>

                                                                            <td><i class="fa fa-heart"></i>
                                                                            </td>


                                                                        </tr>

                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>


                                                    </div>

                                                </div>
                                            </div>


                                        </div>
                                    </div>


                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="mb-0 collapsed" data-toggle="collapse" data-target="#click2"
                                                aria-expanded="false" aria-controls="click2"><i class="fa"
                                                    aria-hidden="true"></i> Your Favourite youtube accounts
                                                <span>20</span>
                                        </div>
                                        <div id="click2" class="collapse" data-parent="#accordion-three">
                                            <div class="card" id="white">
                                                <div class="card-body">
                                                    <div class="pHP_ana_up">


                                                        <div class="col-lg-12">

                                                            <div class="table-responsive stats">
                                                                <table class="table header-border">
                                                                    <thead>
                                                                        <tr>
                                                                            <th></th>
                                                                            <th>Username</th>
                                                                            <th>Likes</th>
                                                                            <th>Followers</th>

                                                                            <th></th>

                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td><img src="" width="30"></td>
                                                                            <td>Followers</td>
                                                                            <td>7,707,709
                                                                            </td>
                                                                            <td>7,707,709</td>

                                                                            <td><i class="fa fa-heart"></i>
                                                                            </td>


                                                                        </tr>
                                                                        <tr>
                                                                            <td><img src="" width="30"></td>
                                                                            <td>Followers</td>
                                                                            <td>7,707,709
                                                                            </td>
                                                                            <td>7,707,709</td>

                                                                            <td><i class="fa fa-heart"></i>
                                                                            </td>


                                                                        </tr>
                                                                        <tr>
                                                                            <td><img src="" width="30"></td>
                                                                            <td>Followers</td>
                                                                            <td>7,707,709
                                                                            </td>
                                                                            <td>7,707,709</td>

                                                                            <td><i class="fa fa-heart"></i>
                                                                            </td>


                                                                        </tr>

                                                                        <tr>
                                                                            <td><img src="" width="30"></td>
                                                                            <td>Followers</td>
                                                                            <td>7,707,709
                                                                            </td>
                                                                            <td>7,707,709</td>

                                                                            <td><i class="fa fa-heart"></i>
                                                                            </td>


                                                                        </tr>

                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>


                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="mb-0" data-toggle="collapse" data-target="#click3"
                                                aria-expanded="true" aria-controls="click3"><i class="fa"
                                                    aria-hidden="true"></i>Your Favourite Twitter Accounts
                                                <span>5</span></h5>
                                        </div>
                                        <div id="click3" class="collapse show" data-parent="#accordion-three">


                                            <div class="card" id="white">
                                                <div class="card-body">
                                                    <div class="pHP_ana_up">


                                                        <div class="col-lg-12">

                                                            <div class="table-responsive stats">
                                                                <table class="table header-border">
                                                                    <thead>
                                                                        <tr>
                                                                            <th></th>
                                                                            <th>Username</th>
                                                                            <th>Likes</th>
                                                                            <th>Followers</th>

                                                                            <th></th>

                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td><img src="" width="30"></td>
                                                                            <td>Followers</td>
                                                                            <td>7,707,709
                                                                            </td>
                                                                            <td>7,707,709</td>

                                                                            <td><i class="fa fa-heart"></i>
                                                                            </td>


                                                                        </tr>
                                                                        <tr>
                                                                            <td><img src="" width="30"></td>
                                                                            <td>Followers</td>
                                                                            <td>7,707,709
                                                                            </td>
                                                                            <td>7,707,709</td>

                                                                            <td><i class="fa fa-heart"></i>
                                                                            </td>


                                                                        </tr>
                                                                        <tr>
                                                                            <td><img src="" width="30"></td>
                                                                            <td>Followers</td>
                                                                            <td>7,707,709
                                                                            </td>
                                                                            <td>7,707,709</td>

                                                                            <td><i class="fa fa-heart"></i>
                                                                            </td>


                                                                        </tr>

                                                                        <tr>
                                                                            <td><img src="" width="30"></td>
                                                                            <td>Followers</td>
                                                                            <td>7,707,709
                                                                            </td>
                                                                            <td>7,707,709</td>

                                                                            <td><i class="fa fa-heart"></i>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="mb-0" data-toggle="collapse" data-target="#click4"
                                                aria-expanded="true" aria-controls="click4"><i class="fa"
                                                    aria-hidden="true"></i>Your Favourite Instagram Accounts
                                                <span id="instagram_fav_list_count"></span></h5>
                                        </div>
                                        <div id="click4" class="collapse show" data-parent="#accordion-three">
                                            <div class="card" id="white">
                                                <div class="card-body">
                                                    <div class="pHP_ana_up">
                                                        <div class="col-lg-12">
                                                            <div class="table-responsive stats">
                                                                <table class="table header-border">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Username</th>
                                                                            <th>Followers</th>
                                                                            <th>Following</th>
                                                                            <th>Uploads</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody id="instagram_fav_list">
                                                                        <tr>
                                                                            <td><img src="" width="30"></td>
                                                                            <td>Followers</td>
                                                                            <td>7,707,709
                                                                            </td>
                                                                            <td>7,707,709</td>
                                                                            <td><i class="fa fa-heart"></i>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>


                                                    </div>

                                                </div>
                                            </div>


                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                    <!--favourite end-->
                    <div id="navpills-5" class="tab-pane">
                        <div class="row align-items-center">

                            <div class="col-lg-12">
                                <div id="col_3">
                                    <div class="card">
                                        <div class="card-body">

                                            <div class="clearfix"></div>
                                            <p>No Data Found</p>





                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div id="navpills-6" class="tab-pane">
                        <div class="row align-items-center">

                            <div class="col-lg-12">
                                <div id="col_3">
                                    <div class="card">
                                        <div class="card-body">

                                            <div class="clearfix"></div>
                                            <p>Lorem ipsum sit dolor</p>





                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #/ container -->
        </div>
        <!--**********************************
            Content body end
        ***********************************-->        
    </div>
</section>