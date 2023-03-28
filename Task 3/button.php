<div id="data"></div>
<button onclick="getText()">press me</button>

<script>
    function getText(){
        let xmlHttp = new XMLHttpRequest();
        xmlHttp.open( "POST", "variable.php", false );
        xmlHttp.send();
        document.getElementById('data').innerHTML = xmlHttp.responseText;
    }
</script>