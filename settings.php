<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin panel-Settings</title>
    <?php require('inc/link.php'); ?>
</head>
<body class="bg-light">
    <?php require('inc/header.php'); ?>

    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto overflow-hidden">
                <h3 class="mb-4">SETTINGS</h3>

                <!-- General settings section -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="card-title m-0">General Settings</h5>
                            <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#general-s">
                                <i class="bi bi-pencil-square"></i>Edit</button>
                        </div>
                        <h6 class="card-subtitle mb-1 fw-bold">Site title</h6>
                        <p class="card-text" id="site_title"></p>
                        <h6 class="card-subtitle mb-1 fw-bold">About us</h6>
                        <p class="card-text" id="site_about"></p>
                    </div>
                </div>

                <!-- General settings modal -->
                <div class="modal fade" id="general-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <form id="general_s_form">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">General Settings</h5>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Site Title</label>
                                        <input type="text" name="site_title" id="site_title_inp" class="form-control shadow-none" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">About us</label>
                                        <textarea name="site_about" id="site_about_inp" class="form-control shadow-none" rows="6" required></textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn text-secondary shadow-none" data-bs-dismiss="modal">CANCEL</button>
                                    <button type="submit" class="btn custom-bg text-white shadow-none">SUBMIT</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php require('inc/scripts.php'); ?>
    <script>
    // Fetch general settings
    function getGeneral() {
        fetch('ajax/settings_crud.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: 'get_general=1',
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Failed to fetch general settings');
            }
            return response.json();
        })
        .then(data => {
            // Update DOM with fetched general settings
            updateGeneralSettingsUI(data);
        })
        .catch(error => {
            console.error('Error fetching general settings:', error);
        });
    }

    // Update UI with general settings data
    function updateGeneralSettingsUI(data) {
        document.getElementById('site_title').innerText = data.site_title;
        document.getElementById('site_about').innerText = data.site_about;
        document.getElementById('site_title_inp').value = data.site_title;
        document.getElementById('site_about_inp').value = data.site_about;
    }

    // Event listener for general settings form submission
    document.getElementById('general_s_form').addEventListener('submit', function(e) {
        e.preventDefault();
        const formData = new FormData(this);
        const urlSearchParams = new URLSearchParams(formData);
        const params = new URLSearchParams(urlSearchParams).toString();
        updateGeneral(params);
    });

    // Update general settings
    function updateGeneral(params) {
        fetch('ajax/settings_crud.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: params,
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Failed to update general settings. Status: ' + response.status);
            }
            return response.json();
        })
        .then(data => {
            if (data.success) {
                // Optional: Show success message or update UI as needed
                console.log('General settings updated successfully');
            } else {
                console.error('Failed to update general settings');
            }
        })
        .catch(error => {
            console.error('Error updating general settings:', error);
        });
    }

    // Call getGeneral on window load
    window.onload = function() {
        getGeneral();
    };
    </script>

</body>
</html>
