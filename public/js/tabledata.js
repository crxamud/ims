	var category; //;= jaxloader('Category',null,null);
	var subcategory; //;= jaxloader('SubCategory',null,null);
$(document).ready(function(table){
	category = jaxloader('Category',null,null);
	subcategory = jaxloader('SubCategory',null,null);
})

jQuery.fn.tableEditor = function(table) {
	var option="",option2="";
	option +="<option selected disabled> select .....</option>";
		$.each(category,function(i,item){		
			option +="<option value='"+item.id+"'>"+item.name+"</option>";
		});
		


	var htmlHolder = {
		body: '<tr>'			    		
			    	+'<td><select class="select selectpicker select2 form-control" onchange="fillup(this)" name="category[]">'+option+'</select></td>'
			    	+'<td><select class="select selectpicker select2 form-control" name="subcategory[]"></select></td>'
			    	+'<td><input class="form-control" type="number" placeholder="quantity" name="quantity[]" onchange="calctotal(this)" required></td>'
			    	+'<td><input class="form-control" type="number"  placeholder="unit prace" step="0.01" onchange="calctotal(this)" name="unitprace[]" required></td>'
			    	+'<td><input class="form-control" type="number"  placeholder="$ " onchange="grandtotal(this)" readOnly="true" step="0.01" name="total[]" style="background:inherit;border:none"></td>'
			    	+'<td><a onclick="distroyTR(this)" class="btn circle btn-danger pull-right" style="color: white"><i class="fa fa-trash"></i></a></td>'
			    	+'</tr>'
	}
	$(table+' tbody').append(htmlHolder.body);
}
	distroyTR=function(th){
		if(confirm("Are Sure to Delete?")){
			$(th).parents("tr").remove();
			grandtotal("#table1");
		}
		
		}

jaxloader = function(table,condtion,value){
	var bgdata = [];
	$.ajax({
		url:"generalload",
		data:{table:table,condtion:condtion,value:value,_token:_token},
		datatype:"json",
		type:"POST",
		async:false,
		cache:false,
		success:function(data){
		bgdata = data;
		}
	})
	return bgdata;
}

jaxSaver = function(url,form,type){
	var bgdata;
	if (type=="form") {
	$.ajax({
		url:url,
		data:$(form).serialize(),
		datatype:"json",
		type:"POST",
		async:false,
		cache:false,
		success:function(data){
		bgdata = data;
		$(form).reset()[0];
		}
	})
}else{
		$.ajax({
		url:url,
		data:form,
		datatype:"json",
		type:"POST",
		async:false,
		cache:false,
		success:function(data){
		bgdata = data;
		form.length =0;
		}
	})
	return bgdata;
}



	//return bgdata;
}

saveTbRows = function(table){
	var arrayHolder = [];
	arrayHolder.length = 0;
	$(table+" tbody tr").find('select,input').each(function(){
	arrayHolder.push({name:$(this).attr("name"), value:$(this).val()})
	})
	$(table + " tfoot tr").find('select').each(function(){
		arrayHolder.push({name:$(this).attr("name"),value:$(this).val()})
	})
	arrayHolder.push({name:'_token', value:_token});
	var ErrOrSuccess = jaxSaver('/genenalSaver',arrayHolder,null);
	var message  ='<div class="alert alert-warning alert-dismissible fade show" role="alert">';
				  
				 

	if(ErrOrSuccess.success){
		message  ='<div class="alert alert-success alert-dismissible fade show" role="alert">';
		message+='<strong><i class="fa fa-warn"></i></strong>'+ErrOrSuccess.message+'.<br>';
	}else{
		$.each(ErrOrSuccess,function(i,item){
			message+='<strong><i class="fa fa-warn"></i></strong>'+item+'.<br>';
		
	});
	 
}
	message+='<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
				    '<span aria-hidden="true">&times;</span>'+
				  '</button>'+
	'</div>';
	$('.error_msg').html(message);
	
}
calctotal = function(th){
	var type = $(th).attr("name");
	if(type == "quantity[]")
	{
		var quantity = $(th).val();
		var unitprice = $(th).parent().next("td").find("input").val();
		if(quantity > 0 && unitprice > 0){
			var input = $(th).parent().next("td").find("input");
			var total = (quantity) * (unitprice);
			input.parent().next("td").find("input").val(total);
			input.parent().next("td").find("input").trigger("change")
		}
		

	}else{
	var unitprice =  $(th).val();
	if (unitprice >0) {
		var quantity = $(th).parent().prev("td").find("input").val();
		if (quantity>0) {
			var total = (unitprice)*(quantity);
			$(th).parent().next("td").find("input").val(total)
			$(th).parent().next("td").find("input").trigger("change")
			
		}
	}	
}
	//grandtotal("#table1");
}
function grandtotal(table){
	var total=0;
	$("#table1 tbody tr").find('td').each(function(){
		if ($(this).index()==4) {
			total=(parseFloat(total)+parseFloat($(this).find('input').val())).toFixed(1);
			//alert($(this).find('input').val())
		}
		
	})
	$("#grandtotal").text("Total: $"+total);

}
fillup =function(th){
	var selectid =$(th).val();
	var option2 = "";
	option2 += "<option selected disabled> Select SubCategory </option>";
	$.each(subcategory,function(item,items){
		if (items.cat_id==selectid) {
			option2+= "<option value= '" + items.id+"'>" + items.name+ "</option>";
		}
		});
	$(th).parent().next().find("select").html(option2);

}