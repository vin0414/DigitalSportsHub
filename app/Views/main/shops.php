<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="apple-touch-icon" href="<?=base_url('assets/images/logo.jpg')?>">
    <link rel="shortcut icon" type="image/x-icon" href="<?=base_url('assets/images/logo.jpg')?>">
    <title>Digital Sports Hub</title>
    <link href="<?=base_url('admin/css/tabler.min.css')?>" rel="stylesheet" />
    <link href="<?=base_url('admin/css/demo.min.css')?>" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/dist/tabler-icons.min.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.1/css/dataTables.dataTables.css" />
    <style>
    @import url("https://rsms.me/inter/inter.css");
    </style>
</head>

<body>
    <script src="<?=base_url('admin/js/demo-theme.min.js')?>"></script>
    <div class="page">
        <!--  BEGIN SIDEBAR  -->
        <?= view('main/templates/sidebar')?>
        <!--  END SIDEBAR  -->
        <!-- BEGIN NAVBAR  -->
        <?= view('main/templates/navbar')?>
        <!-- END NAVBAR  -->
        <div class="page-wrapper">
            <!-- BEGIN PAGE HEADER -->
            <div class="page-header d-print-none">
                <div class="container-xl">
                    <div class="row g-2 align-items-center">
                        <div class="col">
                            <!-- Page pre-title -->
                            <div class="page-pretitle">Digital Sports Hub</div>
                            <h2 class="page-title"><?=$title?></h2>
                        </div>
                        <!-- Page title actions -->
                    </div>
                </div>
            </div>
            <!-- END PAGE HEADER -->
            <!-- BEGIN PAGE BODY -->
            <div class="page-body">
                <div class="container-xl">
                    <div class="row row-cards">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <ul class="nav nav-tabs card-header-tabs" data-bs-toggle="tabs">
                                        <li class="nav-item">
                                            <a href="#tabs-home-8" class="nav-link active" data-bs-toggle="tab">
                                                <i class="ti ti-map-2"></i>&nbsp;Map
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#tabs-profile-8" class="nav-link" data-bs-toggle="tab">
                                                <i class="ti ti-building-store"></i>&nbsp;List of Shops
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-body">
                                    <div class="tab-content">
                                        <div class="tab-pane fade active show" id="tabs-home-8">
                                            <div class="row g-3">
                                                <div class="col-lg-12">
                                                    <div id="map" style="height: 500px;"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="tabs-profile-8">
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-striped" id="tblshop">
                                                    <thead>
                                                        <th>Shop's Name</th>
                                                        <th>Address</th>
                                                        <th>Website</th>
                                                        <th>Longitude</th>
                                                        <th>Latitude</th>
                                                        <th>Action</th>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach($shop as $row): ?>
                                                        <tr>
                                                            <td><?php echo $row['shop_name'] ?></td>
                                                            <td><?php echo $row['address'] ?></td>
                                                            <td><?php echo $row['website'] ?></td>
                                                            <td><?php echo $row['longitude'] ?></td>
                                                            <td><?php echo $row['latitude'] ?></td>
                                                            <td>
                                                                <button type="button" class="btn btn-primary edit" value="<?php echo $row['shop_id'] ?>">
                                                                <i class="ti ti-edit"></i>&nbsp;Edit
                                                                </button>
                                                            </td>
                                                        </tr>
                                                        <?php endforeach; ?>
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
            <!-- END PAGE BODY -->
            <!--  BEGIN FOOTER  -->
            <footer class="footer footer-transparent d-print-none">
                <div class="container-xl">
                    <div class="row text-center align-items-center flex-row-reverse">
                        <div class="col-12 col-lg-auto mt-3 mt-lg-0">
                            <ul class="list-inline list-inline-dots mb-0">
                                <li class="list-inline-item">
                                    Copyright &copy; <?= date('Y')?>
                                    <a href="." class="link-secondary">Digital Sports Hub</a>. All rights reserved.
                                </li>
                                <li class="list-inline-item">
                                    <a href="" class="link-secondary" rel="noopener"> v1.1.1 </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
            <!--  END FOOTER  -->
        </div>
    </div>
    <div class="modal modal-blur fade" id="modal-report" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title"><i class="ti ti-building-store"></i>&nbsp;Add Shop</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form method="POST" class="row g-3" id="frmShop">
                <?=csrf_field()?>
                <input type="hidden" id="longitude" name="longitude"/>
                <input type="hidden" id="latitude" name="latitude"/>
                <div class="col-lg-12">
                    <label class="form-label">Name of the Shop</label>
                    <input type="text" class="form-control" name="name_shop" required/>
                    <div id="name_shop-error" class="error-message text-danger text-sm"></div>
                </div>
                <div class="col-lg-12">
                    <label class="form-label">Address</label>
                    <textarea name="address" class="form-control" required></textarea>
                    <div id="address-error" class="error-message text-danger text-sm"></div>
                </div>
                <div class="col-lg-12">
                    <label class="form-label">Website</label>
                    <input type="text" class="form-control" name="website" required/>
                    <div id="website-error" class="error-message text-danger text-sm"></div>
                </div>
                <div class="col-lg-12">
                    <button type="submit" class="btn btn-primary">
                        <i class="ti ti-device-floppy"></i>&nbsp;Save Entry
                    </button>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="modal modal-blur fade" id="editModal" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title"><i class="ti ti-building-store"></i>&nbsp;Edit Shop</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body" id="output">
            
          </div>
        </div>
      </div>
    </div>
    <!-- END PAGE MODALS -->
                                                            
    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="<?=base_url('admin/js/tabler.min.js')?>" defer></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->
    <!-- BEGIN DEMO SCRIPTS -->
    <script src="<?=base_url('admin/js/demo.min.js')?>" defer></script>
    <!-- END DEMO SCRIPTS -->
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/2.2.1/js/dataTables.js"></script>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <script>
        // Step 2: Initialize the Map
        var map = L.map('map').setView([14.3134, 120.8926],11);  // Coordinates and zoom level

        // Step 3: Add Tile Layer
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        $.ajax({
            url: '<?=site_url('shop-location')?>',  // The PHP script URL
            type: 'GET',
            dataType: 'json',  // Expect JSON response
            success: function(data) {
                // On success, iterate over each shop and add a marker on the map
                data.forEach(function(shop) {
                var marker = L.marker([shop.latitude, shop.longitude]).addTo(map);
                var popupContent = `
                    <h4>${shop.shop_name}</h4>
                    <span>${shop.address}</span><br/>
                    <a href="${shop.website}" target="_blank">Visit our website</a>
                `;
                marker.bindPopup(popupContent);
                });
            },
            error: function(xhr, status, error) {
                console.error("Error fetching shop data:", error);
            }
        });

        var marker;

        // When the map is clicked, add or move marker
        map.on('click', function(e) {
            var lat = e.latlng.lat;
            var lng = e.latlng.lng;

            // If there's already a marker, remove it
            if (marker) {
                map.removeLayer(marker);
            }

            // Add new marker at the clicked position
            marker = L.marker([lat, lng]).addTo(map);
            // You can also store coordinates in hidden fields or variables
            document.getElementById("latitude").value = lat;
            document.getElementById("longitude").value = lng;
            $('#modal-report').modal('show');
        });

    $('#tblshop').DataTable();
    $(document).on('click','.edit',function(){
        $.ajax({
            url:"<?=site_url('fetch-shop')?>",
            method:"GET",data:{value:$(this).val()},
            success:function(response)
            {
                $('#editModal').modal('show');
                $('#output').html(response);
            }
        });
    });

    $(document).on('click','.save', function(e) {
        e.preventDefault();
        $('.error-message').html('');
        let data = $('#frmEditShop').serialize();
        $.ajax({
            url: "<?=site_url('edit-shop')?>",
            method: "POST",
            data: data,
            success: function(response) {
                if (response.success) {
                    Swal.fire({
                        title: 'Great!',
                        text: "Successfully applied changes",
                        icon: 'success',
                        confirmButtonText: 'Continue'
                    }).then((result) => {
                        // Action based on user's choice
                        if (result.isConfirmed) {
                            // Perform some action when "Yes" is clicked
                            location.reload();
                        }
                    });
                } else {
                    var errors = response.error;
                    // Iterate over each error and display it under the corresponding input field
                    for (var field in errors) {
                        $('#' + field + '-error').html('<p>' + errors[field] +
                            '</p>'); // Show the first error message
                        $('#' + field).addClass(
                            'text-danger'); // Highlight the input field with an error
                    }
                }
            }
        });
    });

    $('#frmShop').on('submit', function(e) {
        e.preventDefault();
        $('.error-message').html('');
        let data = $(this).serialize();
        $.ajax({
            url: "<?=site_url('save-shop')?>",
            method: "POST",
            data: data,
            success: function(response) {
                if (response.success) {
                    $('#frmShop')[0].reset();
                    Swal.fire({
                        title: 'Great!',
                        text: "Successfully added",
                        icon: 'success',
                        confirmButtonText: 'Continue'
                    }).then((result) => {
                        // Action based on user's choice
                        if (result.isConfirmed) {
                            // Perform some action when "Yes" is clicked
                            location.reload();
                        }
                    });
                } else {
                    var errors = response.error;
                    // Iterate over each error and display it under the corresponding input field
                    for (var field in errors) {
                        $('#' + field + '-error').html('<p>' + errors[field] +
                            '</p>'); // Show the first error message
                        $('#' + field).addClass(
                            'text-danger'); // Highlight the input field with an error
                    }
                }
            }
        });
    });
    </script>
</body>

</html>