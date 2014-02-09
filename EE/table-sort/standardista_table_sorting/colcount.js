//var colCount = standardistaTableSorting.prototype.headingClicked = function (e){
//     
//                alert("added");
//}

//var colCount = Object.create(standardistaTableSorting, {
//    
//headingClicked : function(e){
//    alert("go");
//    var countCol = document.getElementsByClassName("colCount");
//
//    for (var i = 0; i < countCol.length; i++){
//    for(var j = 1; j < countCol[i].rows.length; j++){
//        console.log(countCol[i].rows[j].cells[0]);
//        countCol[i].rows[j].cells[0].innerHTML = j;
//    }
//
//
//}
//}
//
//    
//});
//
//standardistaTableSorting.prototype.headingClicked = function(e){
//    alert("go");
//    var countCol = document.getElementsByClassName("colCount");
//
//    for (var i = 0; i < countCol.length; i++){
//    for(var j = 1; j < countCol[i].rows.length; j++){
//        console.log(countCol[i].rows[j].cells[0]);
//        countCol[i].rows[j].cells[0].innerHTML = j;
//    }
//}
//}

    
    
    document.getElementsByClassName("colCount").onclick = function(e){
            var countCol = document.getElementsByClassName("colCount");
            console.log("hi");
            
            e = e.target || window.target;
            
            if (e.nodeName == "a"){

           for (var i = 0; i < countCol.length; i++){
                for(var j = 1; j < countCol[i].rows.length; j++){
                    console.log(countCol[i].rows[j].cells[0]);
                    countCol[i].rows[j].cells[0].innerHTML = j;
                }
            }
            }
    }