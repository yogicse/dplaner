//This function checks email-availability-status
function checkemailAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check.php",
data:'emailid='+$("#emailid").val(),
type: "POST",
success:function(data){
$("#user-email-availability-status").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
function checkusernameAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check.php",
data:'idno='+$("#idno").val(),
type: "POST",
success:function(data){
$("#user-id-availability-status").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
//Finally add a function that will check if password 1 and password 2 match, It is called by the form using |onSubmit="return valid();"|
function valid()
{
if(document.signup.password.value!= document.signup.confirmpassword.value)
{
alert("Password and Confirm Password Field do not match  !!");
document.signup.confirmpassword.focus();
return false;
}
return true;
}
