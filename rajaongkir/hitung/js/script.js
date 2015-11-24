$(document).ready(function(){
	loadProvinsi('#oriprovince');
	loadProvinsi('#desprovince');
	$('#oriprovince').change(function(){
		$('#oricity').show();
		var idprovince = $('#oriprovince').val();
		loadCity(idprovince,'#oricity')
	});
	$('#desprovince').change(function(){
		$('#descity').show();
		var idprovince = $('#desprovince').val();
		loadCity(idprovince,'#descity')
	});
});

function loadProvinsi(id){
	$('#oricity').hide();
	$('#descity').hide();
	$(id).html('loading...');
	$.ajax({
		url:'process.php?act=showprovince',
		dataType:'json',
		success:function(response){
			$(id).html('');
			province = '';
				$.each(response['rajaongkir']['results'], function(i,n){
					province = '<option value="'+n['province_id']+'">'+n['province']+'</option>';
					province = province + '';
					$(id).append(province);
				});
		},
		error:function(){
			$(id).html('ERROR');
		}
	});
}
function loadCity(idprovince,id){
	$.ajax({
		url:'process.php?act=showcity',
		dataType:'json',
		data:{province:idprovince},
		success:function(response){
			$(id).html('');
			city = '';
				$.each(response['rajaongkir']['results'], function(i,n){
					city = '<option value="'+n['city_id']+'">'+n['city_name']+'</option>';
					city = city + '';
					$(id).append(city);
				});
		},
		error:function(){
			$(id).html('ERROR');
		}
	});
}
function cekHarga(){
	var origin = $('#oricity').val();
	var destination = $('#descity').val();
	var weight = $('#berat').val();
	var courier = $('#service').val();
	$.ajax({
		url:'process.php?act=cost',
		data:{origin:origin,destination:destination,weight:weight,courier:courier},
		success:function(response){
			$('#resultsbox').html(response);
		},
		error:function(){
			$('#resultsbox').html('ERROR');
		}
	});
}