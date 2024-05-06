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
                <div class="card border-0 shadow-sm md-4">
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
                                <div class="modal-footer">
                                    <button type="button" onclick="site_title.value = general_data.site_title, site_about.value = general_data.site_about " class="btn text-secondary shadow-none" data-bs-dismiss="modal">CANCEL</button>
                                    <button type="submit" onclick="upd_general(site_title.value, site_about.value )" class="btn custom-bg text-white shadow-none">SUBMIT</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Shutdown  section -->
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="card-title m-0">Shutdown Website</h5>
                            <div class="form-check form-switch">
                                <form>
                                    <input onchange="upd_shutdown(this.value)" class="form-check-input" type="checkbox" id="shutdown-toggle">
                                </form>
                        </div>
                        <p class="card-text">
                            No customer will be allowed to book tabel, when shutdown mode is turned on.
                        </p>
                    </div>
                </div>

                 <!-- Contact details section -->
                 <div class="card border-0 shadow-sm md-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="card-title m-0">Contacts Settings</h5>
                            <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#contacts-s">
                                <i class="bi bi-pencil-square"></i>Edit</button>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-4">
                            <h6 class="card-subtitle mb-1 fw-bold">Address</h6>
                           <p class="card-text" id="address"></p>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-4">
                            <h6 class="card-subtitle mb-1 fw-bold">Google Map</h6>
                           <p class="card-text" id="gmap"></p>
                            </div>
                            <div class="mb-4">
                            <h6 class="card-subtitle mb-1 fw-bold">Phone Numbers </h6>
                           <p class="card-text mb-1">
                            <i class="bi bi-telephone-fill"></i> 
                           <span id="pn1"></span>
                           </p>
                           <p class="card-text">
                            <i class="bi bi-telephone-fill"></i> 
                           <span id="pn2"></span>
                           </p>
                            </div>
                            <div class="mb-4">
                            <h6 class="card-subtitle mb-1 fw-bold">E-mail </h6>
                            <p class="card-text" id="email"></p>
                           </div>
                          </div>
                          <div class="col-lg-6">
                           <div class="mb-4">
                            <h6 class="card-subtitle mb-1 fw-bold">Socail Links </h6>
                           <p class="card-text mb-1">
                            <i class="bi bi-facebook me-1"></i> 
                           <span id="fb"></span>
                           </p>
                           <p class="card-text mb-1">
                           <i class="bi bi-instagram me-1"></i> 
                           <span id="insta"></span>
                           </p>
                           <p class="card-text mb-1">
                           <i class="bi bi-twitter me-1"></i> 
                           <span id="tw"></span>
                           </p>
                            </div>  
                            <div class="mb-4">
                            <h6 class="card-subtitle mb-1 fw-bold">iFrame</h6>
                            <iframe id="iframe" class="border p-2 w-100" loading="lazy"></iframe>
                            </div>  
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php require('inc/scripts.php'); ?>
    <script>
        let general_data, contacts_data;
        let general_s_form = document.getElementById('general_s_form');
        let site_title_inp = document.getElementById('site_title_inp');
        let site_about_inp = document.getElementById('site_about_inp');

        function get_general() {
            let site_title = document.getElementById('site_title');
            let site_about = document.getElementById('site_about');

            let site_title_inp = document.getElementById('site_title_inp');
            let site_about_inp = document.getElementById('site_about_inp');

            let shutdown_toggle = document.getElementById('shutdown_toggle');

            let xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/settings_crud.php", true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
           
            xhr.onload = function() {
                    general_data = JSON.parse(this.responseText);

                    site_title.innerText = general_data.site_title;
                    site_about.innerText = general_data.site_about;

                    site_title_inp.value = general_data.site_title;
                    site_about_inp.value = general_data.site_about;

                    if(general_data.shutdown == 0){
                        shutdown_toggle.checked = false;
                        shutdown_toggle.value = 0;
                    }
                    else{
                        shutdown_toggle.checked = true;
                        shutdown_toggle.value = 1;
                    }
                }

            xhr.send('get_general=1');
        }

        general_s_form.addEventListener('submit', function(e)){
          e.prevemtDefault();
          upd_general(site_title_inp.value,site_about_inp.value);
        }

        function upd_general(site_title_val,site_about_val)
        {
        let xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/settings_crud.php", true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
           
            xhr.onload = function() {
                var myModal = Document.getElementBYID('general-s')
                Var Model = bootstrap.Modal.getInstance(myModelEl)
                model.hide();
              
                if(this.responseText == 1 )
                {
                    alert('success','Changes saved!')
                    get_general();
                }
                else{
                    alert('error','No changes made!')
                }

                }
                xhr.send('site_title='+site_title_val+'&site_about='+site_about_val+'&upd_general');
        }
            
        function upd_shutdown(val)
        {
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/settings_crud.php", true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
           
            xhr.onload = function(){
                if(this.responseText == 1 && general_data.shutdown==0)
                {
                    alert('success','Site has been shutdown!')
                }
                else{
                    alert('error','Shutdown mode off!')
                }
                get_general();
                }

                xhr.send('upd_shutdown='+val);
        }
        
        function get_contacts()
         {
           let contacts_p_id = ['address','gmap','pn1','pn2','email','fb','insta','tw'];
           let iframe = document.getElementByID('iframe');


            let xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/settings_crud.php", true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
           
            xhr.onload = function() {
                    contacts_data = JSON.parse(this.responseText);   
                    console.log(contacts_data);
                }

            xhr.send('get_contacts');
        }


        window.onload = function(){
            get_general();
            get_contacts();
        }
</script>
    </body>
    </html>
    