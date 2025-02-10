<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    @include('store.Links.headerLinks')
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            @include('store.layout.sideMenu')
            <!-- Layout container -->
            <div class="layout-page">
                @include('store.layout.navbar')
                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <div class="row gy-6">            
                            <!-- Transactions -->
                            <div class="col-lg-12">
                              <div class="card h-100">
                                <div class="card-header">
                                  <div class="d-flex align-items-center justify-content-between">
                                    <h5 class="card-title m-0 me-2">Transactions</h5>
                                    <div class="dropdown">
                                      <button
                                        class="btn text-muted p-0"
                                        type="button"
                                        id="transactionID"
                                        data-bs-toggle="dropdown"
                                        aria-haspopup="true"
                                        aria-expanded="false">
                                        <i class="ri-more-2-line ri-24px"></i>
                                      </button>
                                      <div class="dropdown-menu dropdown-menu-end" aria-labelledby="transactionID">
                                        <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
                                        <a class="dropdown-item" href="javascript:void(0);">Share</a>
                                        <a class="dropdown-item" href="javascript:void(0);">Update</a>
                                      </div>
                                    </div>
                                  </div>
                                  <p class="small mb-0"><span class="h6 mb-0">Total 48.5% Growth</span> 😎 this month</p>
                                </div>
                                <div class="card-body pt-lg-10">
                                  <div class="row g-6">
                                    <div class="col-md-3 col-6">
                                      <div class="d-flex align-items-center">
                                        <div class="avatar">
                                          <div class="avatar-initial bg-primary rounded shadow-xs">
                                            <i class="ri-pie-chart-2-line ri-24px"></i>
                                          </div>
                                        </div>
                                        <div class="ms-3">
                                          <p class="mb-0">Sales</p>
                                          <h5 class="mb-0">130</h5>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-md-3 col-6">
                                      <div class="d-flex align-items-center">
                                        <div class="avatar">
                                          <div class="avatar-initial bg-success rounded shadow-xs">
                                            <i class="ri-group-line ri-24px"></i>
                                          </div>
                                        </div>
                                        <div class="ms-3">
                                          <p class="mb-0">Customers</p>
                                          <h5 class="mb-0">12.5k</h5>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-md-3 col-6">
                                      <div class="d-flex align-items-center">
                                        <div class="avatar">
                                          <div class="avatar-initial bg-warning rounded shadow-xs">
                                            <i class="ri-macbook-line ri-24px"></i>
                                          </div>
                                        </div>
                                        <div class="ms-3">
                                          <p class="mb-0">Product</p>
                                          <h5 class="mb-0">15</h5>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-md-3 col-6">
                                      <div class="d-flex align-items-center">
                                        <div class="avatar">
                                          <div class="avatar-initial bg-info rounded shadow-xs">
                                            <i class="ri-money-dollar-circle-line ri-24px"></i>
                                          </div>
                                        </div>
                                        <div class="ms-3">
                                          <p class="mb-0">Revenue</p>
                                          <h5 class="mb-0">50,000 PKR</h5>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!--/ Transactions -->
                          </div>
                    </div>
                    <!-- / Content -->
                    @include('store.layout.footer')

                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->
    @include('store.Links.jsLinks')
</body>

</html>
