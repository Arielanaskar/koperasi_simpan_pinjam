document.getElementById("login-as").addEventListener('click', function() {
    // console.log(this.value)
    if (this.value === "Admin") {
        document.getElementById("input-user").name = "userid";
        document.getElementById("input-user").placeholder = "masukkan userid";
        document.getElementById("label-inputUser").innerText = "Userid";
    }else {
        document.getElementById("input-user").name = "username";
        document.getElementById("input-user").placeholder = "masukkan username";
        document.getElementById("label-inputUser").innerText = "Username";
    }
})