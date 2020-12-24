<html lang="en" dir="ltr">
  <head>
    <title>MIM</title>
    <script>
      function usersearchTxt(str) {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
          if(this.readyState == 4 && this.status == 200){
            document.getElementById('searchTable').innerHTML = this.responseText;
            //document.getElementById("searchTable").style.border="1px solid #A5ACB2";
            }
          }
        xmlhttp.open("GET","DBManager.php?search="+str,true);
        xmlhttp.send();

      }
    </script>
  </head>
  <body>
    <input id="searchBox" autocomplete="off" type="text" name="" value="">
    <button type="button" name="button" onclick="usersearchTxt(document.getElementById('searchBox').value);">search</button>

    <div id="searchTable">
      <table>
        <tr>
          <th>Id</th>
          <th>Name</th>
          <th>Email</th>
        </tr>
        <?php
          include 'DBManager.php';
          echo fetch('');
        ?>
      </table>
    </div>
  </body>
</html>
