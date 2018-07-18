  
</body>
<script>
      function exprr(){
        var a1=$('#expfrm').val();
        var b1=$('#expto').val(); 
        var c= '0'; 
        var out = []; 
          if(a1!='' && b1!='')
          {   
            var user_date = Date.parse(b1);
            var today_date = Date.parse(a1);
            var diff_date =  user_date - today_date;

            var num_years = diff_date/31536000000;
            var num_months =  ((diff_date % 31536000000)/2628000000).toFixed(0); 
            var mnt=   num_months ;
            var yr= Math.floor(num_years);
            $('#exp').val(yr+"."+mnt); 

          }
          else{
            $('#exp').val(c);
          }
      }

      function age(){
        var a1=$('#dob').val();
        var b1='2018-06-26'; 
        var c= '0';  
        
          if(a1!='')
          {   
            var user_date = Date.parse(b1);
            var today_date = Date.parse(a1);
            var diff_date =  user_date - today_date;

            var num_years = diff_date/31536000000; 
            var yr= Math.floor(num_years);
            $('#age').html(yr+" Years on 26-06-2018"); 

          }
          else{
            $('#age').html(c);
          }
      }
 

      var isShift = false;
var seperator = "-";
function DateFormat(txt, keyCode) {
    if (keyCode == 16)
        isShift = true;
    //Validate that its Numeric
    if (((keyCode >= 48 && keyCode <= 57) || keyCode == 8 ||
         keyCode <= 37 || keyCode <= 39 ||
         (keyCode >= 96 && keyCode <= 105)) && isShift == false) {
        if ((txt.value.length == 4 || txt.value.length == 7) && keyCode != 8) {
            txt.value += seperator;
        }
        return true;
    }
    else {
        return false;
    }
}

function ValidateDate(txt, keyCode) {
    debugger;
    if (keyCode == 16)
        isShift = false;
    var val = txt.value;
    if (val.length == 10) {
        var splits = val.split("-");
        var dt = new Date(splits[0] + "-" + splits[1] + "-" + splits[2]); 
        //Validation for Dates
        if (dt.getDate() == splits[2] && dt.getMonth() + 1 == splits[1]
            && dt.getFullYear() == splits[0]) {
            return true;
        }
        else {
            txt.value = "";
            alert("Invalid Date");
            return false;
        }

    }
    else if (val.length < 10 && val.length > 0) {
        txt.value = "";
        alert("Invalid Date");

        return false;

    }
}
 
</script>
</html>