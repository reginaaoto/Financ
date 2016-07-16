function formataDinheiro(valor)
{
    valor = parseFloat(valor);    
    var valor_formatado;
    var valores;
    
    valor_formatado = valor.toFixed(2);
    valores = valor_formatado.split('.');
    
    if (valores[1].length<2)
    {
        valores[1] += "0";
    }    
    
    valor_formatado = valores[0] + ","+valores[1];
    
    return valor_formatado;
}

function insereRegistro(elem){
    
    var classValor = (elem.tipo == "C")? 'valor-credito':'valor-debito';
                    
    var data = new Date(elem.data);
                     
    var tr = $('<tr>'+
        '<td>'+elem.data+'</td>'+
        '<td>'+elem.descricao+'</td>'+
        '<td>'+elem.categoria+'</td>'+
        '<td>'+elem.tipo+'</td>'+
        '<td class="'+classValor+'">R$ '+formataDinheiro(elem.valor)+'</td>'+
        '</tr>');
        
        $('#rel-30dias tbody').append(tr); 
} 

function leCookie()
{
    //console.log(document.cookie);
    var cookieOri = decodeURIComponent(document.cookie);
        
    var valores = cookieOri.split(";");
   // console.log(valores);
    var retorno = {};
     //map-reduce
    valores.forEach(function(elem, idx){
        var vet = elem.trim().split("=");
        /*var obj = {};
        obj.chave = vet[0];
        obj.valor = vet[1];
        */
        retorno[vet[0]] = vet[1];
    });
    //console.log(retorno); 
    return retorno;
}

var desloga = function()
{    
    document.cookie = "sess-sis=123; expires=Thu, 18 Dec 2013 12:00:00 UTC";
    location.reload();
}
