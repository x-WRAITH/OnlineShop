//#######################//
//     WCode(Wraith)     //
//      GramySe.pl       //
//#######################//
function showPassowrd() {
    var x = document.getElementById("myPassword");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
}
let select = document.querySelector("#sorts");
let form = document.querySelector("#search-form");
select.onselect=()=>form.submit();