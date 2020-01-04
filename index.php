<!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      
    <!-- Compiled and minified materialize CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <body class="deep-purple lighten-1">
<div class="row">
<div class="col l6 offset-l3" style="margin-top:10%">
<nav class="white">
    <div class="nav-wrapper">
      <form autocomplete="off" id="form">
        <div class="input-field">
          <input id="search" type="search" required>
          <label class="label-icon" for="search"><i class="material-icons blue-text">search</i></label>
          <i class="material-icons" id="close">close</i>
        </div>
      </form>
      <div class="card-panel" id="output" style="display:none">
       </div>
    </div>
  </nav>
</div>
</div>

<!--Jquery cdn link -->
    <script
			  src="https://code.jquery.com/jquery-3.4.1.min.js"
			  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
			  crossorigin="anonymous"></script>
      <!-- Compiled and minified materialize JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>  
   <script>
   input_box=document.getElementById("search")
   output=document.getElementById("output")
   close_btn=document.getElementById("close")
   form=document.getElementById("form")
   form.addEventListener("submit",notsubmit)
  function notsubmit(e)
{
e.preventDefault();
}
   close_btn.onclick=function()
   {
    input_box.value=''
    output.innerHTML=""
    output.style.display="none"
   }
   input_box.addEventListener("keyup",(e)=>
   {
    output.style.display="block"
output.innerHTML=`<div class='progress'><div class='indeterminate'></div></div>`
q=e.target.value
const xhr=new XMLHttpRequest();
xhr.open("GET","search.php?q="+q,true)
xhr.onload=function()
{
    if(xhr.status==200)
    {
output.innerHTML=''
output.innerHTML=xhr.responseText
    }
    else{
        alert("Something went wrong.")
    }
}
if(q.length>=2)
{
    xhr.send();
}
if(q.length==0)
{
    output.innerHTML=""
    output.style.display="none"
}
   })
   </script>
    </body>
  </html>
        
