<!-- ========================= MODAL ======================= -->
            <div id="addModal" class="modal fade">
            <form method="post">
              <div class="modal-dialog modal-sm" style="width:300px !important;">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Manage User Account</h4>
                    </div>
                    <div class="modal-body">
                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Name:</label>
                                    <input id="name" class="form-control input-sm" type="text" placeholder="Lastname, Firstname Middlename"/>
                                </div>
                                <div class="form-group">
                                    <label>Username:</label>
                                    <input id="username" class="form-control input-sm" type="text" placeholder="Username"/>
                                    <label id="user_msg" style="color:#CC0000;" ></label>
                                </div>
                                <div class="form-group">
                                    <label>Password:</label>
                                    <input id="password" class="form-control input-sm" type="password" placeholder="Password"/>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default btn-sm" data-dismiss="modal" value="Cancel"/>
                        <input type="button" class="btn btn-primary btn-sm" id="add-user-account-btn" value="Add User Account"/>
                    </div>
                </div>
              </div>
              </form>
            </div>

<script type="text/javascript">
    $(function() {
 
        var timeOut = null; // this used for hold few seconds to made ajax request
 
        var loading_html = '<img src="../../img/ajax-loader.gif" style="height: 20px; width: 20px;"/>'; // just an loading image or we can put any texts here
 
        //when button is clicked
        $('#username').keyup(function(e){
 
            // when press the following key we need not to make any ajax request, you can customize it with your own way
            switch(e.keyCode)
            {
                //case 8:   //backspace
                case 9:     //tab
                case 13:    //enter
                case 16:    //shift
                case 17:    //ctrl
                case 18:    //alt
                case 19:    //pause/break
                case 20:    //caps lock
                case 27:    //escape
                case 33:    //page up
                case 34:    //page down
                case 35:    //end
                case 36:    //home
                case 37:    //left arrow
                case 38:    //up arrow
                case 39:    //right arrow
                case 40:    //down arrow
                case 45:    //insert
                //case 46:  //delete
                    return;
            }
            if (timeOut != null)
                clearTimeout(timeOut);
            timeOut = setTimeout(is_user_available, 500);  // delay delay ajax request for 1000 milliseconds
            $('#user_msg').html(loading_html); // adding the loading text or image
        });


        $('#add-user-account-btn').on('click', function () {
            var name = $('#name').val(),
                username = $('#username').val(),
                password = $('#password').val();

            if (name == '' || username == '' || password == '') {
                Swal.fire({
                    icon: "error",
                    title: "Error!",
                    text: 'Please fill up the required fields!'
                });
            } else {
                var data = {
                    action: "create",
                    name: name,
                    username: username,
                    password: password
                };

                $.ajax({
                    type: "POST",
                    url: "../../ajax/user.php",
                    contentType: "application/json",
                    data: JSON.stringify(data),
                    success: function(resp) { 
                        if (resp == 'success') {
                            Swal.fire({
                                icon: 'success',
                                title: "Success",
                                text: 'User has been created successfully!'
                            }).then(function () {
                                location.reload();
                            });
                        } else {
                            Swal.fire({
                                icon: "error",
                                title: "Failed!",
                                text: err
                            });
                        }
                    }, error: function(err){
                        Swal.fire({
                            icon: "error",
                            title: "Failed!",
                            text: err
                        });
                    }
                });
            }
        })
  });
function is_user_available(){
    //get the username
    var username = $('#username').val(),
        data = { username: username, action: 'is_exists' };

    $.ajax({
        type: "POST",
        url: "../../ajax/user.php",
        contentType: "application/json",
        data: JSON.stringify(data),
        success: function(resp) { 
            if (+resp > 0) {
                $('#user_msg').html('Not Available');
                document.getElementById("btn_add").disabled = true;
            } else {
                console.log('yow');
                $('#user_msg').html('<span style="color:#006600;">Available</span>');
                document.getElementById("btn_add").disabled = false;
            }
        }
    });


 
}
</script>