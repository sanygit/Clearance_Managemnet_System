jQuery(document).ready( function($){

 $("#login-form").submit( function(e) { loginProcess(e);  });
 $("#getDept").change( function(e) { getDept(e);  });
 $("#getVoteResult").change( function(e) { getResult(e);  });

//alert(12345);


	  facultyList();
   deptList();
   sessionList();
   feeList();
	  studentList();
   userList();


	 /**
	 *
	 *Update starts here
	 *
	 */

 //discount_fetcher
function loginProcess(evt){
var _this = $(evt.target);
evt.preventDefault();
var username = $(_this).find('#username').val();
var password = $(_this).find('#password').val();
var formdata = $(_this).serialize();
$(_this).find(':input').attr('disabled',true);
$(_this).find(':button').attr('disabled',false);
$(_this).find(':button').html('Loading..');
if( username === "" || password === "" ){
$("#login-bottom").removeClass('hide').addClass('alert-danger').html('<p><i class="fa fa-exclamation-triangle"></i> Check your login credentials! Something is empty!</p>');
$(_this).find(':input').attr('disabled',false);
$(_this).find(':button').attr('disabled',false);
$(_this).find(':button').html('Login');
}
else {
$.ajax({
	url:'reducer.php',
	type: 'POST',
	data: formdata,
	success: function( result ){
		 //alert(result);
		if(result == 1) {
			$("#login-bottom").removeClass('hide').addClass('alert-success').html('<p>Logging in......</p>');
	 location.href='users.php';


		 }
		 else{
			$("#login-bottom").removeClass('hide').addClass('alert-danger').html('<p>No user is registered using this credentials.</p>');
			$(_this).find(':input').attr('disabled',false);
			$(_this).find(':button').attr('disabled',false);
			$(_this).find(':button').html('<i class="icon-signin icon-large"></i>Login');
		}
	}
});
}
return this;
}



 function facultyList()
 {
   $('.facultyList').DataTable( {
        "ajax": "facultyList.php",
        retrieve: true,
         "columns": [
            { "data": "name" },
            { "data": "created" }
            //{ "data": "action" }
        ]
    } );
 }


 function sessionList()
 {
   $('.sessionList').DataTable( {
        "ajax": "sessionList.php",
        retrieve: true,
         "columns": [
            { "data": "name" },
            { "data": "created" }
            //{ "data": "action" }
        ]
    } );
 }

 function deptList()
 {
   $('.deptList').DataTable( {
        "ajax": "deptList.php",
        retrieve: true,
         "columns": [
            { "data": "faculty" },
            { "data": "name" },
            { "data": "created" }
        ]
    } );
 }


 function feeList()
 {
   $('.feeList').DataTable( {
        "ajax": "feeList.php",
        retrieve: true,
         "columns": [
            { "data": "faculty" },
            { "data": "dept" },
            { "data": "session" },
            { "data": "amount" },
            //{ "data": "action" }
        ]
    } );
 }


$(document).on('submit','.addFaculty', function(evt)
{
  evt.preventDefault();

   $.ajax({
            url:'reducer.php',
            type: "POST",
            dataType: "json",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
             success:function(result)
             {
                       if(result == 1) {
                    $('.alert_message_mod').html('<div class="alert alert-success" role="alert">Saved successfully</div>');
                     table = $('.facultyList').DataTable();
                     table.destroy();
                     facultyList();
                   }
    else if(result == 2) {
                    $('.alert_message_mod').html('<div class="alert alert-danger" role="alert">Error:: This faculty already exists!!!</div>');

                   }

                 else  {
                  $('.alert_message_mod').html('<div class="alert alert-danger" role="alert">Error adding this faculty!!! Please try again later.</div>');

                  }
             }


          });
});

$(document).on('submit','.addDept', function(evt)
{
  evt.preventDefault();

   $.ajax({
            url:'reducer.php',
            type: "POST",
            dataType: "json",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
             success:function(result)
             {
                       if(result == 1) {
                    $('.alert_message_mod').html('<div class="alert alert-success" role="alert">Saved successfully</div>');
                     table = $('.deptList').DataTable();
                     table.destroy();
                     deptList();
                   }
    else if(result == 2) {
                    $('.alert_message_mod').html('<div class="alert alert-danger" role="alert">Error:: This department already exists under given faculty!!!</div>');

                   }

                 else  {
                  $('.alert_message_mod').html('<div class="alert alert-danger" role="alert">Error adding this department!!! Please try again later.</div>');

                  }
             }


          });
});

$(document).on('submit','.addSession', function(evt)
{
  evt.preventDefault();

   $.ajax({
            url:'reducer.php',
            type: "POST",
            dataType: "json",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
             success:function(result)
             {
                       if(result == 1) {
                    $('.alert_message_mod').html('<div class="alert alert-success" role="alert">Saved successfully</div>');
                     table = $('.sessionList').DataTable();
                     table.destroy();
                     sessionList();
                   }
    else if(result == 2) {
                    $('.alert_message_mod').html('<div class="alert alert-danger" role="alert">Error:: This session already exists!!!</div>');

                   }

                 else  {
                  $('.alert_message_mod').html('<div class="alert alert-danger" role="alert">Error adding this session!!! Please try again later.</div>');

                  }
             }


          });
});
$(document).on('submit','.addFee', function(evt)
{
  evt.preventDefault();

   $.ajax({
            url:'reducer.php',
            type: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
             success:function(result)
             {
              //alert(result);
                       if(result == 1) {
                    $('.alert_message_mod').html('<div class="alert alert-success" role="alert">Saved successfully</div>');
                     table = $('.feeList').DataTable();
                     table.destroy();
                     feeList();
                   }
    else if(result == 2) {
                    $('.alert_message_mod').html('<div class="alert alert-danger" role="alert">Error:: This fees already exists!!!</div>');

                   }

                 else  {
                  $('.alert_message_mod').html('<div class="alert alert-danger" role="alert">Error creating fees!!! Please try again later.</div>');

                  }
             }


          });
});

 $(document).on('submit','.addStudent', function(evt)
{
  evt.preventDefault();

   $.ajax({
            url:'reducer.php',
            type: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
             success:function(result)
             {
              //alert(result);
                       if(result == 1) {
                    $('.alert_message_mod').html('<div class="alert alert-success" role="alert">Saved successfully</div>');
                     table = $('.studentList').DataTable();
                     table.destroy();
                     studentList();
                   }
    else if(result == 2) {
                    $('.alert_message_mod').html('<div class="alert alert-danger" role="alert">Error:: This student already exists!!!</div>');

                   }

                 else  {
                  $('.alert_message_mod').html('<div class="alert alert-danger" role="alert">Error creating student!!! Please try again later.</div>');

                  }
             }


          });
});

 $(document).on('submit','.addUser', function(evt)
{
  evt.preventDefault();

   $.ajax({
            url:'reducer.php',
            type: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
             success:function(result)
             {
                       if(result == 1) {
                    $('.alert_message_mod').html('<div class="alert alert-success" role="alert">Saved successfully</div>');
                     table = $('.userList').DataTable();
                     table.destroy();
                     userList();
                   }
    else if(result == 2) {
                    $('.alert_message_mod').html('<div class="alert alert-danger" role="alert">Error:: This user already exists!!!</div>');

                   }

                 else  {
                  $('.alert_message_mod').html('<div class="alert alert-danger" role="alert">Error creating user!!! Please try again later.</div>');

                  }
             }


          });
});


function studentList(){
   $('.studentList').DataTable( {
        "ajax": "studentList.php",
        retrieve: true,
         "columns": [
            { "data": "fullname" },
            { "data": "matric" },
            { "data": "faculty" },
            { "data": "dept" },
            { "data": "session" },
            //{ "data": "action" }
        ]
    } );
 }


function userList(){
   $('.userList').DataTable( {
        "ajax": "userList.php",
        retrieve: true,
         "columns": [
            { "data": "fullname" },
            { "data": "username" },
            { "data": "date" },
            //{ "data": "action" }
        ]
    } );
 }

function getDept(evt){
var _this = $(evt.target);
evt.preventDefault();
var classType = $(_this).serialize();
$("#getDeptList").empty();
$("#getDeptList").html('<p>connecting to the server......</p>');
$.ajax({
	url:'getDeptList.php',
	type: 'POST',
	data: classType,
	success: function( result ){
	$("#getDeptList").empty();
	$("#getDeptList").append(result);
			}
});
}




function saveUser(evt){
var _this = $(evt.target);
evt.preventDefault();
var formdata = $(_this).serialize();
$.ajax({
	url:'reducer.php',
	type: 'POST',
	data: formdata,
	success: function( result ){
		 if(result == 1) {
		 $('.alert_message_mod').html('<div class="alert alert-success" role="alert">Saved successfully</div>');
		  table = $('.studentList').DataTable();
    table.destroy();
    studentList();
	 }
		else if(result == 2){
    $('.alert_message_mod').html('<div class="alert alert-warning" role="alert">Error: This student already exist!!!</div>');

		}
else  {
 $('.alert_message_mod').html('<div class="alert alert-danger" role="alert">Error adding this student!!! Please try again later.</div>');

 }
			 }
});
}


	/**
	 *
	 *Editd code ends up
	 *
	 */

 });