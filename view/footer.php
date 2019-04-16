<div style="height:50px;">

</div>
<!-- CGU -->
<div class="modal fade" id="cgu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Conditions Générales</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<footer>
    <div class="text-center">
        <a data-toggle="modal" href="" data-target="#cgu">
            Conditions Générales
        </a>
    </div>
    <div class="night">
        <i class="fas fa-sun"></i>
        <div class="form-check checkbox-slider--b" style="display:inline-block;width:40px;">
            <label>
                <input type="checkbox" onchange="toggleNight()" id="nightMode"><span></span>
            </label>
        </div>
        <i class="fas fa-moon"></i>
    </div>
</footer>

<script>

    function initDark(){
        let night = getCookie("NIGHTMODE");
        if(night == "true"){
            document.getElementsByTagName("body")[0].classList.add("dark");
            document.getElementById("nightMode").checked = true;
        }
    }

    function toggleNight(){
        let night = document.getElementById("nightMode");
        setCookie("NIGHTMODE", night.checked, 7);
        if(night.checked){
            document.getElementsByTagName("body")[0].classList.add("dark");
        }else{
            document.getElementsByTagName("body")[0].classList.remove("dark");
        }
    }

    function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires="+ d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }

    function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i <ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
        c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
        return c.substring(name.length, c.length);
        }
    }
    return "";
    }

    initDark();

</script>