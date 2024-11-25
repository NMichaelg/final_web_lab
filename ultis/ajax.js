function showResult(str) {
  if (str.length == 0) {
    document.getElementById("livesearch").innerHTML = "";
    document.getElementById("livesearch").style.border = "0px";
    return;
  }
  var xmlhttp = new XMLHttpRequest();
  try {
    xmlhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("livesearch").innerHTML = this.responseText;
        document.getElementById("livesearch").style.border =
          "1px solid #A5ACB2";
      }
    };
    const a = xmlhttp.open("GET", "ultis/get_list.php?q=" + str, true);
    xmlhttp.send();
  } catch {
    (error) => console.error("shit happened", error);
  }
}
