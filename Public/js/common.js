$('#datetimepicker').datetimepicker({
			language: 'zh-CN',  
		});
	</script>
    <script type="text/javascript">
    	function checkNull()
        {
             var num=0;
             var str="";
             $("input[type$='text']").each(function(n){
                  if($(this).val()=="")
                  {
                       num++;
                       str+=$(this).attr("msg")+"不能为空！\r\n";
                  }
             });
             if(num>0)
             {
                  alert(str);
                  return false;
             }
             else
             {
                  return true;
             }
        }

    
    
     