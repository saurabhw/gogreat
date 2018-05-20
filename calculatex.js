  
	var AHtotal;
	var LMtotal;
	var AMtotal;
	var schoolTotal;
	var churchTotal;
	var grandTotal;
	var price = 26.00;
        var commision = 0.10;
	//get first row
	var lhpeople = Number(document.getElementById("lHpeople").value);
	var lhfund = Number(document.getElementById("LHfund").value);
	var lhpercent = Number(document.getElementById("LHpeople").value)/100;
	var lhbaskets = Number(document.getElementById("LHbaskets").value);
	var lhnumPerYear = Number(document.getElementByID("numPerYear").value);
	var lhactive = lhpeople * lhpercent;
	lhactive = parseInt(lhactive);
	//total first row 
	var totalOne = Number(lhpeople + lhfund + lhpercent + lhbaskets + lhnumPerYear);
	//display top row
	document.getElementById("LHtotal").innerHTML = totalOne;
	
	//get second row
	var ahfund = Number(document.getElementById("AHfund").value);
	var ahpeople = Number(document.getElementById("AHpeople").value);
	var ahpercent = Number(document.getElementById("AHpercent").value)/100;
	var ahbaskets = Number(document.getElementById("AHbaskets").value);
	var ahnumPerYear = Number(document.getElementByID("AHnumPerYear").value);
	var totalTwo = Number(ahpeople + ahfund + ahpercent + ahbaskets + ahnumPerYear);
	//display second row total
	document.getElementById("AHtotal").innerHTML = totalTwo;
	
	//get third row
	var lmfund = Number(document.getElementById("LMfund").value);
	var lmpeople = Number(document.getElementById("LMpeople").value);
	var lmbaskets = Number(document.getElementById("LMbaskets").value);
	var lmpercent = Number(document.getElementById("LMpercent").value)/100;
	var lmactive = Number(document.getElementById("LMactive").value);
	var totalThree = Number(lmpeople + lmfund + lmpercent + lmbaskets + lmnumPerYear);
	//show third row value
	document.getElementById("LMtotal").innerHTML = totalThree;
	
	//fourth row
	var amfund = Number(document.getElementById("AMfund").value);
	var ampeople = Number(document.getElementById("AMpeople").value);
	var ambaskets = Number(document.getElementById("AMbaskets").value);
	var ampercent = Number(document.getElementById("AMpercent").value)/100;
	var amactive  = Number(document.getElementById("AMactive").value);
	var totalFour = Number(lmpeople + lmfund + lmpercent + lmbaskets + lmnumPerYear);
	document.getElementById("AMtotal").innerHTML = totalFour;
	schoolTotal = (totalOne + totalTwo + totalThree + totalFour);
	
	
	
	
	