function openDag(dag, maand, jaar, jaartelling) {

	$("#kalender").hide();
	$("#overview").show();
    var output = "";

  
  $.getJSON("overvieuw.php?dag=" + dag + "&maand = " + maand + "&jaar = " + jaar + "&jaartelling = " + jaartelling)
  
    .done(function(data) {

    	if(data == "Niks"){
    		output += "<div class='text-center'>Voor deze dag zijn er nog geen afspraken aangemaakt.</div>";
    	} else {

	      	output = "<br><div class='text-center'><h2>Datum: "+dag + " - " + maand + " - " + jaar + "</h2></div><br>";
	       	output += "<table class='table table-hover'>";
			output += "<thead>";
			output += "<tr>";
			output += "<th scope='col'>Tijd</th>";
			output += "<th scope='col'>Titel</th>";
			output += "<th scope='col'>Bericht</th>";
			output += "</tr>";
			output += "</thead>";
			output += "<tbody>";
	      for (var i in data) {

	        output += "<tr>";
	        output += "<td>" + data[i].tijdvan + " - " + data[i].tijdtot + "</td>";
	        output += "<td>" + data[i].titel + "</td>";
	        output += "<td>" + data[i].bericht + "</td>";
	      	output += "</tr>";

	      }

      output += "</tbody>";
      output += "</table>";
      }
      output += "<button class='text-center' onclick='naarIndex()'>Terug</button>"

      $('#overview').html(output);

    })
    .fail(function() {
      output += "error";
      output += "<button class='text-center' onclick='naarIndex()'>Terug</button>"
      $('#overview').html(output);
    })

}