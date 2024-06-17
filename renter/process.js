function emailSend(){

	var userName = document.getElementById('name').value;
	var comment = document.getElementById('phone').value;
	var email = document.getElementById('email').value;

	var messageBody = "Name " + userName +
	"<br/> Phone " + phone +
	"<br/> Email " + email;
	Email.send({
    Host : "smtp.elasticemail.com",
    Username : "alexmaina8@gmail.com",
    Password : "669497ECD422E5F3601F05E431398E3D87C5",
    To : "alexandergichangi@gmail.com",
    From : "alexmaina8@gmail.com",
    Subject : "This is the subject",
    Body : messageBody
}).then(
  message => {
  	if(message=='OK'){
  		swal("Secussful", "You clicked the button!", "success");
  	}
  	else{
  		swal("Error", "You clicked the button!", "error");
  	}
  }
);
}