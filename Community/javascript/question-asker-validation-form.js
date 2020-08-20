function validation() {
  var email = document.getElementById("exampleInputEmail1");
  var password = document.getElementById("exampleInputPassword1");
  var question = document.getElementById("exampleInputquestion1");

  if (
    email.value.trim() == "" ||
    password.value.trim() == "" ||
    question.value.trim()
  ) {
    alert("No blank value allowed");
    return false;
  } else return true;
}
