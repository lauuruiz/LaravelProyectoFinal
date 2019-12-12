$(document).ready(Init);

function Init(){
    $("i").first().click(Anterior);
    $("i").last().click(Siguiente);
    
    for(let i = 1; i <= 6; i++){
        $("tr").eq(i).addClass("visible");
    }

    $("tr:not(.visible):not(.cabecera)").hide();

}

function Anterior(){
	$("i").last().show();
    if($("tr").eq(1).hasClass("visible")){
		$("i").first().hide();

	}else{
		$(".visible").first().prev().addClass("primero");

	    $("tr").removeClass("visible");

	    for(let i = 0; i < 5; i++){
	        $(".primero").first().prev().addClass("primero");
	    }

	    $(".primero").addClass("visible");

	    $(".primero").removeClass("primero");
	}

	$("tr:not(.visible):not(.cabecera)").hide();
	$(".visible").show();

    
}

function Siguiente(){
	$("i").first().show();
	if($("tr").last().hasClass("visible")){
		$("i").last().hide();

	}else{
		$(".visible").last().next().addClass("primero");

	    $("tr").removeClass("visible");

	    for(let i = 0; i < 5; i++){
	        $(".primero").last().next().addClass("primero");
	    }

	    $(".primero").addClass("visible");

	    $(".primero").removeClass("primero");
	}

	$("tr:not(.visible):not(.cabecera)").hide();
	$(".visible").show();

    

}