/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


sort_ddmm: function(a,b) {
    var mtch, y, m, d;
    
    mtch = a[0].match(sorttable.DATE_RE);
    
    y = mtch[3]; 
    m = mtch[2]; 
    d = mtch[1];
    
    if (m.length == 1) m = '0'+m;
    
    if (d.length == 1) d = '0'+d;
    
    var dt1 = y+m+d;
    
    mtch = b[0].match(sorttable.DATE_RE);
    
    y = mtch[3]; m = mtch[2]; d = mtch[1];
    
    if (m.length == 1) m = '0'+m;
    
    if (d.length == 1) d = '0'+d;
    
    var dt2 = y+m+d;
    
    if (dt1==dt2) return 0;
    
    if (dt1<dt2) return -1;
    
    return 1;
  }
  
  
  var data = {
      "ProDataSet":{
          "ttCashbackTypeList":[
                {
                    "cbcat":"P01",
                    "order_class":"WAT",
                    "vendor_name":"vendor_name",
                    "vendor_num":"9999",
                    "cbrowid":"0x00000000002e8f23",
                    "type_name":"",
                    "is_selected":""
                }
                ]
            }
        }
                
var temp_table = data.ProDataSet.ttCashbackTypeList;

        for(entry in temp_table)
            {
                row = entry;
                console.log( row );
            }

