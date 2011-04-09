    function calculate(){
                var obj = document.getElementById("grad_table");
                var wt = document.getElementById("weightages");
                
                
                var insem1_wt , insem2_wt, endsem_wt, misc_wt;
        insem1_wt = new Number(document.getElementById("insem1_wt").value);
                insem2_wt = new Number(document.getElementById("insem2_wt").value);
                endsem_wt = new Number(document.getElementById("endsem_wt").value);
                misc_wt = new Number(document.getElementById("misc_wt").value);
        
                var i,j ,insem1_max, insem2_max, endsem_max, misc_max;
                insem1_max = new Number(obj.rows[1].cells[1].firstChild.value);
                insem2_max = new Number(obj.rows[1].cells[2].firstChild.value);
                endsem_max = new Number(obj.rows[1].cells[3].firstChild.value);
                misc_max   = new Number(obj.rows[1].cells[4].firstChild.value);
                
                
                for(i=2 ; obj.rows[i] != null ; i++){
                        t =  new Number(obj.rows[i].cells[1].firstChild.value);
                        if(insem1_max < t)
                                insem1_max = t;
                        t1 = new Number(obj.rows[i].cells[2].firstChild.value);
                        if(insem2_max < t1)
                                insem2_max = t1;
                        t2 = new Number(obj.rows[i].cells[3].firstChild.value);
                        if(endsem_max < t2)
                                endsem_max = t2;
                        t3 = new Number(obj.rows[i].cells[4].firstChild.value);
                        if(misc_max < t3)
                                misc_max = t3;
                        }
                        
                        
                //      alert(misc_max);
                for( i=1 ; obj.rows[i] != null ; i++){
                        var insem1 = new Number(obj.rows[i].cells[1].firstChild.value);
                        var insem2 = new Number(obj.rows[i].cells[2].firstChild.value);
                        var endsem = new Number(obj.rows[i].cells[3].firstChild.value);
                        var misc = new Number(obj.rows[i].cells[4].firstChild.value);
                        
                        if(isNaN(obj.rows[i].cells[1].firstChild.value) || isNaN(obj.rows[i].cells[1].firstChild.value)  || isNaN(obj.rows[i].cells[1].firstChild.value) || isNaN(obj.rows[i].cells[1].firstChild.value))
                        {
                                alert("Please enter valid numbers and try again");
                                break;
                        }
                        j=0;
                        if(!((insem1_max ==0)&&(insem1_wt==0))){
                                
                                if(insem1_max != 0){
                                        var y = insem1/insem1_max;
                                        j = y*insem1_wt;
                                }
                        }
                        
                        if(!((insem2_max ==0)&&(insem2_wt==0))){
                                
                                if(insem2_max != 0){
                                        var y = insem2/insem2_max;
                                        j = j + y*insem2_wt;
                                }
                        }
                        
                        if(!((endsem_max ==0)&&(endsem_wt==0))){
                                
                                if(endsem_max != 0){
                                        var y = endsem/endsem_max;
                                        j = j + y*endsem_wt;
                                }
                        }
                        
                        if(!((misc_max ==0)&&(misc==0))){
                                
                                if(insem2_max != 0){
                                        var y = misc/misc_max;
                                        j = j + y*misc_wt;
                                }
                        }
                        if(!isNaN(j))
                        obj.rows[i].cells[5].firstChild.value = Math.round(j);
                        else{
                        alert("Fields must contain numbers only");
                        break;}
                }
        }