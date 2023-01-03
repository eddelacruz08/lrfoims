<!-- Topbar Start -->
<div class="navbar-custom topnav-navbar topnav-navbar-dark">
    <div class="container-fluid">

        <!-- LOGO -->
        <a href="/" class="topnav-logo">
            <span class="topnav-logo-lg">
                <img src="/assets/img/lamon_logo.png" alt="" height="65">
            </span>
            <span class="topnav-logo-sm">
                <img src="/assets/img/lamon_logo.png" alt="" height="65">
            </span>
        </a>

        <ul class="list-unstyled topbar-menu float-end mb-0 navbar-nav ms-auto bg-dark">
            
            <li class="dropdown notification-list bg-dark">
                <a class="nav-link dropdown-toggle nav-user bg-dark arrow-none me-0" data-bs-toggle="dropdown" id="topbar-userdrop" href="#" role="button" aria-haspopup="true"
                    aria-expanded="false">
                    <span class="account-user-avatar"> 
                        <img src="/assets/img/user.jpg" alt="user-image" class="rounded-circle">
                    </span>
                    <span>
                        <span class="account-user-name"><?= session()->get('first_name') != null ? session()->get('first_name').' '.session()->get('last_name') : 'Anonymous'?></span>
                        <span class="account-position"><?= session()->get('role_name')?></span>
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu profile-dropdown" aria-labelledby="topbar-userdrop">
                    <!-- item-->
                    <div class=" dropdown-header noti-title">
                        <h6 class="text-overflow m-0">Welcome !</h6>
                    </div>
                    <!-- item-->
                    <a href="/signout" class="dropdown-item notify-item">
                        <i class="mdi mdi-logout me-1"></i>
                        <span>Logout</span>
                    </a>

                </div>
            </li>

        </ul>
        <?php if(session()->get('role_id') == 1 || session()->get('role_id') == 2):?>
            <ul class="list-unstyled topbar-menu float-end mb-0 navbar-nav ms-auto bg-dark">
                <li class="dropdown notification-list">
                    <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" id="topbar-notifydrop" role="button" aria-haspopup="true" aria-expanded="false">
                        <span class="h4 mt-2"> Notifications</span>
                        <i class="dripicons-bell noti-icon"></i>&nbsp&nbsp&nbsp&nbsp
                        <span class="noti-icon-badge"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated dropdown-lg" style="max-width: 1000px;" aria-labelledby="topbar-notifydrop">

                        <!-- item-->
                        <div class="dropdown-item noti-title">
                            <h5 class="m-0">
                                <!-- <span class="float-end">
                                    <a href="javascript: void(0);" class="text-dark">
                                        <small>Clear All</small>
                                    </a>
                                </span> -->
                                Notification
                            </h5>
                        </div>

                        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
                        <div style="max-height: 300px; max-width: 600px;" data-simplebar>
                            <div class="notifications text-break" id="notifications"></div>
                            
                            <!-- item-->
                            <script>
                                $(document).ready(function(){
                                // document.addEventListener('DOMContentLoaded', function() {
                                    setInterval(
                                        showNotification()
                                    , 1000);
                                    function showNotification() {
                                        var x = setInterval(function() {
                                            $.ajax({
                                                type: "GET",
                                                url: '/get-notifications',
                                                async: true,
                                                dataType: 'JSON',
                                                success: function(data) {
                                                    if(data == ''){
                                                        html = '';
                                                        html +='<a href="javascript:void(0);" class="dropdown-item notify-item">';
                                                        html +='    <p class="notify-details">No notifications!';
                                                        html +='    </p>';
                                                        html +='</a>';
                                                        $('#notifications').append($('<div>', {html: html}));
                                                    }else{
                                                        for(i=0; i<data.length; i++){
                                                            // clearInterval(x);
                                                            if(data[i].status == 'a'){
                                                                html = '';
                                                                html +='<form method="post" action="/ingredients/notify-marked/u/'+data[i].id+'" id="notifFormId">';
                                                                html +='    <button type="submit" id="submitNotifButton" class="dropdown-item notify-item text-break">';
                                                                html +='        <div class="notify-icon bg-primary">';
                                                                html +='            <i class="mdi mdi-email-outline"></i>';
                                                                html +='        </div>';
                                                                html +='        <input type="hidden" value="'+data[i].link+'" name="marked_link">';
                                                                html +='        <p class="notify-details text-break">'+data[i].name;
                                                                html +='           <small class="text-muted">'+data[i].description+'</small>';
                                                                html +='           <small class="text-muted">'+moment(data[i].created_at).startOf('minute').fromNow()+'</small>';
                                                                html +='        </p>';
                                                                html +='    </button>';
                                                                html +='</form>';
                                                                html +='<hr class="m-0 p-0">';
                                                                // console.log('check'+i);
                                                                $('#notifications').append($('<div>', {html: html}));
                                                            }else{
                                                                html = '';
                                                                html +='<form method="post" action="/ingredients/notify-marked/u/'+data[i].id+'" id="notifFormId">';
                                                                html +='    <button type="submit" id="submitNotifButton" class="dropdown-item notify-item">';
                                                                html +='        <div class="notify-icon bg-secondary">';
                                                                html +='            <i class="mdi mdi-email-open-outline"></i>';
                                                                html +='        </div>';
                                                                html +='        <input type="hidden" value="'+data[i].link+'" name="marked_link">';
                                                                html +='        <p class="notify-details">'+data[i].name;
                                                                html +='           <small class="text-muted">'+data[i].description+'</small>';
                                                                html +='           <small class="text-muted">'+moment(data[i].created_at).startOf('minute').fromNow()+'</small>';
                                                                html +='        </p>';
                                                                html +='    </button>';
                                                                html +='</form>';
                                                                html +='<hr class="m-0 p-0">';
                                                                $('#notifications').append($('<div>', {html: html}));
                                                            }
                                                            // document.getElementById("notifications").value = data[i].id;
                                                        }
                                                    }
                                                }
                                            });
                                        }, 1000);
                                    }
                                    $(() => {
                                        $("#submitNotifButton").click(function(ev) {
                                            var form = $("#notifFormId");
                                            var url = form.attr('action');
                                            $.ajax({
                                                type: "POST",
                                                url: url,
                                                data: form.serialize(),
                                                cache: false,
                                                // success: function(data) {
                                                    // alert("Success");
                                                // },
                                                // error: function(data) {
                                                //     alert("some Error");
                                                // }
                                            });
                                        });
                                    });
                                });
                            </script>
                        </div>

                        <!-- All-->
                        <!-- <a href="javascript:void(0);" class="dropdown-item text-center text-primary notify-item notify-all">
                            View All
                        </a> -->

                    </div>
                </li>

            </ul>
        <?php endif;?>
        <a class="button-menu-mobile disable-btn">
            <div class="lines">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </a>
    </div>
</div>
<!-- end Topbar -->