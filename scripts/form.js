var username = document.getElementById("username");
username.addEventListener("blur",showPlaceHolder);
function showPlaceHolder(temp){
	temp.placeholder = "Enter your username";
	temp.setAttribute("style","background-color:#f2f2f2");
}