
<nav class="navbar navbar-light bg-light p-3">
        <div class="d-flex col-12 col-md-3 col-lg-2 mb-2 mb-lg-0 flex-wrap flex-md-nowrap justify-content-between">
            <a class="navbar-brand" href="<?php echo BASE_URL ?>/login/dashboard">
                Admin HLShop
            </a>
            <button class="navbar-toggler d-md-none collapsed mb-3" type="button" data-toggle="collapse" data-target="#sidebar" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
                <h3 class="navbar-toggler-icon"></h3>
            </button>
        </div>
      
        <div class="col-12 col-md-5 col-lg-8 d-flex align-items-center justify-content-md-end mt-3 mt-md-0">
               <?php 
                    foreach($customer as $key => $info){
              ?>
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
                      <?php echo $info['customers_name'] ?>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <li><a class="dropdown-item" href="#">Settings</a></li>
                  <li><a class="dropdown-item" href="#">Messages</a></li>
                  <li><a class="dropdown-item" href="<?php echo BASE_URL ?>/index/homepage">Sign out</a></li>
                </ul>
              </div>
              <?php  }?>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                          <a class="nav-link active"  href="<?php echo BASE_URL?>/login/dashboard">
                            <p class="h4"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                            Dashboard</p>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="<?php echo BASE_URL?>/order">
                            <h3 class=""><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path><polyline points="13 2 13 9 20 9"></polyline></svg>
                            Orders</h3>
                          </a>
                        </li>
                    <li class="dropdown mx-3"><h3  data-toggle="dropdown" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-cart"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
                    Category</h3> 
                                <ul class="dropdown-menu">
                                <li class="nav-item"><a class="nav-link " href="<?php echo BASE_URL?>/product"><h6 style="text-align: center;"> Add Category </h6></a></li>
                                <li class="nav-item"><a  class="nav-link" href="<?php echo BASE_URL?>/product/list_category"><h6 style="text-align: center;">List Category</h6></a></li>
                                </ul>
                              </li>
                        <li class="dropdown mx-3"><h3  data-toggle="dropdown" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bookmark" viewBox="0 0 16 16"> <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5V2zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1H4z"/>
</svg>
                         Products</h3> 
                                <ul class="dropdown-menu">
                                <li class="nav-item"><a class="nav-link " href="<?php echo BASE_URL?>/product/add_product"><h6 style="text-align: center;"> Add Products </h6></a></li>
                                <li class="nav-item"><a  class="nav-link" href="<?php echo BASE_URL?>/product/list_product"><h6 style="text-align: center;">List Products</h6></a></li>
                                <li class="nav-item"><a  class="nav-link" href="<?php echo BASE_URL?>/product/inventory_management"><h6 style="text-align: center;">Inventory</h6></a></li>

                                </ul>
                              </li>
                              
                        <li class="nav-item">
                          <a class="nav-link" href="<?php echo BASE_URL?>/customer/customer_list">
                            <h3 class=""><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                            Customers</h3>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#">
                           
                            <h3 class=""> <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bar-chart-2"><line x1="18" y1="20" x2="18" y2="10"></line><line x1="12" y1="20" x2="12" y2="4"></line><line x1="6" y1="20" x2="6" y2="14"></line></svg>Reports</h3>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="<?php echo BASE_URL?>/contact/list_contact">
                            <h3 class=""><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layers"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>
                            Contacts</h3>
                          </a>
                        </li>
                        
                      </ul>
                </div>
            </nav>
            <main class="col-md-9 ml-sm-auto col-lg-10 px-md-4 py-4">
